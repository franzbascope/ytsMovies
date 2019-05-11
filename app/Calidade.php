<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($calidades)
 */
class Calidade extends Model
{
    public $timestamps = false;



    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class);
    }

    public function relacionTiene()
    {
        return $this->belongsToMany(Pelicula::class);
    }

    public function similars()
    {
        return $this->hasMany(Pelicula::class);
    }



}
