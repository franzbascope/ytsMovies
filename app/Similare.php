<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Similare extends Model
{
    public $timestamps = false;
    public function similares()
    {
        return $this->belongsToMany(Pelicula::class);
    }
}
