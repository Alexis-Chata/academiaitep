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
            $table->foreignId("grupo_id")->nullable()->constrained("grupos");
            $table->foreignId("carrera_id")->nullable()->constrained("carreras");
            $table->string("ciclo")->nullable();
            $table->string("turno")->nullable();
            $table->string("modalidad")->nullable();
            $table->string("aula")->nullable();
            $table->string("sede")->nullable();
            $table->date("fvencimiento")->nullable();
            $table->string("anio")->nullable();
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
