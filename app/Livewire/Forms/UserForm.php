<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $ap_paterno;
    #[Validate('required')]
    public $ap_materno;
    #[Validate('required')]
    public $f_tipo_documento_id;
    #[Validate('required')]
    public $nro_documento;
    #[Validate('required')]
    public $email;
    public $estado;
    public $locked;
    public $password;
    public $profile_photo_path;
    public $dni_path;

    public function set(User $user){
        $this->user = $user;
        $this->name = $user->name;
        $this->ap_paterno = $user->ap_paterno;
        $this->ap_materno = $user->ap_materno;
        $this->f_tipo_documento_id = $user->f_tipo_documento_id;
        $this->nro_documento = $user->nro_documento;
        $this->email = $user->email;
        $this->estado = $user->estado;
        $this->locked = $user->locked;
        $this->password = $user->identificacion;
        $this->profile_photo_path = $user->profile_photo_path;
        $this->dni_path = $user->dni_path;
    }

    public function update(){
        $this->validate();
        $this->user->update($this->all());
    }

    public function store()
    {
        $this->validate();
        User::create($this->all());
    }
}
