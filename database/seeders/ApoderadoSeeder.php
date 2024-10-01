<?php

namespace Database\Seeders;

use App\Models\Apoderado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApoderadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nro = Apoderado::all()->count() + 1;
        $apoderado = new Apoderado();
        $apoderado->name = 'Juan';
        $apoderado->ap_paterno = 'Perez';
        $apoderado->ap_materno = 'Gonzalez';
        $apoderado->f_tipo_documento_id = 'DNI';
        $apoderado->nro_documento = '987654321';
        $apoderado->email = 'apoderado' . $nro . '@example.com';
        $apoderado->celular1 = '987654321';
        $apoderado->celular2 = '987654322';
        $apoderado->direccion = 'Calle 123, Ciudad, País';
        $apoderado->save();

        $nro = Apoderado::all()->count() + 1;
        $apoderado = new Apoderado();
        $apoderado->name = 'Maria';
        $apoderado->ap_paterno = 'Gomez';
        $apoderado->ap_materno = 'Rodriguez';
        $apoderado->f_tipo_documento_id = 'DNI';
        $apoderado->nro_documento = '123456789';
        $apoderado->email = 'apoderado' . $nro . '@example.com';
        $apoderado->celular1 = '123456789';
        $apoderado->celular2 = '123456788';
        $apoderado->direccion = 'Avenida 456, Ciudad, País';
        $apoderado->save();

        $nro = Apoderado::all()->count() + 1;
        $apoderado = new Apoderado();
        $apoderado->name = 'Carlos';
        $apoderado->ap_paterno = 'Lopez';
        $apoderado->ap_materno = 'Martinez';
        $apoderado->f_tipo_documento_id = 'DNI';
        $apoderado->nro_documento = '456789123';
        $apoderado->email = 'apoderado' . $nro . '@example.com';
        $apoderado->celular1 = '456789123';
        $apoderado->celular2 = '456789124';
        $apoderado->direccion = 'Plaza 789, Ciudad, País';
        $apoderado->save();

        $nro = Apoderado::all()->count() + 1;
        $apoderado = new Apoderado();
        $apoderado->name = 'Laura';
        $apoderado->ap_paterno = 'Sanchez';
        $apoderado->ap_materno = 'Hernandez';
        $apoderado->f_tipo_documento_id = 'DNI';
        $apoderado->nro_documento = '789123456';
        $apoderado->email = 'apoderado' . $nro . '@example.com';
        $apoderado->celular1 = '789123456';
        $apoderado->celular2 = '789123457';
        $apoderado->direccion = 'Calle 456, Ciudad, País';
        $apoderado->save();

    }
}
