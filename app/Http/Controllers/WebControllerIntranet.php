<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;

class WebControllerIntranet extends Controller
{
    public function index(){
        //$inmuebles = Inmueble::join('inmueble_fotos', 'inmueble.id', '=', 'inmueble_fotos.inmueble_id')->where('inmueble_fotos.es_destacado', true)->get();
        $inmuebles = Inmueble::where('usuario_creacion_id', auth()->user()->id)->with(['fotos' => function($query) {
            $query->where('es_destacado', true);
        }])->orderBy('fecha_publicacion', 'desc')->get();

        //return auth()->user();
        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        $cantidad = 3;

        return view('general.mispublicaciones', compact('inmuebles', 'operaciones', 'tipos', 'cantidad'));
    }

    public function destroy($id)
    {
        $inmueble = Inmueble::findOrFail($id);
        $inmueble->delete();
        return redirect()->route('mispublicaciones')->with('success', 'Se elimino el inmueble satisfactoriamente');
    }
    
    
}
