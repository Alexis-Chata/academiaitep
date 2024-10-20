<?php

namespace App\Livewire\Forms;

use App\Models\Apoderado;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ApoderadoForm extends Form
{
    public ?Apoderado $apoderado = null;

    #[Validate('required', message: '* Nombre Requerido')]
    public $name;
    #[Validate('required', message: '* Ap.Paterno Requerido')]
    public $ap_paterno;
    #[Validate('required', message: '* Ap.Materno Requerido')]
    public $ap_materno;
    #[Validate('required', message: '* Requerido')]
    public $celular1;
    #[Validate('required', message: '* Nro.Documento Requerido')]
    public $nro_documento;
    #[Validate('required', message: '* Requerido')]
    public $direccion;
    #[Validate('nullable|email')]
    public $email;
    #[Validate('required', message: '* Requerido')]
    public $f_tipo_documento_id;

    public function set(Apoderado $apoderado)
    {
        $this->apoderado = $apoderado;
        $this->name = $apoderado->name;
        $this->ap_paterno = $apoderado->ap_paterno;
        $this->ap_materno = $apoderado->ap_materno;
        $this->celular1 = $apoderado->celular1;
        $this->nro_documento = $apoderado->nro_documento;
        $this->direccion = $apoderado->direccion;
        $this->email = $apoderado->email;
        $this->f_tipo_documento_id = $apoderado->f_tipo_documento_id;
    }

    public function update()
    {
        $this->validate();

        if ($this->apoderado) {
            $this->apoderado->update($this->all());
        }
    }

    public function store()
    {
        if (empty($this->email)) {
            $this->email = 'sin_email@ejemplo.com'; // O usa una cadena vacía: ''
        }
        $this->validate();

        if ($this->apoderado) {
            $this->update();
        } else {
            $this->apoderado = Apoderado::create($this->all());
        }
    }
}
