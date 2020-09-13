<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Persona;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('persona')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = collect([
            ['id' => 'ADMIN', 'nombre' => 'ADMINISTRADOR'],
            ['id' => 'USER', 'nombre' => 'USUARIO']
        ]);
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->dni = $request->dni;
        $persona->correo = $request->email;
        $persona->telefono = $request->celular;
        $persona->info_busqueda = $request->nombres." ".$request->apellidos." ".$request->celular;
        $persona->save();

        $usuario = new Usuario();
        $usuario->persona_id = $persona->id;
        $usuario->nombre = $request->nombre_usuario;
        $usuario->email = $persona->correo;
        $usuario->rol = $request->rol;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return redirect()->route('usuario.index')->with('info', 'Se creo el usuario satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{            
            $usuario = Usuario::findOrFail($id);
            return $usuario;
        }
        catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => 'No se ha encontrado el elemento solicitado']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $roles = collect([
            ['id' => 'ADMIN', 'nombre' => 'ADMINISTRADOR'],
            ['id' => 'USER', 'nombre' => 'USUARIO']
        ]);
        return view('usuarios.edit', compact('roles', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $persona = Persona::findOrFail($usuario->persona_id);

        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->dni = $request->dni;
        $persona->correo = $request->email;
        $persona->telefono = $request->celular;
        $persona->info_busqueda = $request->nombres." ".$request->apellidos." ".$request->celular;
        $persona->update();

        $usuario->persona_id = $persona->id;
        $usuario->nombre = $request->nombre_usuario;
        $usuario->email = $persona->correo;
        $usuario->rol = $request->rol;
        $usuario->update();
        return redirect()->route('usuario.index')->with('info', 'Se creo el usuario satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuario.index')->with('info', 'Se elimino el usuario satisfactoriamente');
    }
}
