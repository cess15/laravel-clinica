<?php

use Illuminate\Database\Seeder;

class EstadoHabitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('estado_habitacion')->insert([
            [
                "id" => 1,
                "descripcion" => "Disponible"
            ],
            [
                "id" => 2,
                "descripcion" => "Ocupada"
            ]
        ]);
    }
}
