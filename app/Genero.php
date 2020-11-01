<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'genero_id');
    }
}
