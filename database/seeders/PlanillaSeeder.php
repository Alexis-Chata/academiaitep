<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\Plantilla;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_plantilla = new Plantilla();
        $n_plantilla->name = 'Prueba 1';
        $n_plantilla->save();

        $n_materia = new Materia();
        $n_materia->name = 'Curso 1';
        $n_materia->plantilla_id = $n_plantilla->id;
        $n_materia->save();

        $n_materia = new Materia();
        $n_materia->name = 'Curso 2';
        $n_materia->plantilla_id = $n_plantilla->id;
        $n_materia->save();

        $n_materia = new Materia();
        $n_materia->name = 'Curso 3';
        $n_materia->plantilla_id = $n_plantilla->id;
        $n_materia->save();
    }
}
