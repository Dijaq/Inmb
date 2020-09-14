<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inmueble;

class ServicioInmueble extends Model
{
    public $table = 'servicio_inmueble';

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }
    
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
