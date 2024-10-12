<?php

namespace Database\Seeders;

use App\Models\Cstandar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CstandarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_cstandar = new Cstandar();
        $new_cstandar->precio = 24;
        $new_cstandar->name = 'FUT';
        $new_cstandar->save();

        $new_cstandar = new Cstandar();
        $new_cstandar->precio = 30;
        $new_cstandar->name = 'Copia Carnet';
        $new_cstandar->save();

        $new_cstandar = new Cstandar();
        $new_cstandar->precio = 40.5;
        $new_cstandar->name = 'Balotario';
        $new_cstandar->save();

        $new_cstandar = new Cstandar();
        $new_cstandar->precio = 36;
        $new_cstandar->name = 'Libro';
        $new_cstandar->save();
    }
}
