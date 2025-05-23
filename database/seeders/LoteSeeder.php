<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lote;

class LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lotes para fraccionamiento_id = 1 (Palmas I)
        Lote::create([
            'fraccionamiento_id' => 1,
            'numero_lote' => 'A1',
            'superficie_m2' => 200,
            'frente_m' => 10,
            'fondo_m' => 20,
            'orientacion' => 'Norte',
            'disponible' => true,
            'precio_m2' => 1200,
            'precio_total' => 240000,
            'uso' => 'Habitacional',
            'estado_legal' => 'Escriturado',
        ]);

        Lote::create([
            'fraccionamiento_id' => 1,
            'numero_lote' => 'A2',
            'superficie_m2' => 180,
            'frente_m' => 9,
            'fondo_m' => 20,
            'orientacion' => 'Sur',
            'disponible' => true,
            'precio_m2' => 1200,
            'precio_total' => 216000,
            'uso' => 'Habitacional',
            'estado_legal' => 'En trámite',
        ]);

        Lote::create([
            'fraccionamiento_id' => 1,
            'numero_lote' => 'A3',
            'superficie_m2' => 220,
            'frente_m' => 11,
            'fondo_m' => 20,
            'orientacion' => 'Este',
            'disponible' => false,
            'precio_m2' => 1150,
            'precio_total' => 253000,
            'uso' => 'Habitacional',
            'estado_legal' => 'Reservado',
        ]);

        Lote::create([
            'fraccionamiento_id' => 1,
            'numero_lote' => 'A4',
            'superficie_m2' => 210,
            'frente_m' => 10.5,
            'fondo_m' => 20,
            'orientacion' => 'Oeste',
            'disponible' => true,
            'precio_m2' => 1180,
            'precio_total' => 247800,
            'uso' => 'Habitacional',
            'estado_legal' => 'Escriturado',
        ]);

        // Lotes para fraccionamiento_id = 2 (Industrial Norte A)
        Lote::create([
            'fraccionamiento_id' => 2,
            'numero_lote' => 'B5',
            'superficie_m2' => 1500,
            'frente_m' => 30,
            'fondo_m' => 50,
            'orientacion' => 'Este',
            'disponible' => false,
            'precio_m2' => 900,
            'precio_total' => 1350000,
            'uso' => 'Comercial',
            'estado_legal' => 'Reservado',
        ]);

        Lote::create([
            'fraccionamiento_id' => 2,
            'numero_lote' => 'B6',
            'superficie_m2' => 1600,
            'frente_m' => 32,
            'fondo_m' => 50,
            'orientacion' => 'Norte',
            'disponible' => true,
            'precio_m2' => 950,
            'precio_total' => 1520000,
            'uso' => 'Comercial',
            'estado_legal' => 'Escriturado',
        ]);

        Lote::create([
            'fraccionamiento_id' => 2,
            'numero_lote' => 'B7',
            'superficie_m2' => 1400,
            'frente_m' => 28,
            'fondo_m' => 50,
            'orientacion' => 'Sur',
            'disponible' => true,
            'precio_m2' => 910,
            'precio_total' => 1274000,
            'uso' => 'Comercial',
            'estado_legal' => 'En trámite',
        ]);

        Lote::create([
            'fraccionamiento_id' => 2,
            'numero_lote' => 'B8',
            'superficie_m2' => 1700,
            'frente_m' => 34,
            'fondo_m' => 50,
            'orientacion' => 'Oeste',
            'disponible' => false,
            'precio_m2' => 930,
            'precio_total' => 1581000,
            'uso' => 'Comercial',
            'estado_legal' => 'Reservado',
        ]);
    }
}
