<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;

class WebController extends Controller
{
    public function index(){
        //$inmuebles = Inmueble::join('inmueble_fotos', 'inmueble.id', '=', 'inmueble_fotos.inmueble_id')->where('inmueble_fotos.es_destacado', true)->get();
        $inmuebles = Inmueble::with(['fotos' => function($query) {
            $query->where('es_destacado', true);
        }])->orderBy('fecha_publicacion', 'desc')->take(3)->get();

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        $cantidad = 3;
        return view('general.index', compact('inmuebles', 'operaciones', 'tipos', 'cantidad'));
    }

    public function more(Request $request){
        //return $request['cantidad'];
        //$inmuebles = Inmueble::join('inmueble_fotos', 'inmueble.id', '=', 'inmueble_fotos.inmueble_id')->where('inmueble_fotos.es_destacado', true)->get();
        $cantidad = $request['cantidad']+3;
        $inmuebles = Inmueble::with(['fotos' => function($query) {
            $query->where('es_destacado', true);
        }])->orderBy('fecha_publicacion', 'desc')->take($cantidad)->get();

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        return view('general.index', compact('inmuebles', 'operaciones', 'tipos', 'cantidad'));
    }

    public function busqueda(Request $request){
        //$inmuebles = Inmueble::where('operacion_id',$request->operacion)->with(['fotos' => function($query) {
        $inmuebles = Inmueble::with('fotos')->orderBy('fecha_publicacion', 'desc')->get();
        
        
        if(is_numeric($request->operacion)){
            $inmuebles = $inmuebles->where('operacion_id',$request->operacion);    
        }

        if(is_numeric($request->tipo)){
            $inmuebles = $inmuebles->where('tipo_id',$request->tipo);
        }

        if(!is_null($request->busqueda))
        {
            $inmuebles = $inmuebles->where('titulo', 'LIKE','%'.$request->busqueda.'%');
        }

        //return $inmuebles;

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        return view('general.busqueda', compact('inmuebles', 'operaciones', 'tipos'));
    }

    public function inmueble($slug_page){
        try{        
            $inmueble = Inmueble::where('slug',$slug_page)->with('fotos')->get()[0];
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }

        return view('general.inmueble', compact('inmueble'));
    }
    
}
