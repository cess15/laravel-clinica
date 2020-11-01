<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(PisosTableSeeder::class);
        $this->call(EstadoHabitacionTableSeeder::class);
        $this->call(TipoHabitacionTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
    }
}
