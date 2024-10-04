<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\F_empresa; // Añade esta línea para importar el modelo

class FEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = new F_empresa(); // Crea una nueva instancia del modelo
        $empresa->nombre = "GRUPO LEGITHI S.A.C.";
        $empresa->ruc = "20611995998";
        $empresa->telefono = "0123456789";
        $empresa->direccion = "CAL.LOS MERCADERES NRO. 317 URB. CERCADO AREQUIPA";
        $empresa->departamento = "AREQUIPA";
        $empresa->provincia = "AREQUIPA";
        $empresa->distrito = "AREQUIPA";
        $empresa->ubigueo = "040101";
        $empresa->tokenapisperu = "tokenempresa1";
        $empresa->save();
    }
}
