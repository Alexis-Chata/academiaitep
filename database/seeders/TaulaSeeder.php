<?php

namespace Database\Seeders;

use App\Models\Taula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_taula = new Taula();
        $n_taula->name = 'Fisico';
        $n_taula->save();

        $n_taula = new Taula();
        $n_taula->name = 'Virtual';
        $n_taula->save();
    }
}
