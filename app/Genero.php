<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public function artistas()
    {
        return $this->hasMany(Artista::class);
    }
    public $timestamps = false;
}
