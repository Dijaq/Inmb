<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return $personas;
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
            $persona = new Persona();
            $persona->dni = $request->dni;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->cargo_empresa = $request->cargo_empresa;
            $persona->telefono = $request->telefono;
            $persona->celular1 = $request->celular1;
            $persona->celular2 = $request->celular2;
            $persona->celular3 = $request->celular3;
            $persona->save();

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
            $persona = Persona::findOrFail($id);
            return $persona;
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
            $persona = Persona::findOrFail($id);
            $persona->dni = $request->dni;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->cargo_empresa = $request->cargo_empresa;
            $persona->telefono = $request->telefono;
            $persona->celular1 = $request->celular1;
            $persona->celular2 = $request->celular2;
            $persona->celular3 = $request->celular3;
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
            $persona = Persona::findOrFail($id);
            $persona->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
