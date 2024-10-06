<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_sede;
use App\Models\F_serie;
use App\Models\F_empresa;
use App\Models\F_tipo_comprobante;
use Livewire\WithPagination;

class SedesSeries extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina_sedes = 10;
    public $n_pagina_series = 10;

    // Variables para Sedes
    public $sede_id, $nombre_sede, $telefono, $direccion, $departamento, $provincia, $distrito, $ubigueo, $addresstypecode, $f_empresa_id;

    // Variables para Series
    public $serie_id, $tipo_comprobante_id, $serie, $correlativo, $f_sede_id;

    public $isOpenSede = false;
    public $isOpenSerie = false;

    protected $rules = [
        // Reglas para Sedes
        'nombre_sede' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'departamento' => 'required|string|max:50',
        'provincia' => 'required|string|max:50',
        'distrito' => 'required|string|max:50',
        'ubigueo' => 'required|string|size:6',
        'addresstypecode' => 'required|string|max:4',
        'f_empresa_id' => 'required|exists:f_empresas,id',

        // Reglas para Series
        'tipo_comprobante_id' => 'required|exists:f_tipo_comprobantes,id',
        'serie' => 'required|string|max:4',
        'correlativo' => 'required|integer|min:0',
        'f_sede_id' => 'required|exists:f_sedes,id',
    ];

    public function render()
    {
        $sedes = F_sede::paginate($this->n_pagina_sedes);
        $series = F_serie::paginate($this->n_pagina_series);
        $empresas = F_empresa::all();
        $tipoComprobantes = F_tipo_comprobante::where('estado_pos', true)->get();
        return view('livewire.sedes-series', compact('sedes', 'series', 'empresas', 'tipoComprobantes'));
    }

    // Métodos para Sedes
    public function createSede()
    {
        $this->resetSedeInputFields();
        $this->openModalSede();
    }

    public function openModalSede()
    {
        $this->isOpenSede = true;
    }

    public function closeModalSede()
    {
        $this->isOpenSede = false;
    }

    private function resetSedeInputFields()
    {
        $this->sede_id = null;
    $this->nombre_sede = '';
    $this->telefono = '';
    $this->direccion = '';
    $this->departamento = '';
    $this->provincia = '';
    $this->distrito = '';
    $this->ubigueo = '';
    $this->addresstypecode = '';
    $this->f_empresa_id = null;
    }

    public function storeSede()
    {
        $this->validate([
            'nombre_sede' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:50',
            'provincia' => 'required|string|max:50',
            'distrito' => 'required|string|max:50',
            'ubigueo' => 'required|string|size:6',
            'addresstypecode' => 'required|string|max:4',
            'f_empresa_id' => 'required|exists:f_empresas,id',
        ]);

        F_sede::create([
            'nombre' => $this->nombre_sede,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'departamento' => $this->departamento,
            'provincia' => $this->provincia,
            'distrito' => $this->distrito,
            'ubigueo' => $this->ubigueo,
            'addresstypecode' => $this->addresstypecode,
            'f_empresa_id' => $this->f_empresa_id,
        ]);

        session()->flash('message', 'Sede creada exitosamente.');
        $this->closeModalSede();
        $this->resetSedeInputFields();
    }

    public function editSede($id)
    {
        $sede = F_sede::findOrFail($id);
        $this->sede_id = $id;
        $this->nombre_sede = $sede->nombre;
        $this->telefono = $sede->telefono;
        $this->direccion = $sede->direccion;
        $this->departamento = $sede->departamento;
        $this->provincia = $sede->provincia;
        $this->distrito = $sede->distrito;
        $this->ubigueo = $sede->ubigueo;
        $this->addresstypecode = $sede->addresstypecode;
        $this->f_empresa_id = $sede->f_empresa_id;

        $this->openModalSede();
    }

    public function updateSede()
    {
        $this->validate([
            'nombre_sede' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:50',
            'provincia' => 'required|string|max:50',
            'distrito' => 'required|string|max:50',
            'ubigueo' => 'required|string|size:6',
            'addresstypecode' => 'required|string|max:4',
            'f_empresa_id' => 'required|exists:f_empresas,id',
        ]);

        if ($this->sede_id) {
            $sede = F_sede::find($this->sede_id);
            $sede->update([
                'nombre' => $this->nombre_sede,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'departamento' => $this->departamento,
                'provincia' => $this->provincia,
                'distrito' => $this->distrito,
                'ubigueo' => $this->ubigueo,
                'addresstypecode' => $this->addresstypecode,
                'f_empresa_id' => $this->f_empresa_id,
            ]);
            session()->flash('message', 'Sede actualizada exitosamente.');
        }

        $this->closeModalSede();
        $this->resetSedeInputFields();
    }

    public function deleteSede($id)
    {
        F_sede::find($id)->delete();
        session()->flash('message', 'Sede eliminada exitosamente.');
    }

    // Métodos para Series
    public function createSerie()
    {
        $this->resetSerieInputFields();
        $this->openModalSerie();
    }

    public function openModalSerie()
    {
        $this->isOpenSerie = true;
    }

    public function closeModalSerie()
    {
        $this->isOpenSerie = false;
    }

    private function resetSerieInputFields()
    {
        $this->serie_id = null;
    $this->tipo_comprobante_id = null;
    $this->serie = '';
    $this->correlativo = '';
    $this->f_sede_id = null;
    }

    public function storeSerie()
    {
        $this->validate();

        F_serie::create([
            'tipo_comprobante_id' => $this->tipo_comprobante_id,
            'serie' => $this->serie,
            'correlativo' => $this->correlativo,
            'fecha_emision' => date('Y-m-d'),
            'f_sede_id' => $this->f_sede_id,
        ]);

        session()->flash('message', 'Serie creada exitosamente.');
        $this->closeModalSerie();
        $this->resetSerieInputFields();
    }

    public function editSerie($id)
    {
        $serie = F_serie::findOrFail($id);
        $this->serie_id = $id;
        $this->tipo_comprobante_id = $serie->tipo_comprobante_id;
        $this->serie = $serie->serie;
        $this->correlativo = $serie->correlativo;
        $this->f_sede_id = $serie->f_sede_id;

        $this->openModalSerie();
    }

    public function updateSerie()
    {
        $this->validate();

        if ($this->serie_id) {
            $serie = F_serie::find($this->serie_id);
            $serie->update([
                'tipo_comprobante_id' => $this->tipo_comprobante_id,
                'serie' => $this->serie,
                'correlativo' => $this->correlativo,
                'f_sede_id' => $this->f_sede_id,
            ]);
            session()->flash('message', 'Serie actualizada exitosamente.');
        }

        $this->closeModalSerie();
        $this->resetSerieInputFields();
    }

    public function deleteSerie($id)
    {
        F_serie::find($id)->delete();
        session()->flash('message', 'Serie eliminada exitosamente.');
    }
}
