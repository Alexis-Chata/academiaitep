<?php

namespace App\Livewire\Forms;

use App\Models\Grupo;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GrupoForm extends Form
{
    public ?Grupo $grupo;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $aula_id;

    #[Rule('required')]
    public $turno_id;

    #[Rule('required')]
    public $ciclo_id;

    #[Rule('required')]
    public $modalidad_id;

    #[Rule('required')]
    public $estado = 1;

    public function set(Grupo $grupo){
        $this->grupo = $grupo;
        $this->name = $grupo->name;
        $this->aula_id = $grupo->aula_id;
        $this->turno_id = $grupo->turno_id;
        $this->ciclo_id = $grupo->ciclo_id;
        $this->modalidad_id = $grupo->modalidad_id;
        $this->estado = $grupo->estado;
    }

    public function update(){
        $this->validate();
        $this->grupo->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Grupo::create($this->all());
    }
}