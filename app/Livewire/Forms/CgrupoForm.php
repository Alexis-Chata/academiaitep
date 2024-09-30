<?php

namespace App\Livewire\Forms;

use App\Models\Cgrupo;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CgrupoForm extends Form
{
    public ?Cgrupo $cgrupo;

    #[Rule('required')]
    public $ciclo_id;

    #[Rule('required')]
    public $turno_id;
    
    #[Rule('required')]
    public $modalidad_id;

    #[Rule('required')]
    public $costo;


    public function set(Cgrupo $cgrupo)
    {
        $this->cgrupo = $cgrupo;
        $this->ciclo_id = $cgrupo->ciclo_id;
        $this->turno_id = $cgrupo->turno_id;
        $this->modalidad_id = $cgrupo->modalidad_id;
        $this->costo = $cgrupo->costo;
    }

    public function update()
    {
        $this->validate();
        $this->cgrupo->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Cgrupo::create($this->all());
    }
}