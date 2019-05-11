<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    public $timestamps = false;
    public function canciones()
    {
        return $this->hasMany(Cancione::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
