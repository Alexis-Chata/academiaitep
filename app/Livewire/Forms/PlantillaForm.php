<?php

namespace App\Livewire\Forms;

use App\Models\Plantilla;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PlantillaForm extends Form
{
    public ?Plantilla $plantilla;

    #[Rule('required')]
    public $name;

    public function set(Plantilla $plantilla){
        $this->plantilla = $plantilla;
        $this->name = $plantilla->name;
    }

    public function update(){
        $this->validate();
        $this->plantilla->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Plantilla::create($this->all());
    }
}
