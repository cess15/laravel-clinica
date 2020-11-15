<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paciente_id');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('habitacion_id');
            $table->unsignedInteger('estado_id');
            $table->string('motivo');
            $table->timestamps();

            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('medico_id')
                ->references('id')
                ->on('medicos')
                ->onUpdate('cascade')
                ->onDelete('cascade'); 
                
            $table->foreign('habitacion_id')
                ->references('id')
                ->on('habitaciones')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado_internacion')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internaciones');
    }
}
