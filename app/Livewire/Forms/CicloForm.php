<?php

namespace App\Livewire\Forms;

use App\Models\Ciclo;
use COM;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CicloForm extends Form
{
    public ?Ciclo $ciclo;

    #[Rule('required')]
    public $name;

    public function set(Ciclo $ciclo){
        $this->ciclo = $ciclo;
        $this->name = $ciclo->name;
    }

    public function update(){
        $this->validate();
        $this->ciclo->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Ciclo::create($this->all());
    }
}