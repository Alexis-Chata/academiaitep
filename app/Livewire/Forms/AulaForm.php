<?php

namespace App\Livewire\Forms;

use App\Models\Aula;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AulaForm extends Form
{
    public ?Aula $aula;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $shortname;
    public $capacidad;
    #[Rule('required')]
    public $taula_id;
    #[Rule('required')]
    public $sede_id;

    public function set(Aula $aula){
        $this->aula = $aula;
        $this->name = $aula->name;
        $this->shortname = $aula->shortname;
        $this->capacidad = $aula->capacidad;
        $this->taula_id = $aula->taula_id;
        $this->sede_id = $aula->sede_id;
    }

    public function update(){
        $this->validate(
            ['shortname' => 'unique:aulas,shortname,'.$this->aula->id,]
        );
        $this->aula->update($this->all());
    }

    public function store()
    {
        $this->validate();
        $this->validate(['shortname' => 'unique:aulas,shortname',]);
        Aula::create($this->all());
    }
}