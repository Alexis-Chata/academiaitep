<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #roles
        Role::create(['name' => 'Super_Administrador']);
        Role::create(['name' => 'Administrador']);
        #carreras
        Permission::create(['name' =>'admin.area.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.area.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.area.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.area.consultar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.carrera.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.carrera.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.carrera.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #turnos
        Permission::create(['name' =>'admin.turno.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.turno.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.turno.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.turno.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #modalidads
        Permission::create(['name' =>'admin.modalidad.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.modalidad.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.modalidad.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.modalidad.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #ciclos
        Permission::create(['name' =>'admin.ciclo.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.ciclo.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.ciclo.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.ciclo.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #aulas
        Permission::create(['name' =>'admin.aula.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.aula.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.aula.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.aula.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #grupos
        Permission::create(['name' =>'admin.grupo.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.grupo.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.grupo.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.grupo.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #cgrupos
        Permission::create(['name' =>'admin.cgrupo.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.cgrupo.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.cgrupo.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.cgrupo.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
        #usuarios
        Permission::create(['name' =>'admin.usuarios.titulo'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.usuarios.crear'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.usuarios.editar'])->syncRoles(['Administrador','Super_Administrador']);
        Permission::create(['name' =>'admin.usuarios.eliminar'])->syncRoles(['Administrador','Super_Administrador']);
    }
}
