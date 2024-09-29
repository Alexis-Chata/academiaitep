<?php

namespace App\Livewire\Forms;

use App\Models\Carrera;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CarreraForm extends Form
{
    public ?Carrera $carrera;

    #[Rule('required')]
    public $name;
    public $area_id;

    public function set(Carrera $carrera){

        $this->carrera = $carrera;
        $this->name = $carrera->name;
        $this->area_id = $carrera->area_id;
    }

    public function update()
    {
        $this->validate();$this->carrera->update($this->all());
    }

    public function store()
    {
        $this->validate();Carrera::create($this->all());
    }
}