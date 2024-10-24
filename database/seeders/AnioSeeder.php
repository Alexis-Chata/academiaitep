<?php

namespace Database\Seeders;

use App\Models\anio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_anio = new anio();
        $n_anio->name = 2023;
        $n_anio->id_categoria_moodle = 1;
        $n_anio->save();

        $n_anio = new anio();
        $n_anio->name = 2024;
        $n_anio->id_categoria_moodle = 2;
        $n_anio->save();

        $n_anio = new anio();
        $n_anio->name = 2025;
        $n_anio->id_categoria_moodle = 3;
        $n_anio->save();
    }
}
