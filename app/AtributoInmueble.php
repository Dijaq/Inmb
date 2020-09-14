<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Atributo;

class AtributoInmueble extends Model
{
    public $table = 'atributo_inmueble';

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }

    public function atributo(){
        return $this->belongsTo(Atributo::class, 'atributo_id');
    }

}
