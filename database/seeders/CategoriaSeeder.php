<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'codigo' => 'LANGMARC',
            'nombre' => 'Lenguaje de marcas',
        ]);

        DB::table('categorias')->insert([
            'codigo' => 'PROG',
            'nombre' => 'Programación',
        ]);

        DB::table('categorias')->insert([
            'codigo' => 'BBDD',
            'nombre' => 'Bases de datos',
        ]);

        DB::table('categorias')->insert([
            'codigo' => 'DEVENV',
            'nombre' => 'Entornos de desarrollo',
        ]);

        DB::table('categorias')->insert([
            'codigo' => 'SYSTEM',
            'nombre' => 'Sistemas informáticos',
        ]);
    }
}
