<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inmuebles = Inmueble::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $inmueble->descripcion = $request->moneda;
            $inmueble->mapa_latitud = $request->moneda;
            $inmueble->mapa_longitud = $request->moneda;
            $inmueble->mapa_zoom = $request->moneda;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
