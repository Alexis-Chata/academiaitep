<?php

namespace App\Livewire\Forms;

use App\Models\Cstandar;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CstandarForm extends Form
{
    public ?Cstandar $cstandar;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $precio;

    public function set(Cstandar $cstandar){
        $this->cstandar = $cstandar;
        $this->name = $cstandar->name;
        $this->precio = $cstandar->precio;
    }

    public function update(){
        $this->validate();
        $this->cstandar->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Cstandar::create($this->all());
    }
}