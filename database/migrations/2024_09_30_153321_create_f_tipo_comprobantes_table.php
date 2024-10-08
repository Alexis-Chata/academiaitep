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
        Schema::create('f_tipo_comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comprobante');
            $table->string('descripcion');
            $table->boolean('estado_pos')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_tipo_comprobantes');
    }
};
