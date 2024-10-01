<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Apoderado;
use App\Models\Tapoderado;

class Pagos extends Component
{
    use WithFileUploads; // UpLoad Perfil & DNI

    public $apoderados = [];
    public UserForm $userform;
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

    // ... otros métodos

    public function editApoderado($id)
    {
        $this->editingApoderadoId = $id;
        $this->editingApoderado = Apoderado::find($id)->toArray();
    }

    public function cancelEdit()
    {
        $this->editingApoderadoId = null;
        $this->editingApoderado = null;
    }

    public function updateApoderado()
    {
        $this->validate([
            "editingApoderado.name" => "required",
            "editingApoderado.ap_paterno" => "required",
            "editingApoderado.ap_materno" => "required",
            "editingApoderado.celular1" => "required",
            "editingApoderado.nro_documento" => "required",
            "editingApoderado.direccion" => "required",
            "editingApoderado.tapoderado_id" => "required",
        ]);

        $apoderado = Apoderado::find($this->editingApoderadoId);
        $apoderado->update($this->editingApoderado);

        $this->editingApoderadoId = null;
        $this->editingApoderado = null;
        $this->loadApoderados($this->userform);
    }

    public function deleteApoderado($id)
    {
        $apoderado = Apoderado::findOrFail($id);
        $apoderado->delete();
        $this->loadApoderados($this->userform);
    }

    public function addApoderado()
    {
        $this->editingApoderadoId = "new";
        $this->editingApoderado = [
            "name" => "",
            "ap_paterno" => "",
            "ap_materno" => "",
            "celular1" => "",
            "nro_documento" => "",
            "direccion" => "",
            "tapoderado_id" => "",
        ];
    }

    public function saveNewApoderado()
    {
        $this->validate([
            "editingApoderado.name" => "required",
            "editingApoderado.ap_paterno" => "required",
            "editingApoderado.ap_materno" => "required",
            "editingApoderado.celular1" => "required",
            "editingApoderado.nro_documento" => "required",
            "editingApoderado.direccion" => "required",
            "editingApoderado.tapoderado_id" => "required",
        ]);

        $apoderado = Apoderado::create($this->editingApoderado);
        $this->userform
            ->apoderados()
            ->attach($apoderado->id, [
                "tapoderado_id" => $this->editingApoderado["tapoderado_id"],
            ]);

        $this->editingApoderadoId = null;
        $this->editingApoderado = null;
        $this->loadApoderados($this->userform);
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
        $this->search = $user->name;
        $this->results = []; // Limpiar los resultados
        $this->userform->set($user);

        // Cargar las imágenes actuales del usuario
        $this->perfilUrl = $this->userform->profile_photo_path;
        $this->dniUrl = $this->userform->dni_path;

        // Cargar los apoderados del usuario
        $this->loadApoderados($user);
    }

    public function loadApoderados(User $user)
    {
        $this->apoderados = $user
            ->apoderados()
            ->with("tipoApoderado")
            ->get()
            ->map(function ($apoderado) {
                return [
                    "id" => $apoderado->id,
                    "name" =>
                        $apoderado->name .
                        " " .
                        $apoderado->ap_paterno .
                        " " .
                        $apoderado->ap_materno,
                    "celular" => $apoderado->celular1,
                    "tipo" => $apoderado->tipoApoderado
                        ? $apoderado->tipoApoderado->name
                        : "No especificado",
                    "dni" => $apoderado->nro_documento,
                    "direccion" => $apoderado->direccion,
                ];
            })
            ->toArray();
    }

    public function btnAgregar()
    {
        $this->refreshComponent();
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
        $this->save_user();
        $this->refreshComponent();
    }

    public function refreshComponent()
    {
        $this->userform->reset();
        $this->reset(array_keys(Arr::except($this->all(), ["userform"])));
    }

    #[On("user-save")]
    public function save_user()
    {
        $this->userform->store();
    }

    public function render()
    {
        return view("livewire.pagos");
    }
}
