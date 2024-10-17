<?php

namespace App\Livewire\Forms;

use App\Models\F_comprobantes_sunat;
use App\Models\F_serie;
use App\Models\Matricula;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DtoComprobantePago extends Form
{
    public ?F_comprobantes_sunat $f_comprobante_sunat;

    #[Validate('required', message: 'Por favor, seleccione un usuario primero.')]
    public $user_id;
    #[Validate('required')]
    public $doc_serie_id;
    #[Validate('required')]
    public $fechaEmision;
    #[Validate('required')]
    public $cuenta_id;
    public $cuenta;
    #[Validate('required')]
    public $metodo_pago_cuenta;
    public $vaucher;
    public $noperacion;
    public $data_comprobante_detalles;

    public function store()
    {
        $this->validate();
        //dd($this->fechaEmision, Carbon::parse($this->fechaEmision)->addMonth()->toDateString());
        $serie = F_serie::find($this->doc_serie_id);
        $matricula = Matricula::create([
            'user_id' => $this->user_id,
            'sede' => $serie->sede->nombre,
            'fvencimiento' => Carbon::parse($this->fechaEmision)->addMonth(),
            'anio' => Carbon::parse($this->fechaEmision)->year,
            'estado' => 1,
        ]);
        $serie->correlativo += 1;
        $serie->fecha_emision = $this->fechaEmision;
        $serie->save();

        $correlativo = $serie->correlativo;

        $datos = [
            'user_id' => $this->user_id,
            'doc_serie' => $serie->serie,
            'fechaEmision' => $this->fechaEmision,
            'cuenta_id' => $this->cuenta_id,
            'metodo_pago_cuenta' => $this->metodo_pago_cuenta,
            'vaucher' => $this->vaucher,
            'noperacion' => $this->noperacion,
            'matricula_id' => $matricula->id,
            'cajero_id' => auth()->user()->id,
            'cestado' => 1,
            'sede' => $serie->sede->nombre,
            'costo_total' => $this->data_comprobante_detalles->sum('importeConceptoCosto'),
            'monto_pagado_total' => $this->data_comprobante_detalles->sum('importeConceptoPagar'),
            'saldo_pendiente_total' => $this->data_comprobante_detalles->sum('importeConceptoPendiente'),
            'metodopago' => $this->metodo_pago_cuenta,
            'serie' => $serie->serie,
            'correlativo' => $correlativo,
            'companyRuc' => '-',
            'companyRazonSocial' => '-',
            'companyNombreComercial' => '-',
            'companyAddressUbigueo' => '-',
            'companyAddressDepartamento' => '-',
            'companyAddressProvincia' => '-',
            'companyAddressDistrito' => '-',
            'companyAddressUrbanizacion' => '-',
            'companyAddressDireccion' => '-',
            'companyAddressCodLocal' => '0000',
            'clientTipoDoc' => '-',
            'clientNumDoc' => '-',
            'clientRazonSocial' => '-',
            'mtoOperGravadas' => 0,
            'mtoOperInafectas' => 0,
            'mtoOperExoneradas' => 0,
            'mtoIGV' => 0,
            'mtoBaseIsc' => 0,
            'mtoISC' => 0,
            'icbper' => 0,
            'totalImpuestos' => 0,
            'valorVenta' => 0,
            'subTotal' => 0,
            'redondeo' => 0,
            'mtoImpVenta' => 0,
            'legendsCode' => '1000',
            'legendsValue' => 0,
        ];

        $comprobante = F_comprobantes_sunat::create($datos);

        foreach ($this->data_comprobante_detalles as $detalle) {
            //dd($this->data_comprobante_detalles, $detalle);
            $data = [
                'tipo_unidad' => '-',
                'codProducto' => $detalle->codigo,
                'descripcion' => $detalle->concepto,
                'cantidad' => 1,
                'costo' => $detalle->importeConceptoCosto,
                'monto_pagado' => $detalle->importeConceptoPagar,
                'saldo_pendiente' => $detalle->importeConceptoPendiente,
                'mtoBaseIgv' => 0,
                'porcentajeIgv' => 0,
                'igv' => 0,
                'totalImpuestos' => 0,
                'tipAfeIgv' => 0,
                'mtoValorVenta' => 0,
                'mtoValorUnitario' => 0,
                'mtoPrecioUnitario' => 0,
                'factorIcbper' => 0,
                'icbper' => 0,
                'mtoBaseIsc' => 0,
                'tipSisIsc' => 0,
                'porcentajeIsc' => 0,
                'isc' => 0,
            ];

            $comprobante->comprobantes_sunat_detalle()->create($data);
        }

    }
}
