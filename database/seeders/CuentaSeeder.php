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
    }
}
