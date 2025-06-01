<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use Illuminate\Support\Carbon;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Proyecto::create([
            'nombre' => 'Fraccionamiento El Mirador',
            'fecha_inicio' => Carbon::parse('2024-11-01'),
            'responsable_proyecto' => 'Lic. Rodrigo Chávez',
            'clave' => 'FRACC-001',
            'observaciones' => 'Ubicado al sur de la ciudad, con lotes residenciales y comerciales.',
            'estatus_proyecto_id' => 1, // Planeado
        ]);

        Proyecto::create([
            'nombre' => 'Residencial Las Palmas',
            'fecha_inicio' => Carbon::parse('2025-01-10'),
            'responsable_proyecto' => 'Ing. Mariana López',
            'clave' => 'FRACC-002',
            'observaciones' => 'Fraccionamiento privado con amenidades y áreas verdes.',
            'estatus_proyecto_id' => 2, // En ejecución
        ]);

        Proyecto::create([
            'nombre' => 'Terrenos Campestres La Cumbre',
            'fecha_inicio' => Carbon::parse('2023-08-15'),
            'responsable_proyecto' => 'Arq. Ernesto Salazar',
            'clave' => 'FRACC-003',
            'observaciones' => 'Terrenos rústicos con vista panorámica, listos para escriturar.',
            'estatus_proyecto_id' => 3, // Finalizado
        ]);
    }
}
