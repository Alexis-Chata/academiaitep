<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
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
    public $direccion;
    public $celular1;
    public $celular2;
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
        $this->direccion = $user->direccion;
        $this->celular1 = $user->celular1;
        $this->celular2 = $user->celular2;
        $this->estado = $user->estado;
        $this->locked = $user->locked;
        $this->password = bcrypt($user->nro_documento);
        $this->profile_photo_path = $user->profile_photo_path;
        $this->dni_path = $user->dni_path;
    }

    public function update(){
        $this->user->update($this->all());
    }

    public function store()
    {
        $this->validate();
        if (!isset($this->password)) {
            $this->password = bcrypt($this->nro_documento);
        }

        if (isset($this->user)) {
            $this->validate([
                'email' => 'required|email|unique:users,email,'.$this->user->id,
            ]);
            $this->update();
        } else {
            $this->validate([
                'email' => 'required|email|unique:users,email',
            ]);
            User::create($this->all());
        }
    }
}
