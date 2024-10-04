<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\F_serie; // Añade esta línea para importar el modelo

class FSerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "00";
        $serie->serie = "0001";
        $serie->correlativo = 0;
        $serie->f_sede_id = 1;
        $serie->save();

        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "03";
        $serie->serie = "B001";
        $serie->correlativo = 0;
        $serie->f_sede_id = 1;
        $serie->save();

        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "01";
        $serie->serie = "F001";
        $serie->correlativo = 0;
        $serie->f_sede_id = 1;
        $serie->save();

        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "00";
        $serie->serie = "0101";
        $serie->correlativo = 0;
        $serie->f_sede_id = 2;
        $serie->save();

        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "03";
        $serie->serie = "B101";
        $serie->correlativo = 0;
        $serie->f_sede_id = 2;
        $serie->save();

        $serie = new F_serie(); // Cambia FSerie a F_serie
        $serie->tipo_comprobante_id = "01";
        $serie->serie = "F101";
        $serie->correlativo = 0;
        $serie->f_sede_id = 2;
        $serie->save();
    }
}
