<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atributo;

class AtributoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($idTipo)
    {
        $atributos = Atributo::with('tipo')->get();
        if($idTipo != 0)
        {
            $atributos = $atributos->where('tipo_id', $idTipo);
        }

        //return $atributos[0]->tipo;
        return view('administracion.atributos.index', compact('atributos'));
    }


    /*public function index()
    {
        $atributos = Atributo::with('tipo')->get();
        return $atributos;
    }

    public function allByTipo($idTipo)
    {
        $atributos = Atributo::with('tipo')->get();
        if($idTipo != 0)
        {
            $atributos = $atributos->where('tipo_id', $idTipo);
        }

        return $atributos;
    }

    public function _index()
    {
        $AtributoController = new AtributoController();
        $atributos=$AtributoController->index();
        //$atributos = Atributo::all();
        return view('administracion.atributos.index', compact('atributos'));
    }

    public function store(Request $request)
    {
        try{      
            $atributo = new Atributo();
            $atributo->tipo_id = $request->tipo_id;
            $atributo->nombre = $request->nombre;
            $atributo->ruta_imagen = $request->ruta_imagen;
            $atributo->tipo = $request->tipo;
            $atributo->meta = $request->meta;
            $atributo->orden = $request->orden;
            $atributo->save();

            return response()->json(['message' => 'Generado Satisfactorimente'], 200);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try{      
            $atributo = Atributo::findOrFail($id);
            return $atributo;
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try{      
            $atributo = Atributo::findOrFail($id);
            $atributo->tipo_id = $request->tipo_id;
            $atributo->nombre = $request->nombre;
            $atributo->ruta_imagen = $request->ruta_imagen;
            $atributo->tipo = $request->tipo;
            $atributo->meta = $request->meta;
            $atributo->orden = $request->orden;
            $atributo->update();

            return response()->json(['message' => 'Modificado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{     
            $atributo = Atributo::findOrFail($id);
            $atributo->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }*/
}
