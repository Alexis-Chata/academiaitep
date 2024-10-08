<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo A';
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo B';
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo C';
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 2;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo D';
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 2;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo E';
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 3;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo F';
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 3;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo G';
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 4;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo H';
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 4;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo I';
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 5;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo J';
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 5;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo K';
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 6;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo L';
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 6;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->name = 'Grupo M';
        $n_cgrupo->ciclo_id = 4;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 7;
        $n_cgrupo->estado = 1;
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 4;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 7;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo N';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 2;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo BE';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 2;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo O';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo P';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo Q';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 6;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 1;
        $n_cgrupo->name = 'Grupo A1';
        $n_cgrupo->save();

        $n_cgrupo = new Grupo();
        $n_cgrupo->ciclo_id = 6;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->aula_id = 1;
        $n_cgrupo->estado = 3;
        $n_cgrupo->name = 'Grupo A2';
        $n_cgrupo->save();
    }
}
