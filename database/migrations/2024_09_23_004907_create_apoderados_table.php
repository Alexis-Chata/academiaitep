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
        Schema::create("apoderados", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("ap_paterno");
            $table->string("ap_materno");
            $table->string("identificacion");
            $table->string("email");
            $table->string("celular1");
            $table->string("celular2");
            $table->string("direccion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("apoderados");
    }
};
