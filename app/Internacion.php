<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internacion extends Model
{
    public $table = "internaciones";

    public function estadoInternacion()
    {
        return $this->belongsTo(EstadoInternacion::class, 'estado_id');
    }

    public function pacientes()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medicos()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function habitaciones()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }
}
