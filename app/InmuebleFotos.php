<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inmueble;

class InmuebleFotos extends Model
{
    public $table = 'inmueble_fotos';

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }
}
