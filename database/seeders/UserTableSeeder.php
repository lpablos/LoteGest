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
            ['nombre' => "Luis Jorge", 'primer_apellido' => 'Pablo', 'dob'=>'2000-10-10','email' => 'lpablo@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 1, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
            ['nombre' => "Alberto", 'primer_apellido' => 'Hernández', 'dob'=>'2000-10-10','email' => 'alberto@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 4, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
            ['nombre' => "Tania", 'primer_apellido' => 'Medina Marcos', 'dob'=>'2000-10-10','email' => 'tania@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 4, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
            // ['nombre' => "Roberto", 'primer_apellido' => 'Gonzáles', 'dob'=>'2000-10-10','email' => 'admin@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 3, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
            // ['nombre' => "Juan Alberto", 'primer_apellido' => 'Morales', 'dob'=>'2000-10-10','email' => 'corredor@arquitectos.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'images/avatar-1.jpg', 'role_id' => 4, 'estatus_id' => 1, 'fecha_registro' => now(), 'created_at' => now()],
        ]);
    }
}
