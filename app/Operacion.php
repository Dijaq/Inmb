<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inmueble;

class Operacion extends Model
{
    public $table = 'operacion';

    public function inmuebles(){
        return $this->hasMany(Inmueble::class, 'operacion_id');
    }
}
