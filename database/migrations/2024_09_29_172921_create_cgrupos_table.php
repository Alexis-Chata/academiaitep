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
        Schema::create('cgrupos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("ciclo_id")->constrained("ciclos");
            $table->foreignId("turno_id")->constrained("turnos");
            $table->foreignId("modalidad_id")->constrained("modalidads");
            $table->double("costo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cgrupos');
    }
};
