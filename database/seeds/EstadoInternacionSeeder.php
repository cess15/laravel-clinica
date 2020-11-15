<?php

use Illuminate\Database\Seeder;

class EstadoInternacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('estado_internacion')->insert([
            [
                "id" => 1,
                "descripcion" => "En progreso"
            ],
            [
                "id" => 2,
                "descripcion" => "Culminada"
            ]
        ]);
    }
}
