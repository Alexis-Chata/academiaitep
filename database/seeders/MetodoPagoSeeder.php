<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MetodoPago::create(['tipo' => 'caja', 'name' => 'efectivo']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'yape']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'plim']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'bcp']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'inter']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'cont']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'scb']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'bbva']);
        MetodoPago::create(['tipo' => 'virtual', 'name' => 'c.arequipa']);
    }
}
