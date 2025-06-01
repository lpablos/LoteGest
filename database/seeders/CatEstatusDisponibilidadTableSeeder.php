<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEstatusDisponibilidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cat_estatus_disponibilidad')->insert([
            ['nombre' => "Vendido", 'descripcion' => "Indica que se encuentra vendido."],
            ['nombre' => "Disponible", 'descripcion' => "Indica que se encuentra disponible"],
            ['nombre' => "Reservado", 'descripcion' => "Indica que se encuentra reservado."]
        ]);
    }
}
