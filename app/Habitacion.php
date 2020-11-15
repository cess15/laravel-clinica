<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public $table = "habitaciones";

    public function pisos()
    {
        return $this->belongsTo(Piso::class, 'piso_id');
    }
    public function estadoHabitacion()
    {
        return $this->belongsTo(EstadoHabitacion::class, 'estado_id');
    }
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_id');
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }
    public function internaciones()
    {
        return $this->belongsTo(Internacion::class, 'habitacion_id');
    }
}
