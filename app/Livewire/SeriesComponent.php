<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_serie;
use App\Models\F_sede;
use App\Models\F_tipo_comprobante;
use Livewire\WithPagination;

class SeriesComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina_series = 10;

    public $serie_id, $tipo_comprobante_id, $serie, $correlativo, $f_sede_id;

    public $isOpenSerie = false;

    protected $rules = [
        'tipo_comprobante_id' => 'required|exists:f_tipo_comprobantes,id',
        'serie' => 'required|string|max:4',
        'correlativo' => 'required|integer',
        'f_sede_id' => 'required|exists:f_sedes,id',
    ];

    public function render()
    {
        $series = F_serie::paginate($this->n_pagina_series);
        $sedes = F_sede::all();
        $tipoComprobantes = F_tipo_comprobante::where('estado_pos', true)->get();
        return view('livewire.series-component', compact('series', 'sedes', 'tipoComprobantes'));
    }

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
