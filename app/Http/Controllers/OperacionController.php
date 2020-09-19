<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operacion;

class OperacionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operaciones = Operacion::orderBy('orden')->paginate(10);
        return view('administracion.operacion.index', compact('operaciones'));
    }

    public function create()
    {
        return view('administracion.operacion.create');
    }

    public function store(Request $request)
    {
        $operacion = new Operacion();
        $operacion->nombre = $request->nombre;
        $operacion->orden = $request->orden;
        $operacion->save();
        return redirect()->route('operacion.index')->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function edit($id)
    {
        $operacion = Operacion::findOrFail($id);
        return view('administracion.operacion.edit', compact('operacion'));
    }

    public function update(Request $request, $id)
    {   
        $operacion = Operacion::findOrFail($id);
        $operacion->nombre = $request->nombre;
        $operacion->orden = $request->orden;
        $operacion->update();

        return redirect()->route('operacion.index')->with('info', 'Se modifico el tipo satisfactoriamente');
    }

    public function destroy($id)
    {  
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();
        return redirect()->route('operacion.index')->with('info', 'Se elimino el tipo satisfactoriamente');
   
    }

    /*public function index()
    {
        $operaciones = Operacion::all();
        return $operaciones;
    }

    public function _index()
    {
        $OperacionController = new OperacionController();
        $operaciones = $OperacionController->index();
        //$atributos = Atributo::all();
        return view('administracion.operacion.index', compact('operaciones'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try{      
            $operacion = new Operacion();
            $operacion->nombre = $request->nombre;
            $operacion->orden = $request->orden;
            $operacion->save();

            return response()->json(['message' => 'Generado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{            
            $operacion = Operacion::findOrFail($id);
            return $operacion;
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
            $operacion = Operacion::findOrFail($id);
            $operacion->nombre = $request->nombre;
            $operacion->orden = $request->orden;
            $operacion->update();

            return response()->json(['message' => 'Modificado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{     
            $operacion = Operacion::findOrFail($id);
            $operacion->delete();
            return response()->json(['message' => 'Eliminado Satisfactorimente']);
        } catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => $e->getMessage()]);
        }
    }*/
}
