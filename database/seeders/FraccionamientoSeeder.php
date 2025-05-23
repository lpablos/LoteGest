<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fraccionamiento;

class FraccionamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Fraccionamiento::create([
            'proyecto_id' => 1,
            'nombre' => 'Palmas I',
            'superficie_m2' => 20000,
            'cantidad_lotes' => 20,
            'uso_predominante' => 'Habitacional',
            'etapa' => 'Etapa 1',
            'servicios_disponibles' => json_encode(['agua', 'luz', 'drenaje']),
            'observaciones' => 'Primera etapa del residencial',
        ]);

        Fraccionamiento::create([
            'proyecto_id' => 2,
            'nombre' => 'Industrial Norte A',
            'superficie_m2' => 80000,
            'cantidad_lotes' => 10,
            'uso_predominante' => 'Comercial',
            'etapa' => 'Etapa única',
            'servicios_disponibles' => json_encode(['agua', 'luz', 'gas']),
            'observaciones' => 'Fraccionamiento industrial con grandes lotes',
        ]);
    }
}
