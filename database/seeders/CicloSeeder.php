<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Verano';
        $n_ciclo->save();

        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Escolar';
        $n_ciclo->save();

        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Ceprunsa';
        $n_ciclo->save();

        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Ceprunsa Quintos';
        $n_ciclo->save();

        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Ordinario';
        $n_ciclo->save();

        $n_ciclo = new Ciclo();
        $n_ciclo->name = 'Ciclo Extraordinario';
        $n_ciclo->save();
    }
}
