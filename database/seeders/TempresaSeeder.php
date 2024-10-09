<?php

namespace Database\Seeders;

use App\Models\Tempresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TempresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tempresa::create(["name"=> "tipo empresa"]);
    }
}
