<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatEntidadFederativaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('cat_entidad_federativas')->insert([
            ['nom_estado' => 'AGUASCALIENTES'],
            ['nom_estado' => 'BAJA CALIFORNIA'],
            ['nom_estado' => 'BAJA CALIFORNIA SUR'],
            ['nom_estado' => 'CAMPECHE'],
            ['nom_estado' => 'CHIAPAS'],
            ['nom_estado' => 'CHIHUAHUA'],
            ['nom_estado' => 'COAHUILA'],
            ['nom_estado' => 'COLIMA'],
            ['nom_estado' => 'DF/CDMX'],
            ['nom_estado' => 'DURANGO'],
            ['nom_estado' => 'GUANAJUATO'],
            ['nom_estado' => 'GUERRERO'],
            ['nom_estado' => 'HIDALGO'],
            ['nom_estado' => 'JALISCO'],
            ['nom_estado' => 'ESTADO DE MÉXICO'],
            ['nom_estado' => 'MICHOACÁN'],
            ['nom_estado' => 'MORELOS'],
            ['nom_estado' => 'NAYARIT'],
            ['nom_estado' => 'NUEVO LEÓN'],
            ['nom_estado' => 'OAXACA'],
            ['nom_estado' => 'PUEBLA'],
            ['nom_estado' => 'QUERÉTARO'],
            ['nom_estado' => 'QUINTANA ROO'],
            ['nom_estado' => 'SAN LUIS POTOSÍ'],
            ['nom_estado' => 'SINALOA'],
            ['nom_estado' => 'SONORA'],
            ['nom_estado' => 'TABASCO'],
            ['nom_estado' => 'TAMAULIPAS'],
            ['nom_estado' => 'TLAXCALA'],
            ['nom_estado' => 'VERACRUZ'],
            ['nom_estado' => 'YUCATÁN'],
            ['nom_estado' => 'ZACATECAS']
        ]);
    }
}
