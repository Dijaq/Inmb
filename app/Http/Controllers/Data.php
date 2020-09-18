<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Data extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(file_exists(public_path('storage'))){
            return $this->error('THe public/storage already exists');
        }

        $this->laravel->make('files')->link(
            storage_path('app/public'), public_path('storage')
        );

        $this->info('The public directory has been linked');

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuesta = Encuesta::findOrFail($id);
        $encuesta->fechaInicio =  date("Y-m-d", strtotime($encuesta->fechaInicio));
        $encuesta->fechaFin =  date("Y-m-d", strtotime($encuesta->fechaFin));
        return view('encuestas.edit', compact('encuesta'));
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
        $encuesta = Encuesta::findOrFail($id);
        $encuesta->name = $request->input('name');
        $encuesta->fechaInicio = $request->input('fechaInicio');
        $encuesta->fechaFin = $request->input('fechaFin');

        $encuesta->update();

        return redirect()->route('encuesta.index');
    }
}
