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
        Schema::create('f_comprobantes_sunat_detalles', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_unidad');
            $table->string('codProducto');
            $table->string('descripcion');
            $table->string('cantidad');
            $table->string('costo');
            $table->string('monto_pagado');
            $table->string('saldo_pendiente');
            $table->string('mtoBaseIgv');
            $table->string('porcentajeIgv');
            $table->string('igv');
            $table->string('totalImpuestos');
            $table->string('tipAfeIgv');
            $table->string('mtoValorVenta');
            $table->string('mtoValorUnitario');
            $table->string('mtoPrecioUnitario');
            $table->string('factorIcbper');
            $table->string('icbper');
            $table->string('mtoBaseIsc');
            $table->string('tipSisIsc');
            $table->string('porcentajeIsc');
            $table->string('isc');
            $table->foreignId('f_comprobantes_sunat_id')->constrained('f_comprobantes_sunats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_comprobantes_sunat_detalles');
    }
};
