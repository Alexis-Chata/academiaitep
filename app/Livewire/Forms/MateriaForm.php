<?php

namespace App\Livewire\Forms;

use App\Models\Materia;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MateriaForm extends Form
{
    public ?Materia $materia;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $plantilla_id;

    public function set(Materia $materia){

        $this->materia = $materia;
        $this->name = $materia->name;
        $this->plantilla_id = $materia->plantilla_id;
    }

    public function update()
    {
        $this->validate();$this->materia->update($this->all());
    }

    public function store()
    {
        $this->validate();
        $materia = Materia::create($this->all());
    }
}
