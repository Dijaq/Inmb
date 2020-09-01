<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;

class WebController extends Controller
{
    public function index(){
        $inmuebles = InmuebleFotos::with('inmueble')->where('es_destacado', true)->get();
        //return $inmuebles;
        return view('general.index', compact('inmuebles'));
    }

    public function busqueda(){
        return view('general.busqueda');
    }

    public function inmueble(){
        return view('general.inmueble');
    }

    
}
