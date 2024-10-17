<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_comprobantes_sunat_detalle extends BaseModel
{
    use HasFactory;

    protected $fillable = ['tipo_unidad','codProducto','descripcion','cantidad','costo','monto_pagado','saldo_pendiente','mtoBaseIgv','porcentajeIgv','igv','totalImpuestos','tipAfeIgv','mtoValorVenta','mtoValorUnitario','mtoPrecioUnitario','factorIcbper','icbper','mtoBaseIsc','tipSisIsc','porcentajeIsc','isc','f_comprobantes_sunat_id',
    ];


}
