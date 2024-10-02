<?php

namespace App\Livewire\Forms;

use App\Models\User_apoderado;
use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserApoderadoForm extends Form
{
    public ?User_apoderado $user_apoderado;

    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $apoderado_id;
    #[Validate('required')]
    public $tapoderado_id;

    public function set(User_apoderado $user_apoderado)
    {
        $this->user_apoderado = $user_apoderado;
        $this->user_id = $user_apoderado->user_id;
        $this->apoderado_id = $user_apoderado->apoderado_id;
        $this->tapoderado_id = $user_apoderado->tapoderado_id;
    }

    public function update()
    {
        $this->user_apoderado->update(Arr::except($this->all(), ['user_apoderado']));
    }

    public function store()
    {
        $this->validate();

        if (isset($this->user_apoderado)) {
            $this->update();
        } else {
            User_apoderado::create($this->all());
        }
    }

    public function delete()
    {
        $this->user_apoderado->delete();
    }
}
