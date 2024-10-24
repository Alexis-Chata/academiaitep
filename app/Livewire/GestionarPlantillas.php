<?php

namespace App\Livewire;

use App\Livewire\Forms\MateriaForm;
use App\Livewire\Forms\PlantillaForm;
use App\Models\Materia;
use App\Models\Plantilla;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarPlantillas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public PlantillaForm $plantillaform;
    public MateriaForm $materiaform;
    public $splantilla;
    public $titulo_plantilla = 'Crear';
    public $titulo_materia = 'Crear';
    public $n_pagina = 5;

    public function consultar_plantilla(Plantilla $plantilla){
        $this->splantilla = $plantilla;
        $this->materiaform->reset();
    }

    public function modal_materia(Materia $materia = null)
    {
        $this->materiaform->reset();
            $this->titulo_materia = isset($materia->id) ? 'Editar' : 'Crear';
        if ( isset($materia->id)) {$this->materiaform->set($materia);}
    }

    public function eliminar_materia(Materia $materia){$materia->delete();}

    public function save_materia()
    {
        if (isset($this->materiaform->plantilla->id)) {$this->plantillaform->update();}
        else
        {
            $this->materiaform->plantilla_id = $this->splantilla->id;
            $this->materiaform->store();
        }
        $this->materiaform->reset();
        $this->reset('titulo_materia');
    }

    public function modal_plantilla(Plantilla $plantilla = null)
    {
        $this->plantillaform->reset();
            $this->titulo_plantilla = isset($plantilla->id) ? 'Editar' : 'Crear';
        if ( isset($plantilla->id)) {$this->plantillaform->set($plantilla);}
    }

    public function save_plantilla()
    {
        if (isset($this->plantillaform->plantilla->id)) {$this->plantillaform->update();}
        else {$this->plantillaform->store();}
        $this->dispatch('cerrar_modal_plantilla');
    }

    public function eliminar_plantilla(Plantilla $plantilla){
        if ($plantilla->materias->count() == 0) {$plantilla->delete();}
        else {
            $mensaje = "No se puede eliminar esta plantilla por que tiene materias";
            $this->dispatch('mensaje_eliminar_plantilla',$mensaje);
        }
    }

    public function render()
    {

        $plantillas = Plantilla::paginate($this->n_pagina);
        return view('livewire.gestionar-plantillas',compact('plantillas'));
    }
}
