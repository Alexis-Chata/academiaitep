<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\F_sede; // Añade esta línea para importar el modelo

class FSedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sede = new F_sede(); // Cambia FSede a F_sede
        $sede->nombre = "Academic A";
        $sede->telefono = "999888777";
        $sede->direccion = "CAL.LOS MERCADERES NRO. 317 URB. CERCADO AREQUIPA";
        $sede->departamento = "arequipa";
        $sede->provincia = "arequipa";
        $sede->distrito = "arequipa";
        $sede->ubigueo = "040101";
        $sede->addresstypecode = "0000";
        $sede->f_empresa_id = 1;
        $sede->save();

        $sede = new F_sede(); // Cambia FSede a F_sede
        $sede->nombre = "Academic C";
        $sede->telefono = "999777888";
        $sede->direccion = " AV. COLLASUYO 2964 Dpto M Int 119";
        $sede->departamento = "cusco";
        $sede->provincia = "cusco";
        $sede->distrito = "cusco";
        $sede->ubigueo = "080101";
        $sede->addresstypecode = "0001";
        $sede->f_empresa_id = 1;
        $sede->save();
    }
}
