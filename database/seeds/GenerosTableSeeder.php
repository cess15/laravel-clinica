<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('generos')->insert([
            [
                "id" => 1,
                "descripcion" => "Masculino"
            ],
            [
                "id" => 2,
                "descripcion" => "Femenino"
            ]
        ]);
    }
}
