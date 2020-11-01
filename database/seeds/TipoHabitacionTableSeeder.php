<?php

use Illuminate\Database\Seeder;

class TipoHabitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('tipo_habitacion')->insert([
            [
                "id" => 1,
                "descripcion" => "Simple"
            ],
            [
                "id" => 2,
                "descripcion" => "Doble"
            ]
        ]);
    }
}
