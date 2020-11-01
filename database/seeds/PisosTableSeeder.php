<?php

use Illuminate\Database\Seeder;

class PisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('pisos')->insert([
            [
                "id" => 1,
                "descripcion" => "Planta Baja"
            ],
            [
                "id" => 2,
                "descripcion" => "Primer Piso"
            ],
            [
                "id" => 3,
                "descripcion" => "Segundo Piso"
            ],
            [
                "id" => 4,
                "descripcion" => "Tercer Piso"
            ],
            [
                "id" => 5,
                "descripcion" => "Cuarto Piso"
            ],
            [
                "id" => 6,
                "descripcion" => "Quinto Piso"
            ],
            [
                "id" => 7,
                "descripcion" => "Último Piso"
            ],
        ]);
    }
}
