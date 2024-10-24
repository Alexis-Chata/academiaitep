<?php

namespace App\Livewire\Forms;

use App\Models\Inicio;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InicioForm extends Form
{
    public ?Inicio $inicio;

    #[Rule('required')]
    public $name;
    public $id_category_moodle = NULL;
    public $id_anio;
    public $estado = true;


    public function set(Inicio $inicio)
    {
        $this->inicio = $inicio;
        $this->name = $inicio->name;
        $this->id_category_moodle = $inicio->id_category_moodle;
        $this->id_anio = $inicio->id_anio;
        $this->estado = $inicio->estado;
    }

    public function update(){
        $this->validate();
        $this->inicio->update($this->all());
    }

    public function store()
    {$this->validate();Inicio::create($this->all());}
}
