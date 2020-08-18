<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $usuario = new Usuario();
            $usuario->usr = $request->usr;
            $usuario->pwd = $request->pwd;
            $usuario->nombre = $request->nombre;
            $usuario->rol = $request->rol;
            $usuario->save();

            //return $persona;
            return response()->json(['message' => 'Generado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
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
        //
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
        try{
            $usuario = Usuario::findOrFail($id);
            $usuario->usr = $request->usr;
            $usuario->pwd = $request->pwd;
            $usuario->nombre = $request->nombre;
            $usuario->rol = $request->rol;
            $persona->update();

            //return $persona;
            return response()->json(['message' => 'Modificado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{     
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
