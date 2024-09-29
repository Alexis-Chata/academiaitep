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
        Schema::create("aulas", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("shortname")->unique();
            $table->integer("capacidad");
            $table->foreignId("taula_id")->constrained("taulas");
            $table->foreignId("sede_id")->constrained("sedes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("aulas");
    }
};
