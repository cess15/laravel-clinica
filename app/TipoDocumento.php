<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public $table = "tipo_documento";

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'documento_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'documento_id');
    }
}
