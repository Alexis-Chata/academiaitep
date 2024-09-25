<?php

namespace App\Livewire\Forms;

use App\Models\Area;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AreaForm extends Form
{
    public ?Area $area;

    #[Rule('required')]
    public $name;

    public function set(Area $area){
        $this->area = $area;
        $this->name = $area->name;
    }

    public function update(){
        $this->validate();
        $this->area->update($this->all());
    }

    public function store()
    {
        $this->validate();
        Area::create($this->all());
    }
}
