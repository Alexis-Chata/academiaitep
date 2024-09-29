<?php

namespace Database\Seeders;

use App\Models\Turno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_turno = new Turno();
        $n_turno->name = 'Mañana';
        $n_turno->save();

        $n_turno = new Turno();
        $n_turno->name = 'Tarde';
        $n_turno->save();

        $n_turno = new Turno();
        $n_turno->name = 'Noche';
        $n_turno->save();
    }
}
