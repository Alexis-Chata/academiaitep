<?php

namespace App\Livewire;

use App\Livewire\Forms\InicioForm;
use App\Models\anio;
use App\Models\Inicio;
use App\Models\Plantilla;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarInicios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public InicioForm $inicioform;
    public $sanio,$splantilla;
    public $titulo_inicio = 'Crear';
    public $n_pagina = 5;

    public function modal_inicio(Inicio $inicio = null)
    {
        $this->inicioform->reset();
        $this->titulo_inicio = isset($inicio->id) ? 'Editar' : 'Crear';
        if ( isset($inicio->id)) {$this->inicioform->set($inicio);}
    }

    public function save_inicio()
    {
        if (isset($this->inicioform->inicio->id)) {$this->inicioform->update();}
        else {$this->inicioform->store();}
        $this->dispatch('cerrar_modal_inicio');
    }

    public function eliminar_inicio(Inicio $inicio)
    {
        if ($inicio) {$inicio->delete();}
        else {
            $mensaje = "No se puede eliminar este inicio";
            $this->dispatch('mensaje_eliminar_inicio',$mensaje);
        }
    }

    public function render()
    {
        $anios = anio::all();
        $inicios = Inicio::paginate($this->n_pagina);
        $plantillas = Plantilla::all();
        return view('livewire.gestionar-inicios',compact('inicios','anios','plantillas'));
    }
}
