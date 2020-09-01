<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InmuebleVideos extends Model
{
    public $table = 'inmueble_videos';

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmueble_id');
    }
    
}
