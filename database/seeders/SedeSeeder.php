<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $n_taula = new Sede();
        $n_taula->name = 'Sede 1';
        $n_taula->direccion = 'Dirección 1';
        $n_taula->save();
        
    }
}
