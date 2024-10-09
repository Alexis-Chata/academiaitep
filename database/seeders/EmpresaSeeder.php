<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuenta = new Empresa();
        $cuenta->name = 'Academic';
        $cuenta->ruc = '20611995998';
        $cuenta->tempresa_id = 'CAJA';
        $cuenta->estado = '1';
        $cuenta->save();
    }
}
