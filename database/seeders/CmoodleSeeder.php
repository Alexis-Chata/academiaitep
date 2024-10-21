<?php

namespace Database\Seeders;

use App\Models\Cmoodle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmoodleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n_cmoodle = new Cmoodle();
        $n_cmoodle->dominio = 'https://prueba.jademlearning.com/webservice/rest/server.php';
        $n_cmoodle->token = 'abe05b9d30b087dea62bac35e723e0e1';
        $n_cmoodle->estado = false;
        $n_cmoodle->save();
    }
}
