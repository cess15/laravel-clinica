<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'documento_id');
    }

    public function medicos()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }
}
