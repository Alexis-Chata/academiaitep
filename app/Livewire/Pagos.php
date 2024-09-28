<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Livewire\Attributes\On;
use Livewire\Component;

class Pagos extends Component
{
    public UserForm $userform;

    public function mount()
    {
        $this->userform->name ="Arthur Juan";
        $this->userform->ap_paterno ="Buitron";
        $this->userform->ap_materno ="Navarro";
        $this->userform->f_tipo_documento_id ="DNI";
        $this->userform->nro_documento ="12345678";
        $this->userform->direccion ="Mz C Lt 14 - Chorrillos";
        $this->userform->email ="estudiante1@gmail.com";
        $this->userform->celular1 ="934 665 704";
        $this->userform->celular2 ="987 985 987";
    }

    #[On('user-save')]
    public function save_user()
    {
        $this->userform->store();
    }

    public function render()
    {
        return view('livewire.pagos');
    }
}
