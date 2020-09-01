<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operacion;

class Inmueble extends Model
{
    public $table = 'inmueble';

    public function operacion()
    {
        return $this->belongsTo(Operacion::class, 'operacion_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function fotos(){
        return $this->hasMany(InmuebleFotos::class, 'inmueble_id');
    }

    public function videos(){
        return $this->hasMany(InmuebleVideos::class, 'inmueble_id');
    }
}
