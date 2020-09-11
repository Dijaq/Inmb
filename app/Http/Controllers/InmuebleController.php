<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;

class InmuebleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inmuebles = Inmueble::with('operacion')->with('tipo')->get();
        return view('admin_inmuebles.inmuebles.index', compact('inmuebles'));
    }

    /*public function index()
    {
        $inmuebles = Inmueble::with('operacion')->with('tipo')->get();
        return $inmuebles;
    }

    public function store(Request $request)
    {
        try{
            $inmueble = new Inmueble();
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->operacion_id = $request->operacion_id;
            //Usuario Creacion es del usuario logueado
            $inmueble->ubigeo_provincia_id = $request->ubigeo_provincia_id;
            $inmueble->ubigeo_distrito_id = $request->ubigeo_distrito_id;
            $inmueble->ubigeo_region_id = $request->ubigeo_region_id;
            $inmueble->moneda = $request->moneda;
            $inmueble->titulo = $request->titulo;
            $inmueble->slug = $request->slug;
            $inmueble->descripcion = $request->descripcion;
            $inmueble->mapa_lalitud = $request->mapa_latitud;
            $inmueble->mapa_longitud = $request->mapa_longitud;
            $inmueble->mapa_zoom = $request->mapa_zoom;
            $inmueble->fecha_publicacion = now();
            $inmueble->fecha_vencimiento = $request->fecha_vencimiento;
            $inmueble->estado = $request->estado;
            $inmueble->save();

            //return $persona;
            return response()->json(['message' => 'Generado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{            
            $inmueble = Inmueble::findOrFail($id);
            return $inmueble;
        }
        catch(\Exception $e){
            //return $e->getMessage();
            return response()->json(['message' => 'No se ha encontrado el elemento solicitado']);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $inmueble = Inmueble::findOrFail($id);
            $inmueble->tipo_id = $request->tipo_id;
            $inmueble->operacion_id = $request->operacion_id;
            //Usuario Creacion es del usuario logueado
            $inmueble->ubigeo_provincia_id = $request->ubigeo_provincia_id;
            $inmueble->ubigeo_distrito_id = $request->ubigeo_distrito_id;
            $inmueble->ubigeo_region_id = $request->ubigeo_region_id;
            $inmueble->moneda = $request->moneda;
            $inmueble->titulo = $request->titulo;
            $inmueble->slug = $request->slug;
            $inmueble->descripcion = $request->moneda;
            $inmueble->mapa_latitud = $request->moneda;
            $inmueble->mapa_longitud = $request->moneda;
            $inmueble->mapa_zoom = $request->moneda;
            $inmueble->fecha_publicacion = now();
            $inmueble->fecha_vencimiento = $request->fecha_vencimiento;
            $inmueble->estado = $request->estado;
            $inmueble->update();

            //return $persona;
            return response()->json(['message' => 'Modificado Satisfactorimente']);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //
    }

    public function _index()
    {
        $inmuebles = InmuebleFotos::with('inmueble')->get();
    }*/
}
