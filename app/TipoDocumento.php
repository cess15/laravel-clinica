<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    public $table="tipo_documento";

    public function medico(){
        return $this->hasMany(Medico::class,'documento_id');
    }
}
