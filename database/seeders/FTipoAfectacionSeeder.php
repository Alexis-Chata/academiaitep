<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\F_tipo_afectacion; // Añade esta línea para importar el modelo

class FTipoAfectacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_afectacion = new F_tipo_afectacion(); // Cambia FTipoAfectacion a F_tipo_afectacion
        $tipo_afectacion->id = '10';
        $tipo_afectacion->descripcion = 'OP. GRAVADAS';
        $tipo_afectacion->letra = 'S';
        $tipo_afectacion->codigo = '1000';
        $tipo_afectacion->nombre = 'IGV';
        $tipo_afectacion->tipo = 'VAT';
        $tipo_afectacion->save();

        $tipo_afectacion = new F_tipo_afectacion(); // Cambia FTipoAfectacion a F_tipo_afectacion
        $tipo_afectacion->id = '20';
        $tipo_afectacion->descripcion = 'OP. EXONERADAS';
        $tipo_afectacion->letra = 'E';
        $tipo_afectacion->codigo = '9997';
        $tipo_afectacion->nombre = 'EXO';
        $tipo_afectacion->tipo = 'VAT';
        $tipo_afectacion->save();

        $tipo_afectacion = new F_tipo_afectacion(); // Cambia FTipoAfectacion a F_tipo_afectacion
        $tipo_afectacion->id = '30';
        $tipo_afectacion->descripcion = 'OP. INAFECTAS';
        $tipo_afectacion->letra = 'O';
        $tipo_afectacion->codigo = '9998';
        $tipo_afectacion->nombre = 'INA';
        $tipo_afectacion->tipo = 'FRE';
        $tipo_afectacion->save();
    }
}
