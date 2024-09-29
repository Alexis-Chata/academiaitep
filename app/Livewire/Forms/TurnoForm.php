<?php

namespace App\Livewire\Forms;

use App\Models\Turno;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TurnoForm extends Form
{
    public ?Turno $turno;

    #[Rule('required')]
    public $name;

    public function set(Turno $turno){
        $this->turno = $turno;
        $this->name = $turno->name;
    }

    public function update(){
        $this->validate();
        $this->turno->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Turno::create($this->all());
    }
}
