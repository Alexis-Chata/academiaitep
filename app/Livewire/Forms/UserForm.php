<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required', message: '* Requerido')]
    public $name;
    #[Validate('required', message: '* Requerido')]
    public $ap_paterno;
    #[Validate('required', message: '* Requerido')]
    public $ap_materno;
    #[Validate('required', message: '* Requerido')]
    public $f_tipo_documento_id;
    #[Validate('required', message: '* Requerido')]
    public $nro_documento;
    #[Validate('required', message: '* Requerido')]
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
        $this->user = $user->load(["user_apoderados", "user_apoderados.apoderado", "user_apoderados.tipo_apoderado", "matriculas"]);
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
        $this->profile_photo_path = $user->profile_photo_path ?? "https://icones.pro/wp-content/uploads/2021/03/avatar-de-personne-icone-homme.png";
        $this->dni_path = $user->dni_path ?? "https://cdn.www.gob.pe/uploads/medium/archive/000/010/331/dni-digito-verificador.png";
    }

    public function update(){
        $this->user->update(Arr::except($this->all(), ['user']));
    }

    public function store()
    {
        $this->validate();
        if (!isset($this->password)) {
            $this->password = bcrypt($this->nro_documento);
        }

        DB::beginTransaction();
        $mensaje_observaciones = false;
        try {
            if (isset($this->user))
            {
                $this->validate(['email' => 'required|email|unique:users,email,'.$this->user->id,]);
                $mensaje_observaciones = $this->update();
            }

            else
            {
                $this->validate(['email' => 'required|email|unique:users,email',]);
                $usuario = User::create($this->all());
                #crear el usuario de moodle
                $n_moodle = new UserMoodle($usuario);
                $mensaje_observaciones = $n_moodle->crear_usuario();
                #Confirmar la transacción si todo sale bien
                DB::commit();
            }
            return $mensaje_observaciones;
        }
        catch (\Exception $e)
        {
            # Si hay algún error, revertir los cambios en la base de datos
            DB::rollBack();

            # Eliminar el usuario creado si existe
            if (isset($usuario)) {$usuario->delete();}

            # Lanzar una nueva excepción para mostrar el mensaje de error
            throw new \Exception('Error al crear o actualizar el usuario: ' . $e->getMessage());
        }
    }
}
