<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{
    public $table = "estado_habitacion";

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'estado_id');
    }
}
