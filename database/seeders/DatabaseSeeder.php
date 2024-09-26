<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'ap_paterno' => 'Jadem',
            'password' => bcrypt('12345678'),
            'ap_materno' => 'Learning',
            'f_tipo_documento_id' => 'dni',
            'nro_documento' => '12345678',
            'estado' => '1',
            'locked' => '1',
        ]);
    }
}
