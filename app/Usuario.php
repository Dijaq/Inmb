<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Persona;

class Usuario extends Authenticatable
{
    use Notifiable;

    public $table = 'usuarios';

    protected $fillable = [
        'nombre','usr', 'pwd',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
}
