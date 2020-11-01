<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'documento_id');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'medico_id');
    }
}
