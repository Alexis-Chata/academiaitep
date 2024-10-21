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
        if ($this->cmoodle && ($this->user->id_moodle_user == NULL or $this->user->id_moodle_user == 0))
        {
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

            if(isset(json_decode($n_user)->exception))
            {
                throw new \Exception($response->message ?? 'Error al crear usuario en Moodle.');
            }
            else
            {
                $this->user->id_moodle_user = json_decode($n_user)[0]->id;$this->user->save();return true;
            }
        }
        else
        {
            $mensaje_error = '';
            if ($this->cmoodle == false)
            {
                throw new \Exception('No existe cmoodle. Crearlo para realizar la conexión.');
            }
            elseif($this->user->id_moodle_user > 1)
            {
                throw new \Exception('El usuario ya tiene un id de Moodle asignado.');
            }
        }
    }
}
