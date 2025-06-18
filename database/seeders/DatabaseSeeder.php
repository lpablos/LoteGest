<?php

namespace Database\Seeders;

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
        $this->call([
            RoleTableSeeder::class,
            CatEstatusProyectoTableSeeder::class,
            CatEstatusTableSeeder::class,
            UserTableSeeder::class,
            CatTipoPredioTableSeeder::class,
            // ProyectoSeeder::class,s
            CatEstatusDisponibilidadTableSeeder::class,
            CatEntidadFederativaTableSeeder::class,
            CatMunicipiosTableSeeder::class,
            // ManzaSeeder::class,
            // FraccionamientoSeeder::class,
            // LoteSeeder::class,
        ]);
    }
}
