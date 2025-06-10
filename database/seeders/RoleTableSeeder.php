<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
            ['nombre' => "Director"],
            ['nombre' => "Auditor"],
            ['nombre' => "Administrador"],
            ['nombre' => "Corredor"]
        ]);
    }
}
