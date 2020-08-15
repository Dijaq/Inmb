<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('general.index');
    }

    public function busqueda(){
        return view('general.busqueda');
    }

    public function inmueble(){
        return view('general.inmueble');
    }

    
}
