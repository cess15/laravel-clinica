<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('piso_id');
            $table->unsignedInteger('estado_id');
            $table->unsignedInteger('tipo_id');
            $table->unsignedInteger('genero_id');
            $table->string('numero');
            $table->boolean('hay_paciente')->default(0);
            $table->timestamps();

            $table->foreign('piso_id')
                ->references('id')
                ->on('pisos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado_habitacion')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('tipo_id')
                ->references('id')
                ->on('tipo_habitacion')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('genero_id')
                ->references('id')
                ->on('generos')
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
        Schema::dropIfExists('habitaciones');
    }
}
