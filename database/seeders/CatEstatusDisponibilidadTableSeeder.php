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
            ['nombre' => "Vendido", 'color' => '#138d75', 'descripcion' => "Indica que se encuentra vendido, liquidado en su totalidad."],
            ['nombre' => "Disponible", 'color' => '#2e86c1', 'descripcion' => "Indica que se encuentra disponible"],
            ['nombre' => "Reservado", 'color' => '#f1c40f', 'descripcion' => "Indica que se encuentra reservado con contrato y enganche."]
        ]);
    }
}
