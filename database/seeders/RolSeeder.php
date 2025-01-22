<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            "codigo" => "SADMIN",
            "nombre" => "Super Administrador"
        ]);
        DB::table('roles')->insert([
            "codigo" => "ADMIN",
            "nombre" => "Administrador"
        ]);
        DB::table('roles')->insert([
            "codigo" => "PLAYER",
            "nombre" => "Jugador"
        ]);
    }
}
