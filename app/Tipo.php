<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Atributo;
use App\Servicio;
use App\Inmueble;

class Tipo extends Model
{
    public $table = 'tipo';

    public function atributos(){
        return $this->hasMany(Atributo::class, 'tipo_id');
    }

    public function servicios(){
        return $this->hasMany(Servicio::class, 'tipo_id');
    }

    public function inmuebles(){
        return $this->hasMany(Inmueble::class, 'tipo_id');
    }
}
