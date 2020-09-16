<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;

class WebControllerMensajes extends Controller
{
    
    public function post(Request $request)
    {
        return $request;
        return redirect()->route('/')->with('info', 'Se creo el tipo satisfactoriamente');
    }
    
}
