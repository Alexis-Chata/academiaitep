<?php

namespace App\Livewire\Forms;

use App\Models\Apoderado;
use Illuminate\Support\Arr;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ApoderadoForm extends Form
{
    public ?Apoderado $apoderado;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $ap_paterno;
    #[Validate('required')]
    public $ap_materno;
    #[Validate('required')]
    public $celular1;
    #[Validate('required')]
    public $nro_documento;
    #[Validate('required')]
    public $direccion;
    public $email;
    #[Validate('required')]
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
        $this->email = $apoderado->email ?? '{$apoderado->nro_documento}@example.com';
        $this->f_tipo_documento_id = $apoderado->f_tipo_documento_id;
    }

    public function update()
    {
        $this->apoderado->update(Arr::except($this->all(), ['apoderado']));
    }

    public function store()
    {
        $this->validate();

        if (isset($this->apoderado)) {
            $this->update();
        } else {
            Apoderado::create($this->all());
        }
    }
}
