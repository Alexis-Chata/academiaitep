<?php

namespace App\Livewire;

use App\Livewire\Forms\UsuariosForm;
use App\Models\Configuracion;
use App\Models\F_tipo_documento;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class GestionarUsuarios extends Component
{

    use WithPagination;
    use WithFileUploads;
    public $configuracion;
    protected $paginationTheme = 'bootstrap';
    public UsuariosForm $usuariosform;
    public $search = '';
    public $salmacen;
    public $titlemodal = 'Añadir';
    public $pagina = 5;
    public $imagen_perfil;
    public $iteration = 1;
    public $roles2 = [];


    public function mount(){  $this->configuracion = Configuracion::find(1); }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function modal(User $user = null)
    {
        $this->reset('titlemodal','imagen_perfil','roles2');
        $this->iteration++;
        $this->usuariosform->reset();
        if ($user->id == true) {
            $this->titlemodal = 'Editar';$this->usuariosform->set($user);
            foreach ($user->roles as $role) {
                array_push($this->roles2,$role->name);
            }
        }
    }

    public function guardar()
    {
        if (isset($this->usuariosform->user->id)) {$this->usuariosform->roles = $this->roles2; ;$this->usuariosform->update($this->imagen_perfil);}
        else {$this->usuariosform->roles = $this->roles2;$this->usuariosform->store($this->imagen_perfil);}
        $this->dispatch('cerrar_modal_user');
    }

    public function cambiar_estado_suspension(User $user){
        $this->usuariosform->reset();
        $this->usuariosform->set($user);
        $this->usuariosform->suspender();
        $this->updatedSearch();
    }

    public function render()
    {
        $usuarios = User::where(function($query) {
            $query->Where(DB::raw("CONCAT(`name`,' ',`ap_paterno`,' ',`ap_materno`)"), 'like', '%' . $this->search.'%');
        })->paginate($this->pagina);

        $roles = Role::all();
        $tipo_documentos = F_tipo_documento::all();
        return view('livewire.gestionar-usuarios', compact('usuarios','roles','tipo_documentos'));
    }
}
