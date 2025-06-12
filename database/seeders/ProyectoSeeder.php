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
            'nombre' => 'Michoacán',
            'fecha_inicio' => Carbon::parse('2025-05-19'),
            'responsable_proyecto' => 'Arq. Tania Medina Marcos',
            'observaciones' => 'Ubicado al sur de la ciudad, con lotes residenciales y comerciales.',
        ]);
    }
}
