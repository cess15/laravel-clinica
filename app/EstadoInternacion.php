<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoInternacion extends Model
{
    public $table = "estado_internacion";

    public function internaciones()
    {
        return $this->hasMany(Internacion::class, 'estado_id');
    }
}
