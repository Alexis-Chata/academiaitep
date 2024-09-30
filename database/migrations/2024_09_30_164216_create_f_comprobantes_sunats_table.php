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
        Schema::create('f_comprobantes_sunats', function (Blueprint $table) {
            $table->id();
            $table->string('ublVersion')->default('2.1');
            $table->string('tipoDoc')->default('03');
            $table->string('tipoDoc_name')->default('BOLETA ELECTRONICA');
            $table->string('tipoOperacion')->default('0101');
            $table->string('serie');
            $table->string('correlativo');
            $table->dateTime('fechaEmision');
            $table->string('formaPagoTipo')->default('Contado');
            $table->string('tipoMoneda')->default('PEN');
            $table->string('companyRuc');
            $table->string('companyRazonSocial');
            $table->string('companyNombreComercial');
            $table->string('companyAddressUbigueo');
            $table->string('companyAddressDepartamento');
            $table->string('companyAddressProvincia');
            $table->string('companyAddressDistrito');
            $table->string('companyAddressUrbanizacion');
            $table->string('companyAddressDireccion');
            $table->string('companyAddressCodLocal')->default('0000');
            $table->string('clientTipoDoc');
            $table->string('clientNumDoc');
            $table->string('clientRazonSocial');
            $table->string('mtoOperGravadas');
            $table->string('mtoOperInafectas');
            $table->string('mtoOperExoneradas');
            $table->string('mtoIGV');
            $table->string('mtoBaseIsc');
            $table->string('mtoISC');
            $table->string('icbper');
            $table->string('totalImpuestos');
            $table->string('valorVenta');
            $table->string('subTotal');
            $table->string('redondeo')->default('0.0');
            $table->string('mtoImpVenta');
            $table->string('legendsCode')->default('1000');
            $table->string('legendsValue');
            $table->string('tipDocAfectado')->nullable();
            $table->string('numDocfectado')->nullable();
            $table->string('codMotivo')->nullable();
            $table->string('desMotivo')->nullable();
            $table->string('nombrexml')->nullable();
            $table->text('xmlbase64')->nullable();
            $table->string('hash')->nullable();
            $table->text('cdrbase64')->nullable();
            $table->string('codigo_sunat')->nullable();
            $table->text('mensaje_sunat')->nullable();
            $table->text('obs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_comprobantes_sunats');
    }
};
