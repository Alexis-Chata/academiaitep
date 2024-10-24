<?php

namespace App\Livewire\Forms;

use App\Models\Cmoodle;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserMoodle extends Form
{
    private $cmoodle;
    public $user;
    public function __construct(User $user)
    {
        $this->cmoodle = Cmoodle::find(1);
        $this->user = $user;
    }

    public function crear_usuario()
    {
        $mensaje_observaciones = [];
        $mensaje_observaciones[0] = true;
        if (!$this->cmoodle || !$this->cmoodle->estado) {
            $mensaje_observaciones[1] = 'No existe cmoodle o su estado es inactivo. Crearlo para realizar la conexión.';
        }

        # Verificar si el usuario ya tiene un id de Moodle asignado
        if ($this->user->id_moodle_user && $this->user->id_moodle_user > 0) {
            throw new \Exception('El usuario ya tiene un id de Moodle asignado.');
        }

        $functionname = 'core_user_create_users';
        $consulta = $this->cmoodle->dominio
            . '?wstoken=' . $this->cmoodle->token
            . '&wsfunction=' . $functionname
            . '&moodlewsrestformat=json&users[0][username]=' .$this->user->nro_documento
            . '&users[0][password]=' . $this->user->nro_documento
            . '&users[0][firstname]=' . $this->user->name
            . '&users[0][lastname]=' . $this->user->ap_paterno." ".$this->user->ap_materno
            . '&users[0][email]=' . $this->user->email
            . '&users[0][country]=PE';
        $n_user = Http::get($consulta);

        # Manejo de errores de la respuesta de Moodle
        if (isset(json_decode($n_user)->exception)) {throw new \Exception($response['message'] ?? 'Error al crear usuario en Moodle.');}
        # Asignar el id de Moodle al usuario y guardar
        $this->user->id_moodle_user = json_decode($n_user)[0]->id ?? null;
        $this->user->save();
        return $mensaje_observaciones;
    }
}
