<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $manzanas = [
            // Fraccionamiento 1
            [
                'num_lotes' => 10,
                'colinda_norte' => 'Calle 1',
                'colinda_sur' => 'Calle 2',
                'colinda_este' => 'Parque A',
                'colinda_oeste' => 'Av. Principal',
                'fraccionamiento_id' => 1,
            ],
            [
                'num_lotes' => 12,
                'colinda_norte' => 'Av. Robles',
                'colinda_sur' => 'Calle Sauce',
                'colinda_este' => 'Escuela',
                'colinda_oeste' => 'Zona verde',
                'fraccionamiento_id' => 1,
            ],
            [
                'num_lotes' => 8,
                'colinda_norte' => 'Calle F',
                'colinda_sur' => 'Calle G',
                'colinda_este' => 'Terreno baldío',
                'colinda_oeste' => 'Callejón sin salida',
                'fraccionamiento_id' => 1,
            ],

            // Fraccionamiento 2
            [
                'num_lotes' => 15,
                'colinda_norte' => 'Jardín',
                'colinda_sur' => 'Zona industrial',
                'colinda_este' => 'Calle 3',
                'colinda_oeste' => 'Bodega',
                'fraccionamiento_id' => 2,
            ],
            [
                'num_lotes' => 11,
                'colinda_norte' => 'Cancha',
                'colinda_sur' => 'Piscina',
                'colinda_este' => 'Av. Central',
                'colinda_oeste' => 'Comisaría',
                'fraccionamiento_id' => 2,
            ],
            [
                'num_lotes' => 9,
                'colinda_norte' => 'Mercado',
                'colinda_sur' => 'Callejón Los Pinos',
                'colinda_este' => 'Iglesia',
                'colinda_oeste' => 'Biblioteca',
                'fraccionamiento_id' => 2,
            ],

            // Fraccionamiento 3
            [
                'num_lotes' => 14,
                'colinda_norte' => 'Hospital',
                'colinda_sur' => 'Universidad',
                'colinda_este' => 'Estación de bus',
                'colinda_oeste' => 'Centro comercial',
                'fraccionamiento_id' => 3,
            ],
            [
                'num_lotes' => 7,
                'colinda_norte' => 'Río Verde',
                'colinda_sur' => 'Campo de fútbol',
                'colinda_este' => 'Granero',
                'colinda_oeste' => 'Zona agrícola',
                'fraccionamiento_id' => 3,
            ],
            [
                'num_lotes' => 16,
                'colinda_norte' => 'Calle 9',
                'colinda_sur' => 'Calle 10',
                'colinda_este' => 'Residencias El Bosque',
                'colinda_oeste' => 'Hotel Central',
                'fraccionamiento_id' => 3,
            ],
        ];

        foreach ($manzanas as $manzana) {
            DB::table('manzanas')->insert(array_merge($manzana, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
