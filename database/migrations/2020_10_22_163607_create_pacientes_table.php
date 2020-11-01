<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('documento_id')->nullable();
            $table->unsignedInteger('medico_id')->nullable();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('num_documento', 10)->unique();
            $table->string('domicilio');
            $table->boolean('esta_internado')->default(0);
            $table->timestamps();

            $table->foreign('documento_id')
                ->references('id')
                ->on('tipo_documento')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('medico_id')
            ->references('id')
            ->on('medicos')
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
        Schema::dropIfExists('pacientes');
    }
}
