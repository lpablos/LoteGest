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
        Fraccionamiento::create([
            'nombre'         => 'Fraccionamiento Las Palmas',
            'reponsable'     => 'Carlos Pérez',
            'propietaria'    => 'Ana Torres',
            'predio_urbano'  => 'PU-001',
            'superficie'     => 1500.75,
            'ubicacion'      => 'Calle 123, Ciudad',
            'proyecto_id'    => 1,
            'tipo_predios_id'=> 1,
            'observaciones'  => 'Terreno cercado.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        Fraccionamiento::create([
            'nombre'         => 'Residencial El Prado',
            'reponsable'     => 'María Gómez',
            'propietaria'    => 'Inversiones S.A.',
            'predio_urbano'  => 'PU-002',
            'superficie'     => 2000.00,
            'ubicacion'      => 'Av. Siempre Viva 742',
            'proyecto_id'    => 2,
            'tipo_predios_id'=> 2,
            'observaciones'  => 'Listo para construir.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        Fraccionamiento::create([
            'nombre'         => 'Villa del Sol',
            'reponsable'     => 'Juan López',
            'propietaria'    => 'Cooperativa El Sol',
            'predio_urbano'  => 'PU-003',
            'superficie'     => 1750.25,
            'ubicacion'      => 'Zona Industrial Sur',
            'proyecto_id'    => 3,
            'tipo_predios_id'=> 3,
            'observaciones'  => 'Requiere nivelación.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        Fraccionamiento::create([
            'nombre'         => 'Urbanización El Prado II',
            'reponsable'     => 'Lucía Fernández',
            'propietaria'    => 'Hermanos Rojas',
            'predio_urbano'  => 'PU-004',
            'superficie'     => 1320.50,
            'ubicacion'      => 'Lote 45, Urb. El Prado',
            'proyecto_id'    => 1,
            'tipo_predios_id'=> 2,
            'observaciones'  => 'Cerca a servicios básicos.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        Fraccionamiento::create([
            'nombre'         => 'Altos de Bolívar',
            'reponsable'     => 'Pedro Ruiz',
            'propietaria'    => 'Grupo Omega',
            'predio_urbano'  => 'PU-005',
            'superficie'     => 2450.00,
            'ubicacion'      => 'Calle Bolívar N°78',
            'proyecto_id'    => 2,
            'tipo_predios_id'=> 3,
            'observaciones'  => 'Ubicación estratégica.',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        Fraccionamiento::create([
            'nombre'         => 'Sector Norte F',
            'reponsable'     => 'Verónica Salas',
            'propietaria'    => 'Municipalidad Central',
            'predio_urbano'  => 'PU-006',
            'superficie'     => 1890.90,
            'ubicacion'      => 'Sector Norte, Manzana F',
            'proyecto_id'    => 3,
            'tipo_predios_id'=> 1,
            'observaciones'  => 'Documentación completa.',
            'created_at'     => now(),
            'updated_at'     => now(),            
        ]);

    }
}
