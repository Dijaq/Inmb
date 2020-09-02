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
        $inmuebles = InmuebleFotos::with('inmueble')->where('es_destacado', true)->get();
        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        //return $inmuebles;
        return view('general.index', compact('inmuebles', 'operaciones', 'tipos'));
    }

    public function busqueda(){
        
        return view('general.busqueda');
    }

    public function inmueble($slug_page){
        try{        
            $inmueble = Inmueble::where('slug',$slug_page)->get()[0];
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }

        return view('general.inmueble', compact('inmueble'));
    }
    
}
