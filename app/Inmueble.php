<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operacion;
use App\Tipo;

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

    public function distrito()
    {
        return $this->belongsTo(UbicacionDistrito::class, 'ubigeo_distrito_id');
    }

    public function provincia()
    {
        return $this->belongsTo(UbicacionProvincia::class, 'ubigeo_provincia_id');
    }

    public function fotos(){
        return $this->hasMany(InmuebleFotos::class, 'inmueble_id');
    }

    public function videos(){
        return $this->hasMany(InmuebleVideos::class, 'inmueble_id');
    }

    public function atributos_inmueble(){
        return $this->hasMany(AtributoInmueble::class, 'inmueble_id');
    }

    public function servicios_inmueble(){
        return $this->hasMany(ServicioInmueble::class, 'inmueble_id');
    }
}
