<?php

namespace App\Livewire\Forms;

use App\Models\F_comprobantes_sunat;
use App\Models\F_serie;
use App\Models\Grupo;
use App\Models\Matricula;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;
use ParseError;

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
    public $matricula_id;

    public function store()
    {
        $this->validate();

        try {
            Cache::lock('guardar_comprobante', 5)->block(3, function () {
                DB::transaction(function () {
                    $usuario = User::with(['matriculas'])->find($this->user_id);
                    if ($this->data_comprobante_detalles->where('codigo', 'p-1')->count()) {
                        $usuario->deuda_pendiente -= $this->data_comprobante_detalles->where('codigo', 'p-1')->sum('importeConceptoPagar');
                    } else {
                        $usuario->deuda_pendiente += $this->data_comprobante_detalles->sum('importeConceptoPendiente');
                    }
                    $usuario->save();

                    $serie = F_serie::find($this->doc_serie_id);

                    $serie->correlativo += 1;
                    $serie->fecha_emision = $this->fechaEmision;
                    $serie->save();

                    $correlativo = $serie->correlativo;

                    $datos = [
                        'user_id' => $usuario->id,
                        'doc_serie' => $serie->serie,
                        'fechaEmision' => $this->fechaEmision,
                        'cuenta_id' => $this->cuenta_id,
                        'metodo_pago_cuenta' => $this->metodo_pago_cuenta,
                        'vaucher' => $this->vaucher,
                        'noperacion' => $this->noperacion,
                        'cajero_id' => auth_id(),
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

                        //dd($detalle->cp_grupo);
                        $matricula = $usuario->matriculas->firstWhere('grupo_id', $detalle->cp_grupo);
                        if ($matricula) {
                            $matricula->fvencimiento = Carbon::parse($matricula->fvencimiento)->addMonth();
                            $matricula->save();
                        } else {
                            $grupo = Grupo::with(['aula', 'turno', 'ciclo', 'modalidad'])->find($detalle->cp_grupo);
                            $matricula = Matricula::create([
                                'user_id' => $usuario->id,
                                'grupo_id' => $grupo->id,
                                'ciclo' => $grupo->ciclo->name,
                                'turno' => $grupo->turno->name,
                                'modalidad' => $grupo->ciclo->name,
                                'aula' => $grupo->modalidad->name,
                                'sede' => $serie->sede->nombre,
                                'fvencimiento' => Carbon::parse($this->fechaEmision)->addMonth(),
                                'anio' => Carbon::parse($this->fechaEmision)->year,
                                'estado' => 1,
                            ]);
                        }
                    }
                    $this->reset();
                });
            });
        } catch (LockTimeoutException $e) {
            // Si no se pudo adquirir el bloqueo dentro del tiempo de espera, se lanzará una excepción.
            // Maneja la excepción según tu lógica de negocio.
            Log::error("GC " . "No se pudo adquirir el bloqueo: " . $e->getMessage());
            throw new Exception("GC " . "No se pudo adquirir el bloqueo: " . $e->getMessage());
        } catch (ParseError $e) {
            // Manejo de la excepción ParseError
            Log::error("GC " . $e->getMessage() . "Monto maximo 999 999 999");
            throw new Exception("GC " . $e->getMessage() . "Monto maximo 999 999 999");
        } catch (Exception $e) {
            // Manejar la excepción
            Log::error("GC " . $e->getMessage());
            throw new Exception("GC " . $e->getMessage());
        }
    }
}
