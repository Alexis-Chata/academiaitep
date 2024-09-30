<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nro = User::all()->count() + 1;
        $user = User::factory()->create([
            'name' => 'Test User' . $nro,
            'email' => 'test' . $nro . '@example.com',
            'ap_paterno' => 'Jadem',
            'direccion' => 'direccion',
            'password' => bcrypt('12345678'),
            'ap_materno' => 'Learning',
            'f_tipo_documento_id' => 'dni',
            'nro_documento' => '12345678',
            'estado' => '1',
            'locked' => '1',
        ]);

        $user->assignRole(['Administrador', 'Super_Administrador']);

        $nro = User::all()->count() + 1;
        $user = User::factory()->create([
            'name' => 'Test User' . $nro,
            'email' => 'test' . $nro . '@example.com',
            'ap_paterno' => 'Jadem',
            'direccion' => 'direccion',
            'password' => bcrypt('12345678'),
            'ap_materno' => 'Learning',
            'f_tipo_documento_id' => 'dni',
            'nro_documento' => '12345678',
            'estado' => '1',
            'locked' => '1',
        ]);

        $user->assignRole(['Administrador', 'Super_Administrador']);

        $nro = User::all()->count() + 1;
        $user = User::factory()->create([
            'name' => 'Test User' . $nro,
            'email' => 'test' . $nro . '@example.com',
            'ap_paterno' => 'Jadem',
            'direccion' => 'direccion',
            'password' => bcrypt('12345678'),
            'ap_materno' => 'Learning',
            'f_tipo_documento_id' => 'dni',
            'nro_documento' => '12345678',
            'estado' => '1',
            'locked' => '1',
        ]);

        $user->assignRole(['Administrador', 'Super_Administrador']);
    }
}
