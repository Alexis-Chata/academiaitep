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
        Schema::create("cuentas", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("numero_cuenta");
            $table->string("entidad_bancaria");
            $table->string("tipo_cuenta");
            $table->tinyInteger("estado");
            $table->foreignId("f_empresa_id")->constrained("f_empresas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cuentas");
    }
};
