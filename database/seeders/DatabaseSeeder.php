<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\tipo_vehiculo;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Lorem',
            'apellido' => 'Ipsum',
            'email' => 'test@test.com',
            'tipo_usuario' => 'Administador',
            'password' => Hash::make('test12345'),
            'fecha_registro' => date("d-m-y"),
            'tiempo_registro' => date("H:i:s")
        ]);
        User::create([
            'nombre' => 'Lorem',
            'apellido' => 'Ipsum',
            'email' => 'test2@test.com',
            'tipo_usuario' => 'Consultor',
            'password' => Hash::make('test12345'),
            'fecha_registro' => date("d-m-y"),
            'tiempo_registro' => date("H:i:s")
        ]);

        tipo_vehiculo::create([
            'tipo' => 'Camioneta'
        ]);
        tipo_vehiculo::create([
            'tipo' => 'Camión'
        ]);
        tipo_vehiculo::create([
            'tipo' => 'Semirremolque'
        ]);
        tipo_vehiculo::create([
            'tipo' => 'Remolque'
        ]);
        tipo_vehiculo::create([
            'tipo' => 'Balanceado'
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
