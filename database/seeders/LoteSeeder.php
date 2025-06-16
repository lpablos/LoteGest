<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lote;
use App\Models\Manzana;
use App\Models\CatEstatus;
use Illuminate\Support\Str;
use App\Models\Fraccionamiento;

class LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $Fraccionamientos = Fraccionamiento::all();

        foreach ($Fraccionamientos as $Fraccionamiento) {
            $cantidadLotes = rand(5, 10); // Crea entre 5 y 15 lotes por manzana

            for ($i = 0; $i < $cantidadLotes; $i++) {
                Lote::create([
                    'num_lote'=> rand(5, 20),
                    'medidas_m' => '5 m Ancho * 7 m Fondo',
                    'superficie_m2' => rand(100, 300) + rand(0, 99) / 100,
                    'precio_contado' => rand(50000, 100000),
                    'precio_credito' => rand(110000, 150000),
                    'manzana' => rand(5, 1),
                    'colinda_norte' => 'Colinda en esta dirección norte',
                    'colinda_sur' => 'Colinda en esta dirección sur',
                    'colinda_este' => 'Colinda en esta dirección este',
                    'colinda_oeste' => 'Colinda en esta dirección oeste',
                    'observaciones' => 'Observaciones del lote ' . ($i + 1) . ' en manzana ',
                    'fraccionamiento_id' => $Fraccionamiento->id,
                    'cat_estatus_disponibilidad_id' => 1,
                    // 'user_corredor_id' => 1
                    // 'plano' => 'plano_' . Str::random(5) . '.pdf',
                    // 'manzana_id' => $manzana->id,
                ]);
            }
        }
    }
}
