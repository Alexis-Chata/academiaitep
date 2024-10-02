<?php

namespace Database\Seeders;

use App\Models\User_apoderado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserApoderadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userApoderado = new User_apoderado();
        $userApoderado->user_id = 1;
        $userApoderado->apoderado_id = 2;
        $userApoderado->tapoderado_id = 1;
        $userApoderado->save();

        $userApoderado = new User_apoderado();
        $userApoderado->user_id = 2;
        $userApoderado->apoderado_id = 1;
        $userApoderado->tapoderado_id = 2;
        $userApoderado->save();

        $userApoderado = new User_apoderado();
        $userApoderado->user_id = 3;
        $userApoderado->apoderado_id = 2;
        $userApoderado->tapoderado_id = 3;
        $userApoderado->save();

        $userApoderado = new User_apoderado();
        $userApoderado->user_id = 3;
        $userApoderado->apoderado_id = 1;
        $userApoderado->tapoderado_id = 4;
        $userApoderado->save();
    }
}
