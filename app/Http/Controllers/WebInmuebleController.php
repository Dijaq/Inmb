<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;

class WebInmuebleController extends Controller
{
    public function index($id)
    {
        $operaciones = Operacion::all();
        $tipos = Tipo::all();
        //$idInmueble = $id;
        $inmueble = Inmueble::findOrFail($id);
        $inmuebleFotos = InmuebleFotos::where('inmueble_id', $id)->orderBy('orden')->get();
        return view('general.inmueble_imagen.index', compact('inmuebleFotos', 'inmueble', 'tipos', 'operaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idInmueble)
    {
        $tipos = Tipo::all();
        $operaciones = Operacion::all();
        $inmueble = Inmueble::findOrFail($idInmueble);
        //return $inmueble;
        return view('general.inmueble_imagen.create', compact('inmueble', 'tipos', 'operaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->file('dir_images') as $image)
        {
            $nameImage = $image->getClientOriginalName();
            $filename = date("Ymd-His", strtotime(now())).'_'.$nameImage;
            $image->storeAs('public', $filename);

            $inmueble_fotos = new InmuebleFotos();
            $inmueble_fotos->inmueble_id = $request->inmueble_id;
            $inmueble_fotos->url_imagen = 'storage/'.$filename;
            $inmueble_fotos->orden = 1;
            $inmueble_fotos->es_destacado = true;
            $inmueble_fotos->save();
        }

        return redirect()->route('publicInmuebleFotos.index', $request->inmueble_id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function reordenar(Request $request)
    {
        //return $request;
        $inmuebleFotos = InmuebleFotos::where('inmueble_id', $request->id)->get();

        foreach($inmuebleFotos as $foto)
        {
            //return $request->{'destacado_'.$foto->id};
            $inmueble_foto = InmuebleFotos::findOrFail($foto->id);
            $inmueble_foto->orden = $request->{'orden_'.$foto->id};
            if($request->{'destacado_'.$foto->id} != null)
                $inmueble_foto->es_destacado = 1;
            else
                $inmueble_foto->es_destacado = 0;

            $inmueble_foto->update();

            //return $request->{'orden_'.$foto->id};
            //$request->'destacado_'.$foto->id;
        }

        return redirect()->route('publicInmuebleFotos.index', $request->id)->with('info', 'Se creo el tipo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inmueble_foto = InmuebleFotos::findOrFail($id);
        $idInmueble = $inmueble_foto->inmueble_id;
        $inmueble_foto->delete();
        return redirect()->route('publicInmuebleFotos.index', $idInmueble)->with('info', 'Se creo el tipo satisfactoriamente');
    }
}