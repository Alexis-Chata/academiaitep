<?php

namespace App\Livewire\Forms;

use App\Models\Modalidad;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ModalidadForm extends Form
{
    public ?Modalidad $modalidad;

    #[Rule('required')]
    public $name;

    public function set(Modalidad $modalidad){
        $this->modalidad = $modalidad;
        $this->name = $modalidad->name;
    }

    public function update(){
        $this->validate();
        $this->modalidad->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Modalidad::create($this->all());
    }
}