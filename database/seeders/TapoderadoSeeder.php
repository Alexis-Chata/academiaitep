<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TapoderadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tapoderado = new \App\Models\Tapoderado();
        $tapoderado->name = 'Padre';
        $tapoderado->save();

        $tapoderado = new \App\Models\Tapoderado();
        $tapoderado->name = 'Madre';
        $tapoderado->save();

        $tapoderado = new \App\Models\Tapoderado();
        $tapoderado->name = 'Tio';
        $tapoderado->save();

        $tapoderado = new \App\Models\Tapoderado();
        $tapoderado->name = 'Tutor Legal';
        $tapoderado->save();
    }
}
