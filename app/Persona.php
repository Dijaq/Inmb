<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Persona extends Model
{
    public $table = 'personas';

    public function usuario(){
        return $this->hasMany(Usuario::class, 'persona_id');
    }
}
