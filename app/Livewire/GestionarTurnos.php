<?php

namespace App\Livewire;

use App\Livewire\Forms\TurnoForm;
use App\Models\Turno;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarTurnos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public TurnoForm $turnoform;
    public $titulo_turno = 'Crear';
    public $n_pagina = 5;

    public function modal_turno(Turno $turno = null)
    {
        $this->turnoform->reset();
        $this->titulo_turno = isset($turno->id) ? 'Editar' : 'Crear';
        if ( isset($turno->id)) {$this->turnoform->set($turno);}
    }

    public function save_turno()
    {
        if (isset($this->turnoform->turno->id)) {$this->turnoform->update();}
        else {$this->turnoform->store();}
        $this->dispatch('cerrar_modal_turno');
    }

    public function eliminar_turno(Turno $turno){
        if ($turno) {$turno->delete();}
        else {
            $mensaje = "No se puede eliminar este turno";
            $this->dispatch('mensaje_eliminar_turno',$mensaje);
        }
    }

    public function render()
    {
        $turnos = Turno::paginate($this->n_pagina);
        return view('livewire.gestionar-turnos',compact('turnos'));
    }
}
