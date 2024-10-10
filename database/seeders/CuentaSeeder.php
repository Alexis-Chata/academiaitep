<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuenta = new Cuenta();
        $cuenta->name = 'CAJA ITEP EFECTIVO';
        $cuenta->numero_cuenta = '0';
        $cuenta->entidad_bancaria = 'CAJA';
        $cuenta->tipo_cuenta = 'Caja';
        $cuenta->f_empresa_id = '1';
        $cuenta->estado = '1';
        $cuenta->save();

        Cuenta::create([
            "name" => "CUENTA DIGITAL ITEP",
            "numero_cuenta" => "0007 0958 4021 0000 2012",
            "entidad_bancaria" => "C_AREQUIPA",
            "tipo_cuenta" => "Virtual",
            "f_empresa_id" => "1",
            "estado" => "1"
        ]);
    }
}
