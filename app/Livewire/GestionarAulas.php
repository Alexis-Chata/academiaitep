<?php

namespace App\Livewire;

use App\Livewire\Forms\AulaForm;
use App\Models\Aula;
use App\Models\Sede;
use App\Models\Taula;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarAulas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public AulaForm $aulaform;
    public $titulo_aula = 'Crear';
    public $n_pagina = 5;

    public function modal_aula(Aula $aula = null)
    {
        $this->aulaform->reset();
        $this->titulo_aula = isset($aula->id) ? 'Editar' : 'Crear';
        if ( isset($aula->id)) {$this->aulaform->set($aula);}
    }

    public function save_aula()
    {
        if (isset($this->aulaform->aula->id)) {$this->aulaform->update();}
        else {$this->aulaform->store();}
        $this->dispatch('cerrar_modal_aula');
    }

    public function eliminar_aula(Aula $aula){
        if ($aula) {$aula->delete();}
        else {
            $mensaje = "No se puede eliminar este aula";
            $this->dispatch('mensaje_eliminar_aula',$mensaje);
        }
    }

    public function render()
    {
        $aulas = Aula::paginate($this->n_pagina);
        $taulas = Taula::all();
        $sedes = Sede::all();
        return view('livewire.gestionar-aulas',compact('aulas','taulas','sedes'));
    }
}
