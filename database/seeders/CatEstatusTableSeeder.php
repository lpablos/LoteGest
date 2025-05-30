<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cat_estatus')->insert([
            ['nombre' => "Activo", 'descripcion' => "Indica que se encuentra activo"],
            ['nombre' => "Inactivo", 'descripcion' => "Indica que se encuentra inactivo"]
        ]);
    }
}
