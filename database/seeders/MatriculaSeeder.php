<?php

namespace Database\Seeders;

use App\Models\Matricula;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Carrera;
use Illuminate\Database\Seeder;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id');
        $grupos = Grupo::pluck('id');
        $carreras = Carrera::pluck('id');

        $datos = [
            [
                'ciclo' => '2024-I',
                'turno' => 'Mañana',
                'modalidad' => 'Presencial',
                'aula' => 'A-101',
                'sede' => 'Lima Centro',
                'fvencimiento' => '2024-07-31',
                'anio' => '2024',
                'estado' => 1,
            ],
            [
                'ciclo' => '2024-I',
                'turno' => 'Tarde',
                'modalidad' => 'Semipresencial',
                'aula' => 'B-205',
                'sede' => 'Lima Norte',
                'fvencimiento' => '2024-07-31',
                'anio' => '2024',
                'estado' => 1,
            ],
            [
                'ciclo' => '2024-I',
                'turno' => 'Noche',
                'modalidad' => 'Virtual',
                'aula' => 'Virtual-01',
                'sede' => 'Lima Sur',
                'fvencimiento' => '2024-07-31',
                'anio' => '2024',
                'estado' => 1,
            ],
        ];

        foreach ($datos as $dato) {
            Matricula::create([
                'user_id' => $users->random(),
                'grupo_id' => $grupos->random(),
                'carrera_id' => $carreras->random(),
                'ciclo' => $dato['ciclo'],
                'turno' => $dato['turno'],
                'modalidad' => $dato['modalidad'],
                'aula' => $dato['aula'],
                'sede' => $dato['sede'],
                'fvencimiento' => $dato['fvencimiento'],
                'anio' => $dato['anio'],
                'estado' => $dato['estado'],
            ]);
        }
    }
}
