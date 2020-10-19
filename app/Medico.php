<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    public $table="medico";

    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class,'documento_id');
    }
}
