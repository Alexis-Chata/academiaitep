<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_empresa;
use Livewire\WithPagination;
use Illuminate\Database\QueryException;

class Empresas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina = 10;
    public $empresa_id, $nombre, $ruc, $telefono, $direccion, $departamento, $provincia, $distrito, $ubigueo, $tokenapisperu;
    public $isOpen = false;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'ruc' => 'required|string|size:11|unique:f_empresas,ruc',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'required|string|max:255',
        'departamento' => 'required|string|max:50',
        'provincia' => 'required|string|max:50',
        'distrito' => 'required|string|max:50',
        'ubigueo' => 'required|string|size:6',
        'tokenapisperu' => 'nullable|string|max:255',
    ];

    public function render()
    {
        $empresas = F_empresa::paginate($this->n_pagina);
        return view('livewire.empresas', compact('empresas'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->empresa_id = '';
        $this->nombre = '';
        $this->ruc = '';
        $this->telefono = '';
        $this->direccion = '';
        $this->departamento = '';
        $this->provincia = '';
        $this->distrito = '';
        $this->ubigueo = '';
        $this->tokenapisperu = '';
    }

    public function store()
    {
        $this->validate();

        F_empresa::create([
            'nombre' => $this->nombre,
            'razon_social' => $this->nombre,
            'ruc' => $this->ruc,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'departamento' => $this->departamento,
            'provincia' => $this->provincia,
            'distrito' => $this->distrito,
            'ubigueo' => $this->ubigueo,
            'tokenapisperu' => $this->tokenapisperu,
        ]);

        session()->flash('message', 'Empresa creada exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $empresa = F_empresa::findOrFail($id);
        $this->empresa_id = $id;
        $this->nombre = $empresa->nombre;
        $this->ruc = $empresa->ruc;
        $this->telefono = $empresa->telefono;
        $this->direccion = $empresa->direccion;
        $this->departamento = $empresa->departamento;
        $this->provincia = $empresa->provincia;
        $this->distrito = $empresa->distrito;
        $this->ubigueo = $empresa->ubigueo;
        $this->tokenapisperu = $empresa->tokenapisperu;

        $this->openModal();
    }

    public function update()
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'ruc' => 'required|string|size:11|unique:f_empresas,ruc,' . $this->empresa_id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string|max:50',
            'provincia' => 'required|string|max:50',
            'distrito' => 'required|string|max:50',
            'ubigueo' => 'required|string|size:6',
            'tokenapisperu' => 'nullable|string|max:255',
        ];

        $this->validate($rules);

        if ($this->empresa_id) {
            $empresa = F_empresa::find($this->empresa_id);
            $empresa->update([
                'nombre' => $this->nombre,
                'ruc' => $this->ruc,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'departamento' => $this->departamento,
                'provincia' => $this->provincia,
                'distrito' => $this->distrito,
                'ubigueo' => $this->ubigueo,
                'tokenapisperu' => $this->tokenapisperu,
            ]);
            session()->flash('message', 'Empresa actualizada exitosamente.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        try {
            $empresa = F_empresa::findOrFail($id);
            $empresa->delete();
            session()->flash('message', 'Empresa eliminada exitosamente.');
        } catch (QueryException $e) {
            // Verificar si es un error de integridad referencial
            if ($e->getCode() == 23000) {
                session()->flash('error', 'No se puede eliminar esta empresa porque está siendo utilizada por una o más sedes.');
            } else {
                session()->flash('error', 'Ha ocurrido un error al intentar eliminar la empresa.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Ha ocurrido un error al intentar eliminar la empresa.');
        }
    }
}
