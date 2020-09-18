<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook;

class LoginController extends Controller
{
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
        $redirectURL = "http://localhost:8000/fbCallback";
        $loginUrl = $helper->getLoginUrl($redirectURL, $permissions);

        // enviamos link de sesion
        $this->set("https://www.facebook.com/", $loginUrl);
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

        // a partir de aqui solo se valida la informacion del usuario para registrarlo si no se encuentra en la base de datos
        $usuariosCtrl = new UsuariosController();
        $usuario = $this->Usuarios->find()->where(['correo LIKE' => '%' . $fb_user['email'] . '%'])->first();

        if ($usuario) {
            $this->Auth->setUser($usuario);
            return $this->redirect($this->Auth->redirectUrl());
        }else{
            $usuariosCtrl->crearUsuario($fb_user['name'], $fb_user['email'], '', '', 'CLIENTE', TRUE);
            $this->Auth->setUser($usuario);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }
}
