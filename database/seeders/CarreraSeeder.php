<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Area;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $areas = Area::pluck('id');

        $carreras = [
            'Ingeniería de Sistemas',
            'Administración de Empresas',
            'Contabilidad',
            'Psicología',
            'Derecho',
        ];

        foreach ($carreras as $carrera) {
            Carrera::create([
                'name' => $carrera,
                'area_id' => $areas->random(),
            ]);
        }
    }
}
