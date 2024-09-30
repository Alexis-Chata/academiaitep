<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('f_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipodoc')->nullable();
            $table->string('ruc');
            $table->string('razon_social')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('pais')->nullable();
            $table->string('departamento')->nullable();
            $table->string('provincia')->nullable();
            $table->string('distrito')->nullable();
            $table->string('ubigueo')->nullable();
            $table->string('usuario_sol')->nullable();
            $table->string('clave_sol')->nullable();
            $table->string('api_id')->nullable();
            $table->string('api_clave')->nullable();
            $table->text('tokenapisperu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_empresas');
    }
};
