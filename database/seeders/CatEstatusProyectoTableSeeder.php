<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEstatusProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \DB::table('cat_estatus_proyectos')->insert([
            ['nombre' => "Iniciado", 'descripcion' => "Indica"],
            ['nombre' => "En Trámite", 'descripcion' => "Indica"],
            ['nombre' => "Finalizado", 'descripcion' => "Indica"]
        ]);
    }
}
