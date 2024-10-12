<?php

namespace App\Livewire;

use App\Livewire\Forms\CstandarForm;
use App\Models\Cstandar;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarCstandars extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public CstandarForm $cstandarform;
    public $titulo_cstandar = 'Crear';
    public $n_pagina = 5;

    public function modal_cstandar(Cstandar $cstandar = null)
    {
        $this->cstandarform->reset();
        $this->titulo_cstandar = isset($cstandar->id) ? 'Editar' : 'Crear';
        if ( isset($cstandar->id)) {$this->cstandarform->set($cstandar);}
    }

    public function save_cstandar()
    {
        if (isset($this->cstandarform->cstandar->id)) {$this->cstandarform->update();}
        else {$this->cstandarform->store();}
        $this->dispatch('cerrar_modal_cstandar');
    }

    public function eliminar_cstandar(Cstandar $cstandar){
        if ($cstandar) {$cstandar->delete();}
        else {
            $mensaje = "No se puede eliminar este cstandar";
            $this->dispatch('mensaje_eliminar_cstandar',$mensaje);
        }
    }

    public function render()
    {
        $cstandars = Cstandar::paginate($this->n_pagina);
        return view('livewire.gestionar-cstandars',compact('cstandars'));
    }
}