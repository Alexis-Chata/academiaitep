<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matricula::create([
            'user_id' => 1,
            'carrera' => "sistemas",
            'estado' => 1,
            'grupo_id' => 1,
            'fvencimiento' => now(),
        ]);
    }
}
