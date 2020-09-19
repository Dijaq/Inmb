<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WebControllerEmail;
use App\Mensaje;
use Illuminate\Support\Facades\Mail;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Mensaje::all();
        return $mensajes;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = [
            'link_verificacion' => 'https://www.vivelaovendela.com.pe/verificacion/123456'
        ];
        Mail::to('dijaq08@gmail.com')->send(new WebControllerEmail($details));
        return "Mensaje enviado";
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
            $mensaje = new Mensaje();
            $mensaje->inmueble_id = $request->inmueble_id;
            $mensaje->usuario_origen_id = $request->usuario_origen_id;
            $mensaje->usuario_destino_id = $request->usuario_destino_id;
            $mensaje->mensaje = $request->mensaje;
            $mensaje->fecha_envio = now();
            $mensaje->save();

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
        //
    }
}
