<?php

namespace Database\Seeders;

use App\Models\Cgrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class CgrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 360;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 180;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 1;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 360;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 360;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 2;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 360;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 180;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 3;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 4;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 4;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 360;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 1;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 180;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 5;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 6;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 1;
        $n_cgrupo->costo = 280;
        $n_cgrupo->save();

        $n_cgrupo = new Cgrupo();
        $n_cgrupo->ciclo_id = 6;
        $n_cgrupo->turno_id = 2;
        $n_cgrupo->modalidad_id = 2;
        $n_cgrupo->costo = 150;
        $n_cgrupo->save();
    }
}
