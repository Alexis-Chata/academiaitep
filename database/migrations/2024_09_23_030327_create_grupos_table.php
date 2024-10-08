<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("grupos", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("aula_id")->constrained("aulas");
            $table->foreignId("turno_id")->constrained("turnos");
            $table->foreignId("ciclo_id")->constrained("ciclos");
            $table->foreignId("modalidad_id")->constrained("modalidads");
            $table->tinyInteger("estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("grupos");
    }
};
