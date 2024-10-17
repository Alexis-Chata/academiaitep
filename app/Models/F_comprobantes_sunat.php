<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_comprobantes_sunat extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'matricula_id',
        'user_id',
        'cajero_id',
        'noperacion',
        'entidad',
        'cestado',
        'cuenta_id',
        'sede',
        'costo_total',
        'monto_pagado_total',
        'saldo_pendiente_total',
        'imagen_deposito',
        'nombreticketpdf',
        'metodopago',
        'ublVersion',
        'tipoDoc',
        'tipoDoc_name',
        'tipoOperacion',
        'serie',
        'correlativo',
        'fechaEmision',
        'formaPagoTipo',
        'tipoMoneda',
        'companyRuc',
        'companyRazonSocial',
        'companyNombreComercial',
        'companyAddressUbigueo',
        'companyAddressDepartamento',
        'companyAddressProvincia',
        'companyAddressDistrito',
        'companyAddressUrbanizacion',
        'companyAddressDireccion',
        'companyAddressCodLocal',
        'clientTipoDoc',
        'clientNumDoc',
        'clientRazonSocial',
        'mtoOperGravadas',
        'mtoOperInafectas',
        'mtoOperExoneradas',
        'mtoIGV',
        'mtoBaseIsc',
        'mtoISC',
        'icbper',
        'totalImpuestos',
        'valorVenta',
        'subTotal',
        'redondeo',
        'mtoImpVenta',
        'legendsCode',
        'legendsValue',
        'tipDocAfectado',
        'numDocfectado',
        'codMotivo',
        'desMotivo',
        'nombrexml',
        'xmlbase64',
        'hash',
        'cdrbase64',
        'codigo_sunat',
        'mensaje_sunat',
        'obs',
    ];

    public function comprobantes_sunat_detalle()
    {
        return $this->hasMany(F_comprobantes_sunat_detalle::class);
    }
}
