<?php

namespace Database\Seeders;

use App\Models\F_tipo_documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FTipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_comprobante = new F_tipo_documento();
        $tipo_comprobante->id = 'SD';
        $tipo_comprobante->descripcion = 'SIN DOCUMENTO';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_documento();
        $tipo_comprobante->id = '1';
        $tipo_comprobante->descripcion = 'DNI';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_documento();
        $tipo_comprobante->id = '4';
        $tipo_comprobante->descripcion = 'CARNET EXTRANJERIA';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_documento();
        $tipo_comprobante->id = '6';
        $tipo_comprobante->descripcion = 'RUC';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_documento();
        $tipo_comprobante->id = '7';
        $tipo_comprobante->descripcion = 'PASAPORTE';
        $tipo_comprobante->save();

        // $tipo_comprobante = new F_tipo_documento();
        // $tipo_comprobante->id = 'A';
        // $tipo_comprobante->descripcion = 'CED. DIPLOMATICA DE IDENTIDAD';
        // $tipo_comprobante->save();

        // $tipo_comprobante = new F_tipo_documento();
        // $tipo_comprobante->id = 'B';
        // $tipo_comprobante->descripcion = 'Documento identidad país residencia-no.d';
        // $tipo_comprobante->save();
    }
}
