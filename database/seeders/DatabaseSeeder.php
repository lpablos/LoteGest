<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CustomersSeeder;
use App\Models\Fraccionamiento;
use App\Models\Lote;
use App\Models\Proyecto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CustomersSeeder::class);

        // Registros para proyecto->fraccionamiento y Lote----*
        $this->call(ProyectoSeeder::class);
        $this->call(FraccionamientoSeeder::class);
        $this->call(LoteSeeder::class);
        //-----------------------------------------------------*
    }
}
