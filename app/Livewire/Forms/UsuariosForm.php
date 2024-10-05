<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;

class UsuariosForm extends Form
{
    public ?User $user;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $ap_paterno;
    #[Rule('required')]
    public $ap_materno;
    #[Rule('required')]
    public $f_tipo_documento_id;
    #[Rule('required')]
    public $nro_documento;
    #[Rule('required|email')]
    public $email;

    public $direccion,$celular1,$celular2,$id_moodle_user;
    public $estado = 1;
    public $locked = 1;
    public $roles = [];

    public function set(User $user)
    {
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
        $this->id_moodle_user = $user->id_moodle_user;
        $this->estado = $user->estado;
        $this->locked = $user->locked;
    }

    public function update($imagen = null)
    {
        $this->validate();
        $this->validate([
            'nro_documento' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (\App\Models\User::where('nro_documento', $value)
                        ->where('f_tipo_documento_id', $this->f_tipo_documento_id)
                        ->where('id', '!=', $this->user->id) // Excluir el registro actual
                        ->exists()) {
                        $fail('El número y tipo de documento ya están en uso por otro usuario.');
                    }
                },
            ],
            'f_tipo_documento_id' => 'required',
        ]);

        $this->user->update(
            $this->only('name','ap_paterno','ap_materno','f_tipo_documento_id','direccion','nro_documento','celular1','celular2','email','locked','estado')
        );

        if ($imagen) {
            $this->eliminar_imagen_perfil();
            $this->subir_imagen_perfil($imagen);
        }
        $this->eliminar_roles();
        $this->agregar_roles();
    }

    public function store($imagen = null)
    {
        $this->validate();
        $this->validate([
            'nro_documento' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (\App\Models\User::where('nro_documento', $value)
                        ->where('f_tipo_documento_id', $this->f_tipo_documento_id)
                        ->exists()) {
                        $fail('Ya existe un usuario con este tipo de documento y número.');
                    }
                },
            ],
            'f_tipo_documento_id' => 'required',
            'email' => 'unique:users,email',
        ]);

        $this->user = User::create($this->only('name','ap_paterno','ap_materno','f_tipo_documento_id','direccion','nro_documento','celular1','celular2','email','locked','estado')+['password' => bcrypt($this->nro_documento),]);
        if ($imagen) {$this->subir_imagen_perfil($imagen);}
        $this->eliminar_roles();
        $this->agregar_roles();
    }

    public function eliminar_imagen_perfil()
    {
        if ($this->user->profile_photo_path == true)
        {
            $eliminar = str_replace('storage', 'public', $this->user->profile_photo_path);
            Storage::delete([$eliminar]);
        }
    }

    public function subir_imagen_perfil($imagen)
    {
        $extension = $imagen->extension();
        $img_marca = $imagen->storeAs('public/usuarios', $this->user->id."-".strtotime(date('Y-m-d h:i:s')).".".$extension);
        $this->user->profile_photo_path = Storage::url($img_marca);
        $this->user->save();
    }

    public function suspender(){
        if($this->user->id)
        {
            $this->user->locked = $this->user->locked == 1 ? 0 : 1 ;
            $this->user->save();
         }
    }


    public function agregar_roles()
    {
        foreach ($this->roles as  $role2)
        {
            $this->user->assignRole($role2);
        };
    }

    public function eliminar_roles()
    {
        foreach($this->user->roles as $rola){
            $this->user->removeRole($rola->id);
            if($this->user->id == 1)
            {
                $this->user->assignRole('Administrador');
            }
        }
    }
}
