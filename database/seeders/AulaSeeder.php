<?php

namespace Database\Seeders;

use App\Models\Aula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_aula = new Aula();
        $n_aula->name = 'Aula 1';
        $n_aula->shortname = 'A1';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula 2';
        $n_aula->shortname = 'A2';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula 3';
        $n_aula->shortname = 'A3';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula 4';
        $n_aula->shortname = 'A4';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula 5';
        $n_aula->shortname = 'A5';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula 6';
        $n_aula->shortname = 'A6';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 1;
        $n_aula->sede_id = 1;
        $n_aula->save();

        $n_aula = new Aula();
        $n_aula->name = 'Aula V7';
        $n_aula->shortname = 'V7';
        $n_aula->capacidad = '30';
        $n_aula->taula_id = 2;
        $n_aula->sede_id = 1;
        $n_aula->save();
    }
}
