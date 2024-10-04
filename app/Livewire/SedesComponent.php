<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_sede;
use App\Models\F_empresa;
use Livewire\WithPagination;

class SedesComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina_sedes = 10;

    public $sede_id, $nombre_sede, $telefono, $direccion, $departamento, $provincia, $distrito, $ubigueo, $addresstypecode, $f_empresa_id;
    
    public $isOpenSede = false;

    protected $rules = [
        'nombre_sede' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'direccion' => 'required|string|max:255',
        'departamento' => 'required|string|max:50',
        'provincia' => 'required|string|max:50',
        'distrito' => 'required|string|max:50',
        'ubigueo' => 'required|string|size:6',
        'addresstypecode' => 'required|string|max:4',
        'f_empresa_id' => 'required|exists:f_empresas,id',
    ];

    public function render()
    {
        $sedes = F_sede::paginate($this->n_pagina_sedes);
        $empresas = F_empresa::all();
        return view('livewire.sedes-component', compact('sedes', 'empresas'));
    }

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
        $this->validate();

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
        $this->validate();

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
        try {
            $sede = F_sede::findOrFail($id);
            
            // Verificar si la sede tiene series asociadas
            $seriesCount = $sede->series()->count();
            
            if ($seriesCount > 0) {
                session()->flash('error', 'No se puede eliminar la sede porque tiene ' . $seriesCount . ' series asociadas. Por favor, elimine primero las series relacionadas.');
            } else {
                $sede->delete();
                session()->flash('message', 'Sede eliminada exitosamente.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'No se pudo eliminar la sede. Error: ' . $e->getMessage());
        }
    }
}