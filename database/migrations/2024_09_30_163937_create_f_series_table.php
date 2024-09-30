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
        Schema::create('f_series', function (Blueprint $table) {
            $table->id();
            $table->char('tipo_comprobante_id');
            $table->string('serie');
            $table->string('correlativo');
            $table->foreignId('f_sede_id')->constrained('f_sedes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_series');
    }
};
