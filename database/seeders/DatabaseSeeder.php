<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            RolSeeder::class,
            PreguntaRespuestaSeeder::class
        ]);

        DB::table('users')->insert([
            'name' => 'SuperAdmin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('Admin_123'),
            'first_name' => 'Super',
            'surname_1' => 'Admin',
            'surname_2' => 'Prueba',
            'id_rol' => 1
        ]);

        User::factory(10)->create();
    }
}
