<?php

namespace App\Livewire;

use App\Livewire\Forms\ApoderadoForm;
use App\Livewire\Forms\UserApoderadoForm;
use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Apoderado;
use App\Models\Cuenta;
use App\Models\F_serie;
use App\Models\F_tipo_documento;
use App\Models\Grupo;
use App\Models\MetodoPago;
use App\Models\Tapoderado;
use App\Models\User_apoderado;

class Pagos extends Component
{
    use WithFileUploads; // UpLoad Perfil & DNI

    public $slctMetodoPago;
    public $metodoPagos;
    public $slctCuenta;
    public $montoCobro;
    public $slctConceptoCobro;
    public $series;
    public $cuentas;
    public $grupos;
    public $user_apoderados;
    public $tipo_apoderados;
    public $tipo_documentos;
    public UserForm $userform;
    public ApoderadoForm $apoderadoform;
    public UserApoderadoForm $user_apoderadoform;
    public $readonly_datos = "readonly";
    public $disabled_datos = "disabled";
    public $d_none_datos = "";
    public $inline_block_datos = "";

    public $search = ""; // Para almacenar el valor de búsqueda
    public $results = []; // Para almacenar los resultados filtrados
    public $selectedIndex = -1; // Índice del resultado seleccionado

    /* UpLoad Perfil & DNI */
    public $perfilUrl = "https://icones.pro/wp-content/uploads/2021/03/avatar-de-personne-icone-homme.png";
    public $dniUrl = "https://cdn.www.gob.pe/uploads/medium/archive/000/010/331/dni-digito-verificador.png";
    public $newPerfilImage;
    public $newDniImage;

    public $editingApoderadoId = null;
    public $editingApoderado = null;
    public $editandoUser = null;
    public $agregandoUser = 'agregandoUser';

    // ... otros métodos

    public function editApoderado(Apoderado $apoderado, User_apoderado $user_apoderado_id)
    {
        $this->editingApoderadoId = $apoderado->id;
        $this->user_apoderadoform->set($user_apoderado_id);
        $this->apoderadoform->set($apoderado);
    }

    public function cancelEdit()
    {
        $this->editingApoderadoId = null;
        $this->editingApoderado = null;
        $this->reset(['editandoUser', 'agregandoUser', 'readonly_datos', 'disabled_datos', 'd_none_datos', 'inline_block_datos']);
        $this->resetValidation();
    }

    public function updateApoderado()
    {
        if ($this->editingApoderadoId === 'new') {
            $this->apoderadoform->store();
            $this->user_apoderadoform->apoderado_id = $this->apoderadoform->apoderado->id;
            $this->user_apoderadoform->user_id = $this->userform->user->id;
            $this->user_apoderadoform->store();
        } else {
            $this->apoderadoform->update();
            $this->user_apoderadoform->update();
        }

        $this->editingApoderadoId = null;
        $this->user_apoderados = $this->userform->user->user_apoderados;
        session()->flash('message', 'Apoderado guardado correctamente.');
    }

    public function deleteApoderado(User_apoderado $user_apoderado_id)
    {
        $this->user_apoderadoform->set($user_apoderado_id);
        $this->user_apoderadoform->delete();
        $this->user_apoderados = $this->userform->user->user_apoderados;
    }

    public function addApoderado()
    {
        $this->editingApoderadoId = 'new';
        $this->apoderadoform->reset();
        $this->user_apoderadoform->reset();
    }

    public function updatedNewPerfilImage()
    {
        // Al actualizarse la imagen seleccionada para el perfil, mostrar la imagen subida temporalmente
        $this->perfilUrl = $this->newPerfilImage->temporaryUrl();
    }
    public function updatedNewDniImage()
    {
        // Al actualizarse la imagen seleccionada para el DNI, mostrar la imagen subida temporalmente
        $this->dniUrl = $this->newDniImage->temporaryUrl();
    }
    public function saveImage($type)
    {
        if (!$this->userform->user) {
            // Mostrar un mensaje de error si no hay usuario seleccionado
            session()->flash(
                "error",
                "Por favor, seleccione un usuario primero."
            );
            return;
        }

        if ($type === "perfil" && $this->newPerfilImage) {
            $path = $this->newPerfilImage->store("profiles", "public");
            $this->userform->user->profile_photo_path = Storage::url($path);
            $this->userform->user->save();
            $this->perfilUrl = $this->userform->user->profile_photo_path;
            $this->newPerfilImage = null;
        }

        if ($type === "dni" && $this->newDniImage) {
            $path = $this->newDniImage->store("dni", "public");
            $this->userform->user->dni_path = Storage::url($path);
            $this->userform->user->save();
            $this->dniUrl = $this->userform->user->dni_path;
            $this->newDniImage = null;
        }

        session()->flash("message", "Imagen guardada con éxito.");
    }

