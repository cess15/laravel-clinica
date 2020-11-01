<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    public $table = "tipo_habitacion";

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipo_id');
    }
}
