<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string("f_tipo_documento_id");
            $table->string("nro_documento");
            $table->string("email");
            $table->string("celular1")->nullable();
            $table->string("celular2")->nullable();
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
