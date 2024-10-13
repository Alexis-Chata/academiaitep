<?php

namespace App\Livewire\Forms;

use App\Models\F_comprobantes_sunat;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DtoComprobantePago extends Form
{
    public ?F_comprobantes_sunat $f_comprobante_sunat;

    #[Validate('required')]
    public $matricula_id;
    public $user_id;
    public $cajero_id;
    public $cuenta_id;
    public $noperacion;
    public $entidad;
    public $cestado;
    public $sede;
    public $imagen_deposito;
    public $nombreticketpdf;
    public $metodopago;
    public $ublVersion;
    public $tipoDoc;
    public $tipoDoc_name;
    public $tipoOperacion;
    public $serie;
    public $correlativo;
    public $fechaEmision;
    public $formaPagoTipo;
    public $tipoMoneda;
    public $companyRuc;
    public $companyRazonSocial;
    public $companyNombreComercial;
    public $companyAddressUbigueo;
    public $companyAddressDepartamento;
    public $companyAddressProvincia;
    public $companyAddressDistrito;
    public $companyAddressUrbanizacion;
    public $companyAddressDireccion;
    public $companyAddressCodLocal;
    public $clientTipoDoc;
    public $clientNumDoc;
    public $clientRazonSocial;
    public $mtoOperGravadas;
    public $mtoOperInafectas;
    public $mtoOperExoneradas;
    public $mtoIGV;
    public $mtoBaseIsc;
    public $mtoISC;
    public $icbper;
    public $totalImpuestos;
    public $valorVenta;
    public $subTotal;
    public $redondeo;
    public $mtoImpVenta;
    public $legendsCode;
    public $legendsValue;
    public $tipDocAfectado;
    public $numDocfectado;
    public $codMotivo;
    public $desMotivo;
    public $nombrexml;
    public $xmlbase64;
    public $hash;
    public $cdrbase64;
    public $codigo_sunat;
    public $mensaje_sunat;
    public $obs;

    public function set(F_comprobantes_sunat $f_comprobante_sunat)
    {
        // $this->matricula_id =;
        // $this->user_id =;
        // $this->cajero_id =;
        // $this->noperacion =;
        // $this->entidad =;
        // $this->cestado =;
        // $this->cuenta_id =;
        // $this->sede =;
        // $this->imagen_deposito =;
        // $this->nombreticketpdf =;
        // $this->metodopago =;
        // $this->ublVersion =;
        // $this->tipoDoc =;
        // $this->tipoDoc_name =;
        // $this->tipoOperacion =;
        // $this->serie =;
        // $this->correlativo =;
        // $this->fechaEmision =;
        // $this->formaPagoTipo =;
        // $this->tipoMoneda =;
        // $this->companyRuc =;
        // $this->companyRazonSocial =;
        // $this->companyNombreComercial =;
        // $this->companyAddressUbigueo =;
        // $this->companyAddressDepartamento =;
        // $this->companyAddressProvincia =;
        // $this->companyAddressDistrito =;
        // $this->companyAddressUrbanizacion =;
        // $this->companyAddressDireccion =;
        // $this->companyAddressCodLocal =;
        // $this->clientTipoDoc =;
        // $this->clientNumDoc =;
        // $this->clientRazonSocial =;
        // $this->mtoOperGravadas =;
        // $this->mtoOperInafectas =;
        // $this->mtoOperExoneradas =;
        // $this->mtoIGV =;
        // $this->mtoBaseIsc =;
        // $this->mtoISC =;
        // $this->icbper =;
        // $this->totalImpuestos =;
        // $this->valorVenta =;
        // $this->subTotal =;
        // $this->redondeo =;
        // $this->mtoImpVenta =;
        // $this->legendsCode =;
        // $this->legendsValue =;
        // $this->tipDocAfectado =;
        // $this->numDocfectado =;
        // $this->codMotivo =;
        // $this->desMotivo =;
        // $this->nombrexml =;
        // $this->xmlbase64 =;
        // $this->hash =;
        // $this->cdrbase64 =;
        // $this->codigo_sunat =;
        // $this->mensaje_sunat =;
        // $this->obs =;
    }

    public function update()
    {
        $this->f_comprobante_sunat->update($this->all());
    }

    public function store()
    {
        $this->validate();

        if (isset($this->f_comprobante_sunat)) {
            $this->update();
        } else {
            F_comprobantes_sunat::create($this->all());
        }
    }
}
