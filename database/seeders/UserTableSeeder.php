<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \DB::table('users')->insert([
            ['nombre' => "Pablo", 'primer_apellido' => 'Gasparin', 'dob'=>'2000-10-10','email' => 'admin@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 1, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
        ]);
    }
}
