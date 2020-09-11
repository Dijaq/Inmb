<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    public $table = 'usuarios';

    protected $fillable = [
        'nombre','usr', 'pwd',
    ];
}
