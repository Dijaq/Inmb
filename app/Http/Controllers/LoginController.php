<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook;
use App\Tipo;
use App\Operacion;
use App\Persona;
use App\Usuario;
use Illuminate\Support\Facades\Mail;
use App\Mail\WebControllerEmail;
use App\Mail\VerificadoSatisfactoriamente;
use Auth;

class LoginController extends Controller
{

    /*Abre la ventanda de Login*/
    public function login()
    {
        /*$tipos = Tipo::all();
        $operaciones = Operacion::all();
        return view('auth.ingresar', compact('tipos', 'operaciones'));*/
        return view('auth.ingresar');
    }

    /*Valida si el usuario es valido para poder enviar los datos al login*/
    public function ingresarLogin(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->get();
        //return $request;
        if(count($usuario) > 0)
        {
            if($usuario->first()->estado == 'VALIDADO')
            {
                //return redirect()->to('login', compact('request'));
                //return redirect()->guest('login')->with('_method', session($request, 'POST'));
                //Auth::attempt(['email' => $email, 'password' => $password]);
                //return $request;
                
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
                {
                    return redirect()->route('inicio')->with('success', 'Ingreso Satisfactoriamente.');
                }
                else
                {
                    return redirect()->route('inicio')->with('errors', 'Email o Contraseña Incorrectos.');
                }
                
            }
            else{
                return redirect()->route('inicio')->with('errors', 'Su correo no ha sido verificado por su cuenta, verifique su correo porfavor.');
                //return redirect()->route('vivela.login')->with('errors', 'Su correo no ha sido validado por su cuenta, verifique su correo porfavor.');
            }
        }
        else{
            return redirect()->route('inicio')->with('errors', 'La dirección de correo electrónico no existe.');
        }
        
    }

    public function face_registro()
    {
        //cargamos facebook info
        $fb = new Facebook\Facebook([
            'app_id' => '316923182928253',
            'app_secret' => '2284fd940ef2ad8d1e18707cc357ac44',
            'default_graph_version' => 'v3.2',
        ]);

        // obtenemos link de sesion
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; /* esto se puede cambiar al momento de consultar los datos del usuario */
        $redirectURL = "https://www.vivelaovendela.com.pe/facebook_callback_registro";
        $loginUrl = $helper->getLoginUrl($redirectURL, $permissions);

        return  redirect()->away($loginUrl);
        // enviamos link de sesion
        //return view("auth.ingresar", compact('loginUrl'));
    }

    public function fbCallback_registro()
    {
        //cargamos facebook info
        $fb = new Facebook\Facebook([
            'app_id' => '316923182928253',
            'app_secret' => '2284fd940ef2ad8d1e18707cc357ac44',
            'default_graph_version' => 'v3.2',
        ]);

        // obtenemos link de redireccion
        $helper = $fb->getRedirectLoginHelper();

        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }

        // obtenemos el acces token
        $accessToken = $helper->getAccessToken();

        // obtenemos la informacion del usuario de facebook
        $response = $fb->get('/me?fields=id,name,email,picture', $accessToken);
        $fb_user = $response->getGraphUser();


        //return $fb_user;

