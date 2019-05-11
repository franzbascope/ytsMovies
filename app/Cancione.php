<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancione extends Model
{
    public $timestamps = false;
    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }
}
