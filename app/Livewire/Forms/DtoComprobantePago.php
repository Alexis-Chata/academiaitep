<?php

namespace App\Livewire\Forms;

use App\Models\F_comprobantes_sunat;
use App\Models\F_serie;
use App\Models\Matricula;
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

    public function preparardatos()
    {
        $matricula = Matricula::create([
            'user_id' => $this->user_id,
            'grupo_id' => 1,
            'estado' => 1,
        ]);
        $serie = F_serie::find($this->doc_serie_id);
        $serie->correlativo += 1;
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
            'sede' => F_serie::find($this->doc_serie_id)->sede->nombre,
            'costo_total' => 1000,
            'monto_pagado_total' => 900,
            'saldo_pendiente_total' => 100,
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
        return $datos;
    }

    public function store()
    {
        $this->validate();

        F_comprobantes_sunat::create($this->preparardatos());
    }
}
