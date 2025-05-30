<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         Proyecto::create([
            'nombre' => 'Residencial Las Palmas',
            'ubicacion' => 'Ciudad Verde, Estado Central',
            'latitud' => 19.4326,
            'longitud' => -99.1332,
            'superficie_total_m2' => 50000,
            'cantidad_fraccionamientos' => 2,
            'estado_actual' => 'En desarrollo',
            'fecha_inicio' => '2025-01-01',
            'fecha_fin_estimada' => '2025-12-31',
            //'responsable_proyecto' => 'Inversiones del Valle S.A.',
            'observaciones' => 'Proyecto residencial de nivel medio',
        ]);

        Proyecto::create([
            'nombre' => 'Parque Industrial Norte',
            'ubicacion' => 'Parque Norte, Estado Industrial',
            'latitud' => 20.9876,
            'longitud' => -100.1234,
            'superficie_total_m2' => 120000,
            'cantidad_fraccionamientos' => 1,
            'estado_actual' => 'Planificado',
            'fecha_inicio' => '2025-06-01',
            'fecha_fin_estimada' => '2026-06-01',
            //'responsable_proyecto' => 'Grupo Constructor Alfa',
            'observaciones' => 'Fraccionamiento industrial con alta demanda',
        ]);
    }
}
