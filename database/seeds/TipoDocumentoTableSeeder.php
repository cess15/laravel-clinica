<?php

use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('tipo_documento')->insert([
            [
                "id" => 1,
                "descripcion" => 'Pasaporte'
            ],
            [
                "id" => 2,
                "descripcion" => "Cédula"
            ]
        ]);
    }
}
