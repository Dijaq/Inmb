<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $tipos = Tipo::all();
        return $tipos;
    }

    public function _index()
    {
        $TipoController = new TipoController();
        $tipos = $TipoController->index();
        return view('administracion.tipos.index', compact('tipos'));
    }*/

    public function index()
    {
        $tipos = Tipo::all();
        return view('administracion.tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.tipos.create');
    }

    public function store(Request $request)
    {
        $tipo = new Tipo();
        $tipo->nombre = $request->nombre;
        $tipo->save();
        return redirect()->route('tipo.index')->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function edit($id)
    {
        $tipo = Tipo::findOrFail($id);
        return view('administracion.tipos.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {   
        $tipo = Tipo::findOrFail($id);
        $tipo->nombre = $request->nombre;
        $tipo->update();

        return redirect()->route('tipo.index')->with('info', 'Se modifico el tipo satisfactoriamente');
    }

    public function destroy($id)
    {  
        $tipo = Tipo::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tipo.index')->with('info', 'Se elimino el tipo satisfactoriamente');
   
    }

/*
    public function store(Request $request)
    {
        try{      
            $tipo = new Tipo();
            $tipo->nombre = $request->nombre;
            $tipo->save();

            return response()->json(['message' => 'Generado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{            
            $tipo = Tipo::findOrFail($id);
            return $tipo;
        }
        catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => 'No se ha encontrado el elemento solicitado']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{      
            $tipo = Tipo::findOrFail($id);
            $tipo->nombre = $request->nombre;
            $tipo->update();

            return response()->json(['message' => 'Generado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{     
            $tipo = Tipo::findOrFail($id);
            $tipo->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }*/
}
