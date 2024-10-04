<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\F_tipo_comprobante;

class FTipoComprobanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "01";
        $tipo_comprobante->descripcion = 'FACTURA';
        $tipo_comprobante->estado_pos = true;
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "03";
        $tipo_comprobante->descripcion = 'BOLETA';
        $tipo_comprobante->estado_pos = true;
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "07";
        $tipo_comprobante->descripcion = 'NOTA DE CREDITO';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "08";
        $tipo_comprobante->descripcion = 'NOTA DE DEBITO';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "09";
        $tipo_comprobante->descripcion = 'GUIA DE REMISION';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "RA";
        $tipo_comprobante->descripcion = 'RESUMEN ANULACIONES';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "RC";
        $tipo_comprobante->descripcion = 'RESUMEN COMPROBANTE';
        $tipo_comprobante->save();

        $tipo_comprobante = new F_tipo_comprobante();
        $tipo_comprobante->tipo_comprobante = "00";
        $tipo_comprobante->descripcion = 'TICKET';
        $tipo_comprobante->estado_pos = true;
        $tipo_comprobante->save();
    }
}
