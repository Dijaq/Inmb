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
        /*$distro = new DistribucionPublicidad;
        $distro->name = 'Principal';
        $distro->estado = 2;
        $distro->save();

        $distro = new DistribucionPublicidad;
        $distro->name = 'Secundaria';
        $distro->estado = 2;
        $distro->save();
*/
        $user = new User;
        $user->usr = 'diego';
        $user->pwd = bcrypt('123456');
        $user->nombre = 'Diego';
        $user->rol = 'ADMIN';
        $user->save();

   /*     $user = new User;
        $user->name = 'Carla';
        $user->lastName = 'García Linares';
        $user->email = 'Carla200028@hotmail.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();*/

        /*$user = new User;
        $user->name = 'Maria Luisa';
        $user->lastName = 'Alvarez Vera';
        $user->email = 'marlui1686@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();

        $user = new User;
        $user->name = 'Christian';
        $user->lastName = 'Lupaca Huamaní';
        $user->email = 'christluh@outlook.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();

        $user = new User;
        $user->name = 'Leslie';
        $user->lastName = 'Navinta Alfaro';
        $user->email = 'leskarenalfaro@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();

        $user = new User;
        $user->name = 'Rosario';
        $user->lastName = 'Alarizo';
        $user->email = 'charo_ala@yahoo.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();

        $user = new User;
        $user->name = 'Maria Luz';
        $user->lastName = 'Cruz Arosquipa';
        $user->email = 'Marialuz_ca@gmail.com';
        $user->password = bcrypt('123456');
        $user->idRole = 1;
        $user->estado = 2;
        $user->save();



        $role = new Role;
        $role->name = 'admin';
        $role->displayName = 'Administrador';
        $role->description = 'Encargado de administrar el sitio web';
        $role->estado = 2;
        $role->save();

        $prioridad = new Prioridad;
        $prioridad->name = 'Principal';
        $prioridad->estado = 2;
        $prioridad->save();

        $prioridad = new Prioridad;
        $prioridad->name = 'Secundaria';
        $prioridad->estado = 2;
        $prioridad->save();

        $prioridad = new Prioridad;
        $prioridad->name = 'Local';
        $prioridad->estado = 2;
        $prioridad->save();

        $prioridad = new Prioridad;
        $prioridad->name = 'Sin Prioridad';
        $prioridad->estado = 2;
        $prioridad->save();

        $label = new Label;
        $label->name = 'Politica';
        $label->color = '#690';
        $label->orden = 1;
        $label->estado = 2;
        $label->save();

        $tipoGaleria = new TipoGaleria;
        $tipoGaleria->name = 'Foto';
        $tipoGaleria->estado = 2;
        $tipoGaleria->save();

        $tipoGaleria = new TipoGaleria;
        $tipoGaleria->name = 'Galeria de Fotos';
        $tipoGaleria->estado = 2;
        $tipoGaleria->save();

        $tipoGaleria = new TipoGaleria;
        $tipoGaleria->name = 'Video';
        $tipoGaleria->estado = 2;
        $tipoGaleria->save();

        $tipoGaleria = new TipoGaleria;
        $tipoGaleria->name = 'Audio';
        $tipoGaleria->estado = 2;
        $tipoGaleria->save();

        $tipoDirectorio = new TipoDirectorio;
        $tipoDirectorio->name = 'news';
        $tipoDirectorio->displayName = 'Noticias';
        $tipoDirectorio->estado = 2;
        $tipoDirectorio->save();
        
        $tipoDirectorio = new TipoDirectorio;
        $tipoDirectorio->name = 'publicity';
        $tipoDirectorio->displayName = 'Publicidad';
        $tipoDirectorio->estado = 2;
        $tipoDirectorio->save();*/

        return 'Datos cargados';

        //$listImagenes = new \stdClass();


        //return view('main_news.prueba',compact('listImagenes'));
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
