<?php

namespace App\Livewire;

use App\Livewire\Forms\AreaForm;
use App\Livewire\Forms\CarreraForm;
use App\Models\Area;
use App\Models\Carrera;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarCarreras extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public AreaForm $areaform;
    public CarreraForm $carreraform;
    public $sarea;
    public $titulo_area = 'Crear';
    public $titulo_carrera = 'Crear';
    public $n_pagina = 5;

    public function consultar_area(Area $area){
        $this->sarea = $area;
        $this->carreraform->reset();
    }

    public function modal_carrera(Carrera $carrera = null)
    {
        $this->carreraform->reset();
            $this->titulo_carrera = isset($carrera->id) ? 'Editar' : 'Crear';
        if ( isset($carrera->id)) {$this->carreraform->set($carrera);}
    }

    public function eliminar_carrera(Carrera $carrera){$carrera->delete();}

    public function save_carrera()
    {
        if (isset($this->carreraform->area->id)) {$this->areaform->update();}
        else 
        {
            $this->carreraform->area_id = $this->sarea->id;
            $this->carreraform->store();
        }
        $this->carreraform->reset();
        $this->reset('titulo_carrera');
    }

    public function modal_area(Area $area = null)
    {
        $this->areaform->reset();
            $this->titulo_area = isset($area->id) ? 'Editar' : 'Crear';
        if ( isset($area->id)) {$this->areaform->set($area);}
    }

    public function save_area()
    {
        if (isset($this->areaform->area->id)) {$this->areaform->update();}
        else {$this->areaform->store();}
        $this->dispatch('cerrar_modal_area');
    }

    public function eliminar_area(Area $area){
        if ($area->carreras->count() == 0) {$area->delete();}
        else {
            $mensaje = "No se puede eliminar esta area por que tiene carreras";
            $this->dispatch('mensaje_eliminar_area',$mensaje);
        }
    }

    public function render()
    {

        $areas = Area::paginate($this->n_pagina);
        return view('livewire.gestionar-carreras',compact('areas'));
    }
}
