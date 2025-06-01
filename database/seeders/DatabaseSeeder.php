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
            // FraccionamientoSeeder::class,
            // LoteSeeder::class,
            CatEstatusTableSeeder::class,
            UserTableSeeder::class,
            ProyectoSeeder::class,
        ]);
    }
}
