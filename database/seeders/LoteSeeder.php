<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lote;
use App\Models\Manzana;
use App\Models\CatEstatus;
use Illuminate\Support\Str;

class LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de tener manzanas y estatus existentes
        $manzanas = Manzana::all();
        $estatuses = CatEstatus::all();

        if ($manzanas->isEmpty() || $estatuses->isEmpty()) {
            $this->command->warn('No hay manzanas o estatus en la base de datos. Seeder cancelado.');
            return;
        }

        foreach ($manzanas as $manzana) {
            $cantidadLotes = rand(5, 15); // Crea entre 5 y 15 lotes por manzana

            for ($i = 0; $i < $cantidadLotes; $i++) {
                Lote::create([
                    'frente_m' => rand(5, 20) + rand(0, 99) / 100,
                    'fondo_m' => rand(10, 30) + rand(0, 99) / 100,
                    'superficie_m2' => rand(100, 300) + rand(0, 99) / 100,
                    'precio_contado' => rand(50000, 100000),
                    'precio_credito' => rand(110000, 150000),
                    'plano' => 'plano_' . Str::random(5) . '.pdf',
                    'observaciones' => 'Observaciones del lote ' . ($i + 1) . ' en manzana ' . $manzana->id,
                    'manzana_id' => $manzana->id,
                    'cat_estatus_id' => $estatuses->random()->id,
                ]);
            }
        }
    }
}
