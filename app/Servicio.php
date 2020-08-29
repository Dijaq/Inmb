<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;

class Servicio extends Model
{
    public $table = 'servicio';

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
}
