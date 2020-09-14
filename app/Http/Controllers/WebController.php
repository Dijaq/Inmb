<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;
use App\ServicioInmueble;
use App\AtributoInmueble;

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
        //return $request;
        //return Inmueble::where('titulo', 'LIKE', "'%PROBANDO%'")->get();
        //return Inmueble::whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->get();
        
        $inmuebles = Inmueble::with('fotos')->with('distrito')->with('provincia')->orderBy('fecha_publicacion', 'desc')->get();

        if(!is_null($request->busqueda))
        {
            $inmuebles = Inmueble::whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->with('fotos')->with('distrito')->with('provincia')->orderBy('fecha_publicacion', 'desc')->get();
        }
        
        if(is_numeric($request->operacion)){
            $inmuebles = $inmuebles->where('operacion_id',$request->operacion);    
        }

        if(is_numeric($request->tipo)){
            $inmuebles = $inmuebles->where('tipo_id',$request->tipo);
        }

        /*if(!is_null($request->busqueda))
        {
            //$inmuebles = $inmuebles->where('titulo', 'LIKE','%'.$request->busqueda.'%');
            //$inmuebles = $inmuebles->query()->orWhere('titulo', 'LIKE', '%'.$request->busqueda.'%')->get();
            $inmuebles = $inmuebles->whereRaw('titulo LIKE \'%'.$request->busqueda.'%\'')->get();
        }*/

        //return $inmuebles;

        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        return view('general.busqueda', compact('inmuebles', 'operaciones', 'tipos'));
    }

    public function inmueble($slug_page){
      
        $inmueble = Inmueble::where('slug',$slug_page)->with('fotos')->get()[0];
        $tipos = Tipo::all();
        $inmueble_servicios = ServicioInmueble::with('servicio')->where('inmueble_id', $inmueble->id)->get();
        $inmueble_atributos = AtributoInmueble::with('atributo')->where('inmueble_id', $inmueble->id)->get();
        
        //return $inmueble_atributos;

        return view('general.inmueble', compact('inmueble', 'tipos', 'inmueble_servicios', 'inmueble_atributos'));
    }
    
}
