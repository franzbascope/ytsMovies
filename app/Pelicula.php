<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Pelicula extends Model
{
    public $timestamps = false;
    public function calidades()
    {
        return $this->belongsToMany(Calidade::class);
    }
    public function similares()
    {
        return $this->hasMany(Similare::class);
    }
}
