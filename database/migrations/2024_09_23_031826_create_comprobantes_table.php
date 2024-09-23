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
        Schema::create("comprobantes", function (Blueprint $table) {
            $table->id();
            $table->date("fecha");
            $table->foreignId("matricula_id")->constrained("matriculas");
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("cajero_id")->constrained("users");
            $table->string("serie");
            $table->string("correlativo");
            $table->double("total");
            $table->double("igv");
            $table->double("monto");
            $table->string("noperacion");
            $table->string("entidad");
            $table->char("cestado", 1);
            $table->foreignId("cuenta_id")->constrained("cuentas");
            $table->string("sede");
            $table->string("imagen_deposito");
            $table->string("nombreticketpdf");
            $table->string("metodopago");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("comprobantes");
    }
};
