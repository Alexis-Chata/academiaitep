<?php

namespace App\Livewire\Forms;

use App\Models\Cmoodle;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoriaMoodle extends Form
{
    private $cmoodle;
    public $categoria;
    public function __construct(){$this->cmoodle = Cmoodle::find(1);}

    public function crear_categoria($nombre,$parent = 0)
    {
        $mensaje_observaciones = [];
        $mensaje_observaciones[0] = true;
        if (!$this->cmoodle || !$this->cmoodle->estado) {
            throw new \Exception($response['message'] ?? 'No existe cmoodle o su estado es inactivo. Crearlo para realizar la conexión.');
        }

        $functionname = 'core_course_create_categories';
        $consulta = $this->cmoodle->dominio
        . '?wstoken=' . $this->cmoodle->token
        . '&wsfunction='.$functionname
        .'&moodlewsrestformat=json'
        .'&categories[0][name]='.$nombre
        .'&categories[0][parent]='.$parent
        .'&categories[0][descriptionformat]=0';
        $c_categoria = Http::get($consulta);
        dd($c_categoria);
        if (isset(json_decode($c_categoria)->exception)) {throw new \Exception($response['message'] ?? 'Error al crear categoría en Moodle.');}
        return json_decode($c_categoria)[0]->id ?? null;
    }
}
