<?php

namespace App\Livewire;

use App\Livewire\Forms\ModalidadForm;
use App\Models\Modalidad;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarModalidads extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public ModalidadForm $modalidadform;
    public $titulo_modalidad = 'Crear';
    public $n_pagina = 5;

    public function modal_modalidad(Modalidad $modalidad = null)
    {
        $this->modalidadform->reset();
        $this->titulo_modalidad = isset($modalidad->id) ? 'Editar' : 'Crear';
        if ( isset($modalidad->id)) {$this->modalidadform->set($modalidad);}
    }

    public function save_modalidad()
    {
        if (isset($this->modalidadform->modalidad->id)) {$this->modalidadform->update();}
        else {$this->modalidadform->store();}
        $this->dispatch('cerrar_modal_modalidad');
    }

    public function eliminar_modalidad(Modalidad $modalidad){
        if ($modalidad) {$modalidad->delete();}
        else {
            $mensaje = "No se puede eliminar este modalidad";
            $this->dispatch('mensaje_eliminar_modalidad',$mensaje);
        }
    }

    public function render()
    {
        $modalidads = Modalidad::paginate($this->n_pagina);
        return view('livewire.gestionar-modalidads',compact('modalidads'));
    }
}
