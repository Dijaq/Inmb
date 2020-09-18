<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inmueble;
use App\InmuebleFotos;
use App\Operacion;
use App\Tipo;
use Mail;

class WebControllerMensajes extends Controller
{
    
    public function post(Request $request)
    {
        return $request;
        return redirect()->route('/')->with('info', 'Se creo el tipo satisfactoriamente');
    }

    public function sendMessage(Request $request)
    {
        $msg ="Mensaje";
        $subject = "Probando Envío de Correos";
        $for = "diego.javier@gerware.com";
        Mail::send('email',$request->all(), function($msj) use($subject,$for){
            $msj->from("dijaq08@gmail.com","Vivela");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    
    }

}
