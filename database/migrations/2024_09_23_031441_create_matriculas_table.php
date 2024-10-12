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
        Schema::create("matriculas", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("grupo_id")->constrained("grupos");
            $table->foreignId("carrera_id")->constrained("carreras");
            $table->string("ciclo");
            $table->string("turno");
            $table->string("modalidad");
            $table->string("aula");
            $table->string("sede");
            $table->date("fvencimiento");
            $table->string("anio");
            $table->tinyInteger("estado");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("matriculas");
    }
};
