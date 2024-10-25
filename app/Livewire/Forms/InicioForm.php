<?php

namespace App\Livewire\Forms;

use App\Models\Inicio;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class InicioForm extends Form
{
    public ?Inicio $inicio;

    #[Rule('required')]
    public $name;
    public $id_category_moodle = NULL;
    public $id_anio;
    public $estado = true;


    public function set(Inicio $inicio)
    {
        $this->inicio = $inicio;
        $this->name = $inicio->name;
        $this->id_category_moodle = $inicio->id_category_moodle;
        $this->id_anio = $inicio->id_anio;
        $this->estado = $inicio->estado;
    }

    public function update(){
        $this->validate();
        $this->inicio->update($this->all());
    }

    public function store()
    {
        #validar inicio
        $this->validate();
        DB::beginTransaction();
        try {
            #crear inicio
            $n_inicio = Inicio::create($this->all());
            #crear inicio en moodle
            $n_catagoria = new CategoriaMoodle();
            $id_categoria = $n_catagoria->crear_categoria($n_inicio->name,$n_inicio->anio->id_categoria_moodle);
            #actualziar el id del incicio categoria
            $n_inicio->id_moodle_user =  $id_categoria ?? null;
            $n_inicio->save();
            DB::commit();
        }
        catch (\Exception $e)
        {
             # Si hay algún error, revertir los cambios en la base de datos
             DB::rollBack();

             # Eliminar el usuario creado si existe
             if (isset($n_inicio)) {$n_inicio->delete();}

             # Lanzar una nueva excepción para mostrar el mensaje de error
             throw new \Exception('Error al crear la categoría: ' . $e->getMessage());
        }
    }
}
