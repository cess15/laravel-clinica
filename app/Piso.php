<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'piso_id');
    }
}