    public function cancelImage($type)
    {
        if ($type === "perfil") {
            $this->perfilUrl =
                $this->userform->user->profile_photo_path ??
                "https://icones.pro/wp-content/uploads/2021/03/avatar-de-personne-icone-homme.png";
            $this->newPerfilImage = null;
        } else {
            $this->dniUrl =
                $this->userform->user->dni_path ??
                "https://cdn.www.gob.pe/uploads/medium/archive/000/010/331/dni-digito-verificador.png";
            $this->newDniImage = null;
        }
    }
    /* END */

    // Este método se ejecuta cada vez que el campo de búsqueda cambia
    public function updatedSearch()
    {
        $this->selectedIndex = -1; // Reiniciar la selección cuando la búsqueda cambia

        if (!empty($this->search)) {
            $this->results = User::when($this->search, function ($q) {
                $q->where("name", "like", "%%" . $this->search . "%%");
            })
                ->when($this->search, function ($q) {
                    $q->orWhere(
                        "ap_paterno",
                        "like",
                        "%%" . $this->search . "%%"
                    );
                })
                ->when($this->search, function ($q) {
                    $q->orWhere(
                        "ap_materno",
                        "like",
                        "%%" . $this->search . "%%"
                    );
                })
                ->when($this->search, function ($q) {
                    $q->orWhere(
                        "nro_documento",
                        "like",
                        "%%" . $this->search . "%%"
                    );
                })
                ->when($this->search, function ($q) {
                    $q->orWhereFullText(
                        ["name", "ap_paterno", "ap_materno", "nro_documento"],
                        $this->search
                    );
                })
                ->take(5)
                ->get();
        } else {
            $this->results = [];
        }
    }

    // Navegar hacia arriba
    public function incrementIndex()
    {
        if ($this->selectedIndex < count($this->results) - 1) {
            $this->selectedIndex++;
        }
    }

    // Navegar hacia abajo
    public function decrementIndex()
    {
        if ($this->selectedIndex > 0) {
            $this->selectedIndex--;
        }
    }

    // Seleccionar el resultado cuando se presiona Enter
    public function selectCurrent()
    {
        if (isset($this->results[$this->selectedIndex])) {
            $this->selectResult($this->results[$this->selectedIndex]);
        }
    }

    public function selectResult(User $user)
    {
        $this->editingApoderadoId = null;
        $this->search = $user->name;
        $this->results = []; // Limpiar los resultados
        $this->userform->set($user);
        $this->user_apoderados = $this->userform->user->user_apoderados;

        // Cargar las imágenes actuales del usuario
        $this->perfilUrl = $this->userform->profile_photo_path;
        $this->dniUrl = $this->userform->dni_path;
        //dd($this->userform);
    }

    public function editUser(User $user)
    {
        $this->editandoUser = $user->id;
        $this->readonly_datos = "";
        $this->disabled_datos = "";
        $this->d_none_datos = "d-none";
        $this->inline_block_datos = "d-inline-block";
        $this->userform->set($user);
    }

    public function btnAgregar()
    {
        $this->refreshComponent();
        $this->user_apoderados = collect();
        $this->agregandoUser = null;
        $this->readonly_datos = "";
        $this->disabled_datos = "";
        $this->d_none_datos = "d-none";
        $this->inline_block_datos = "d-inline-block";
    }

    public function btnCancelar()
    {
        $this->refreshComponent();
    }

    public function btnGuardar()
    {
        $this->userform->store();
    }

    public function refreshComponent()
    {
        $this->userform->reset();
        $this->reset(['apoderadoform', 'user_apoderadoform', 'readonly_datos', 'disabled_datos', 'd_none_datos', 'inline_block_datos', 'perfilUrl', 'dniUrl', 'newPerfilImage', 'newDniImage', 'editingApoderadoId', 'editingApoderado', 'editandoUser', 'agregandoUser']);
    }

    public function updatedSlctCuenta()
    {
        //dd($this->slctCuenta, $this->cuentas->find($this->slctCuenta));
        $cuenta = optional($this->cuentas->find($this->slctCuenta))->tipo_cuenta;
        $this->metodoPagos = collect();
        $this->slctMetodoPago = null;
        if($cuenta){
            $this->metodoPagos =MetodoPago::where('tipo', $cuenta)->get();
        }
    }

    public function updatedSlctConceptoCobro()
    {
        $this->montoCobro = strtolower($this->grupos->find($this->slctConceptoCobro)->costo);
    }

    public function mount()
    {
        $this->tipo_apoderados = Tapoderado::all();
        $this->tipo_documentos = F_tipo_documento::all();
        $this->series = F_serie::all();
        $this->cuentas = Cuenta::all();
        $this->grupos = Grupo::with('cgrupo')->get();
        $this->user_apoderados = collect();
        $this->metodoPagos = collect();
    }

    public function render()
    {
        return view("livewire.pagos");
    }
}
