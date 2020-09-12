<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $fillable = [
        'guardian', 'nombre'
    ];

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(User::class, 'permitido');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function roles()
    {
        return $this->morphedByMany(Roles::class, 'permitido');
    }
}