        // a partir de aqui solo se valida la informacion del usuario para registrarlo si no se encuentra en la base de datos
        /*$usuariosCtrl = new UsuariosController();
        $usuario = $this->Usuarios->find()->where(['correo LIKE' => '%' . $fb_user['email'] . '%'])->first();

        if ($usuario) {
            $this->Auth->setUser($usuario);
            return $this->redirect($this->Auth->redirectUrl());
        }else{
            $usuariosCtrl->crearUsuario($fb_user['name'], $fb_user['email'], '', '', 'CLIENTE', TRUE);
            $this->Auth->setUser($usuario);
            return $this->redirect($this->Auth->redirectUrl());
        }*/
        $personas = Persona::where('correo', $fb_user['email'])->get();
        if(count($personas) > 0){
            return redirect()->route('inicio')->with('errors', 'El correo electrónico de su cuenta ya esta en uso');
        }
        else{
            $persona = new Persona();
            $persona->nombres = $fb_user['name'];
            $persona->correo = $fb_user['email'];
            //$persona->info_busqueda = $request->nombres." ".$request->apellidos." ".$request->celular;
            $persona->save();

            //return explode(" ",$request->nombres)[0];

            $usuario = new Usuario();
            $usuario->persona_id = $persona->id;
            //$usuario->nombre = $request->nombre_usuario;
            $usuario->nombre = explode(" ",$persona->nombres)[0];
            $usuario->email = $persona->correo;
            $usuario->rol = 'USER';
            $usuario->password = bcrypt($fb_user['id']);
            $usuario->estado = "VALIDADO";
            $usuario->save();

            $details = [
                'link_verificacion' => 'https://www.vivelaovendela.com.pe/verificacion/'.$persona->id."-".$usuario->id
            ];
            Mail::to($persona->correo)->send(new WebControllerEmail($details));

            return redirect()->route('inicio')->with('success', 'Se registro satisfactoriamente');
        }
    }

    
    public function iniciarSesion()
    {
        //cargamos facebook info
        $fb = new Facebook\Facebook([
            'app_id' => '316923182928253',
            'app_secret' => '2284fd940ef2ad8d1e18707cc357ac44',
            'default_graph_version' => 'v3.2',
        ]);

        // obtenemos link de sesion
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; /* esto se puede cambiar al momento de consultar los datos del usuario */
        $redirectURL = "https://www.vivelaovendela.com.pe/facebook_callback";
        $loginUrl = $helper->getLoginUrl($redirectURL, $permissions);

        return  redirect()->away($loginUrl);
        // enviamos link de sesion
        //return view("auth.ingresar", compact('loginUrl'));
    }

    /**
     * Esta funcion recibira el token que facebook me devuelve para obtener la informacion de la cuenta
     */
    public function fbCallback()
    {
        //cargamos facebook info
        $fb = new Facebook\Facebook([
            'app_id' => '316923182928253',
            'app_secret' => '2284fd940ef2ad8d1e18707cc357ac44',
            'default_graph_version' => 'v3.2',
        ]);

        // obtenemos link de redireccion
        $helper = $fb->getRedirectLoginHelper();

        if (isset($_GET['state'])) {
            $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }

        // obtenemos el acces token
        $accessToken = $helper->getAccessToken();

        // obtenemos la informacion del usuario de facebook
        $response = $fb->get('/me?fields=id,name,email,picture', $accessToken);
        $fb_user = $response->getGraphUser();


        $usuario = Usuario::where('email', $fb_user['email'])->get();
        if(count($usuario)>0)
        {
            Auth::attempt(['email' => $usuario->first()->email, 'password' => $fb_user['id']]);
            return redirect()->route('inicio')->with('success', 'Ingresó Satisfactoriamente.');
        }
        else
        {
            return redirect()->route('inicio')->with('errors', 'Su cuenta no se encuentra registrada.');
        }      
    }

    public function registro()
    {
        $tipos = Tipo::all();
        return view('general.registro', compact('tipos'));
    }

    public function registroStore(Request $request)
    {
        $personas = Persona::where('correo', $request->email)->get();
        if(count($personas) > 0){
            return redirect()->route('inicio')->with('errors', 'El correo electrónico ingresado ya esta en uso');
        }
        else{
            $persona = new Persona();
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->dni = $request->dni;
            $persona->correo = $request->email;
            $persona->telefono = $request->celular;
            //$persona->info_busqueda = $request->nombres." ".$request->apellidos." ".$request->celular;
            $persona->save();

            //return explode(" ",$request->nombres)[0];

            $usuario = new Usuario();
            $usuario->persona_id = $persona->id;
            //$usuario->nombre = $request->nombre_usuario;
            $usuario->nombre = explode(" ",$request->nombres)[0];
            $usuario->email = $persona->correo;
            $usuario->rol = 'USER';
            $usuario->password = bcrypt($request->password);
            $usuario->estado = "NUEVO";
            $usuario->save();

            $details = [
                'link_verificacion' => 'https://www.vivelaovendela.com.pe/verificacion/'.$persona->id."-".$usuario->id
            ];
            Mail::to($persona->correo)->send(new WebControllerEmail($details));

            return redirect()->route('inicio')->with('success', 'Gracias por registrarse, verifique su cuenta en su correo electrónico.');
        }
    }

    public function verificacion($codigos)
    {
        $idUsuario = explode("-", $codigos)[1];
        $usuario = Usuario::findOrFail($idUsuario);

        if($usuario->estado == 'VALIDADO'){
            return redirect()->route('inicio')->with('info', 'Su cuenta ya se encuentra validada.');
        }
        else{
            $usuario->estado = "VALIDADO";
            $usuario->update(); 
            Mail::to($usuario->email)->send(new VerificadoSatisfactoriamente());
            return redirect()->route('inicio')->with('success', 'Su cuenta fue validada satisfactoriamente.');
        }
    }
}
