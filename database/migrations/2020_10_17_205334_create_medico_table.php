<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('documento_id')->nullable();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('num_documento', 10)->unique();
            $table->string('especialidad');
            $table->string('num_celular', 10);
            $table->timestamps();

            $table->foreign('documento_id')
                ->references('id')
                ->on('tipo_documento')
                ->onUpdate('cascade')
                ->onDelete('cascade');
    // ...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico');
    }
}
