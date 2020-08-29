<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;

class Atributo extends Model
{
    public $table = 'atributo';

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
}
