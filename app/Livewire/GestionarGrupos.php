<?php

namespace App\Livewire;

use App\Livewire\Forms\GrupoForm;
use App\Models\Aula;
use App\Models\Ciclo;
use App\Models\Grupo;
use App\Models\Modalidad;
use App\Models\Turno;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarGrupos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public GrupoForm $grupoform;
    public $titulo_grupo = 'Crear';
    public $n_pagina = 5;

    public function modal_grupo(Grupo $grupo = null)
    {
        $this->grupoform->reset();
        $this->titulo_grupo = isset($grupo->id) ? 'Editar' : 'Crear';
        if ( isset($grupo->id)) {$this->grupoform->set($grupo);}
    }

    public function save_grupo()
    {
        if (isset($this->grupoform->grupo->id)) {$this->grupoform->update();}
        else {$this->grupoform->store();}
        $this->dispatch('cerrar_modal_grupo');
    }

    public function eliminar_grupo(Grupo $grupo){
        if ($grupo) {$grupo->delete();}
        else {
            $mensaje = "No se puede eliminar este grupo";
            $this->dispatch('mensaje_eliminar_grupo',$mensaje);
        }
    }

    public function render()
    {
        $grupos = Grupo::paginate($this->n_pagina);
        $aulas = Aula::all();
        $turnos = Turno::all();
        $ciclos = Ciclo::all();
        $modalidads = Modalidad::all();
        return view('livewire.gestionar-grupos',compact('grupos','aulas','turnos','ciclos','modalidads'));
    }
}
