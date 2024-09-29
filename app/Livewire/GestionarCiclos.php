<?php

namespace App\Livewire;

use App\Livewire\Forms\CicloForm;
use App\Models\Ciclo;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarCiclos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public CicloForm $cicloform;
    public $titulo_ciclo = 'Crear';
    public $n_pagina = 5;

    public function modal_ciclo(Ciclo $ciclo = null)
    {
        $this->cicloform->reset();
        $this->titulo_ciclo = isset($ciclo->id) ? 'Editar' : 'Crear';
        if ( isset($ciclo->id)) {$this->cicloform->set($ciclo);}
    }

    public function save_ciclo()
    {
        if (isset($this->cicloform->ciclo->id)) {$this->cicloform->update();}
        else {$this->cicloform->store();}
        $this->dispatch('cerrar_modal_ciclo');
    }

    public function eliminar_ciclo(Ciclo $ciclo){
        if ($ciclo) {$ciclo->delete();}
        else {
            $mensaje = "No se puede eliminar este ciclo";
            $this->dispatch('mensaje_eliminar_ciclo',$mensaje);
        }
    }

    public function render()
    {
        $ciclos = Ciclo::paginate($this->n_pagina);
        return view('livewire.gestionar-ciclos',compact('ciclos'));
    }
}
