<?php

namespace App\Livewire;

use App\Livewire\Forms\CgrupoForm;
use App\Models\Cgrupo;
use App\Models\Ciclo;
use App\Models\Modalidad;
use App\Models\Turno;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarCgrupos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public CgrupoForm $cgrupoform;
    public $titulo_cgrupo = 'Crear';
    public $n_pagina = 5;

    public function modal_cgrupo(Cgrupo $cgrupo = null)
    {
        $this->cgrupoform->reset();
        $this->titulo_cgrupo = isset($cgrupo->id) ? 'Editar' : 'Crear';
        if ( isset($cgrupo->id)) {$this->cgrupoform->set($cgrupo);}
    }

    public function save_cgrupo()
    {
        if (isset($this->cgrupoform->cgrupo->id)) {$this->cgrupoform->update();}
        else {$this->cgrupoform->store();}
        $this->dispatch('cerrar_modal_cgrupo');
    }

    public function eliminar_cgrupo(Cgrupo $cgrupo){
        if ($cgrupo) {$cgrupo->delete();}
        else {
            $mensaje = "No se puede eliminar este cgrupo";
            $this->dispatch('mensaje_eliminar_cgrupo',$mensaje);
        }
    }

    public function render()
    {
        $cgrupos = Cgrupo::paginate($this->n_pagina);
        $ciclos = Ciclo::all();
        $turnos = Turno::all();
        $modalidads = Modalidad::all();
        return view('livewire.gestionar-cgrupos',compact('cgrupos','ciclos','turnos','modalidads'));
    }
}
