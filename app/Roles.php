<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['nombre'];

    /**
     * Devuelve todas las imagenes del stand.
     */
    public function permisos(){
        return $this->morphToMany(Permisos::class, 'permitido');
    }
}
