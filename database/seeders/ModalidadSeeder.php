<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_modalidad = new Modalidad();
        $n_modalidad->name = 'Presencial';
        $n_modalidad->save();

        $n_modalidad = new Modalidad();
        $n_modalidad->name = 'Virtual';
        $n_modalidad->save();
    }
}
