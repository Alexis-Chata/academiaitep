<?php

namespace App\Livewire;

use App\Livewire\Forms\ApoderadoForm;
use App\Livewire\Forms\DtoComprobantePago;
use App\Livewire\Forms\UserApoderadoForm;
use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Apoderado;
use App\Models\Cgrupo;
use App\Models\Cuenta;
use App\Models\F_sede;
use App\Models\Carrera;
use App\Models\Grupo;
use App\Models\F_serie;
use App\Models\F_tipo_documento;
use App\Models\MetodoPago;
use App\Models\Tapoderado;
use App\Models\User_apoderado;
use App\Models\Modalidad;
use Carbon\Carbon;
use Livewire\Attributes\On;
use App\Models\Matricula;
use Illuminate\Support\Facades\Validator;

class Pagos extends Component
{
    use WithFileUploads; // UpLoad Perfil & DNI

    public $nro_operacion;
    public $file_vaucher;
    public $tipoCuentaVirtual;
    public $conceptoName;
    public $montoTotalConcepto;
    public $comprobanteDetalles;
    public $disabledAddConcepto;
    public $slctMetodoPago;
    public $metodoPagos;
    public $slctCuenta;
    public $fecha_minima;
    public $fecha_emision;
    public $slctSerie;
    public $montoCobro;
    public $cgrupo_id;
    public $series;
    public $cuentas;
    public $cgrupos;
    public $user_apoderados;
    public $tipo_apoderados;
    public $tipo_documentos;
    public UserForm $userform;
    public ApoderadoForm $apoderadoform;
    public UserApoderadoForm $user_apoderadoform;
    public DtoComprobantePago $dto_comprobante_pagoform;
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

    public $selectedMatriculaId = null;

    public function selectMatricula($matriculaId)
    {
        $this->matricula = Matricula::find($matriculaId);
        $this->editingMatricula = false;
        $this->selectedMatriculaId = $matriculaId;
    }

    public function newMatricula()
    {
        $this->selectedMatriculaId = null;
        $this->editingMatricula = false;
        $this->resetMatriculaFields();
    }

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
            Validator::make(
                ['user_para_crear_apoderado' => optional($this->userform)->user],
                ['user_para_crear_apoderado' => 'required'],
                ['required' => "Por favor, seleccione un usuario primero."],
            )->validate();
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
        $this->apoderadoform->f_tipo_documento_id = $this->tipo_documentos->first()->id;
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
        if (!isset($this->userform->user)) {
            // Mostrar un mensaje de error si no hay usuario seleccionado
            session()->flash(
                "error",
                "Por favor, seleccione un usuario primero."
            );
            return;
        }
        //dd(isset($this->userform->user->id), $this->userform);
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
                    if (env('DB_CONNECTION') != "sqlite") {
                        $q->orWhereFullText(
                            ["name", "ap_paterno", "ap_materno", "nro_documento"],
                            $this->search
                        );
                    }
                })
                ->take(8)
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
        $this->cancelEdit();
        $this->editingApoderadoId = null;
        $this->search = $user->name;
        $this->results = []; // Limpiar los resultados
        $this->userform->set($user);
        $this->user_apoderados = $this->userform->user->user_apoderados;

        // Cargar las imágenes actuales del usuario
        $this->perfilUrl = $this->userform->profile_photo_path;
        $this->dniUrl = $this->userform->dni_path;
        //dd($this->userform);
        if ($this->userform->user->matriculas->last()) {
            $this->selectMatricula($this->userform->user->matriculas->last()->id);
        }
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
        $this->cancelEdit();
    }

    public function refreshComponent()
    {
        $this->userform->reset();
        $this->userform->f_tipo_documento_id = $this->tipo_documentos->first()->id;
        $this->reset(['apoderadoform', 'user_apoderadoform', 'readonly_datos', 'disabled_datos', 'd_none_datos', 'inline_block_datos', 'perfilUrl', 'dniUrl', 'newPerfilImage', 'newDniImage', 'editingApoderadoId', 'editingApoderado', 'editandoUser', 'agregandoUser']);
    }

    public function updatedSlctSerie()
    {
        $fecha = optional($this->series->find($this->slctSerie))->fecha_emision;
        $date1 = Carbon::parse(now()->subDays(3));
        $date2 = Carbon::parse($fecha);
        $this->fecha_minima = $date1->max($date2)->toDateString();
    }
    public function updatedSlctCuenta()
    {
        $cuenta = optional($this->cuentas->find($this->slctCuenta))->tipo_cuenta;
        $this->metodoPagos = collect();
        $this->slctMetodoPago = null;
        $this->tipoCuentaVirtual = null;
        if ($cuenta) {
            $this->metodoPagos = MetodoPago::where('tipo', $cuenta)->get();
        }
        if ($cuenta == "Virtual") {
            $this->tipoCuentaVirtual = "Virtual";
        }
    }

    public function addConceptoCobro()
    {
        $this->validate([
            'montoCobro' => 'required|numeric|min:1',
            'montoTotalConcepto' => 'required|numeric|min:1',
        ], [
            'required' => 'Requerido',
            'numeric' => 'debe ser numerico',
            'min' => 'minimo 1.00',
        ]);

        $this->comprobanteDetalles->push((object)[
            'codigo' => $this->cgrupo_id,
            'concepto' => $this->conceptoName,
            'importeConceptoCosto' => $this->montoTotalConcepto,
            'importeConceptoPendiente' => $this->montoTotalConcepto - $this->montoCobro,
            'importeConceptoPagar' => $this->montoCobro,
        ]);
        $this->query = null;
        $this->cgrupo_id = null;
        $this->select_Item();
    }

    public function removeConceptoCobro($codigo)
    {
        $this->comprobanteDetalles = $this->comprobanteDetalles->reject(function ($item) use ($codigo) {
            return $item->codigo == $codigo;
        });
    }

    public function saveComprobantePago()
    {
        $this->dto_comprobante_pagoform->doc_serie_id = $this->slctSerie;
        $this->dto_comprobante_pagoform->fechaEmision = $this->fecha_emision;
        $this->dto_comprobante_pagoform->cuenta_id = $this->slctCuenta;
        $this->dto_comprobante_pagoform->metodo_pago_cuenta = $this->slctMetodoPago;
        $this->dto_comprobante_pagoform->user_id = optional($this->userform)->user ? ($this->userform)->user->id : null;
        $this->dto_comprobante_pagoform->data_comprobante_detalles = $this->comprobanteDetalles;
        $this->dto_comprobante_pagoform->store();
        $this->updatedSlctSerie();
        $this->comprobanteDetalles = collect();
    }

    public function mount()
    {
        $this->user_apoderados = collect();
        $this->metodoPagos = collect();
        $this->disabledAddConcepto = "disabled";
        $this->comprobanteDetalles = collect();
        $this->fecha_emision = now()->format('Y-m-d');
        $this->fecha_minima = now()->format('Y-m-d');
        $this->matricula = new Matricula();
    }

    public $selectedAnio;
    public $selectedCiclo;
    public $selectedTurno;
    public $selectedModalidad;
    public $selectedAula;
    public $selectedSede;
    public $selectedCarrera;
    public $selectedGrupo;
    public $selectedEstado;

    #[On('itemSelected')]
    public function handleItemSelected($model, $id, $name)
    {
        // Aquí manejamos la selección de items para cada campo de la matrícula
        switch ($model) {
            case 'anio':
                $this->selectedAnio = $name;
                break;
            case 'Ciclo':
                $this->selectedCiclo = $name;
                break;
            case 'Turno':
                $this->selectedTurno = $name;
                break;
            case 'Modalidad':
                $this->selectedModalidad = $name;
                break;
            case 'Aula':
                $this->selectedAula = $name;
                break;
            case 'F_sede':
                $this->selectedSede = $name;
                break;
            case 'Carrera':
                $this->selectedCarrera = $id;
                break;
            case 'Grupo':
                $this->selectedGrupo = $id;
                break;
        }
    }

    public $query = '';
    public $dataresults = [];

    public function updatedQuery()
    {
        $string = trim($this->query);
        $string = str_replace([',', '.'], '', $string);
        $string = preg_replace('/\s+/', ' ', $string);
        $queries = explode(' ', $string);

        $resultados = Cgrupo::query();
        foreach ($queries as $query) {
            if (!empty($query)) {
                $resultados->where('concepto_cobro_name', 'LIKE', '%' . $query . '%');
            }
        }

        $resultados = $resultados->take(5)->get()->toArray();
        if (isset($this->userform->user) and $this->userform->user->deuda_pendiente > 0) {
            $resultados = ["pendiente" => [
                "id" => "p-1",
                "costo" => $this->userform->user->deuda_pendiente,
                "concepto_cobro_name" => "Saldo Pendiente - " . $this->userform->user->deuda_pendiente,
            ]] + $resultados;
        }

        $this->dataresults = array_values($resultados);
    }

    public function select_Item($cgrupo_id = null)
    {
        $cgrupo = Cgrupo::find($cgrupo_id);
        $this->dataresults = [];
        $this->montoCobro = 0;
        $this->montoTotalConcepto = 0;
        $this->disabledAddConcepto = "disabled";
        $this->conceptoName = null;
        $this->cgrupo_id = null;
        if ($cgrupo) {
            $this->query = $cgrupo->concepto_cobro_name;
            $this->cgrupo_id = $cgrupo->id;
            $this->montoCobro = $cgrupo->costo;
            $this->montoTotalConcepto = $this->montoCobro;
            $this->disabledAddConcepto = null;
            $this->conceptoName = ucfirst($cgrupo->concepto_cobro_name);
        }
        if ($cgrupo_id == "p-1" and isset($this->userform->user)) {
            $this->query = "Saldo Pendiente - " . $this->userform->user->deuda_pendiente;
            $this->cgrupo_id = "p-1";
            $this->montoCobro = $this->userform->user->deuda_pendiente;
            $this->montoTotalConcepto = $this->userform->user->deuda_pendiente;
            $this->disabledAddConcepto = null;
            $this->conceptoName = ucfirst($this->query);
        }
    }

    public function render()
    {
        $this->tipo_apoderados = Tapoderado::all();
        $this->tipo_documentos = F_tipo_documento::all();
        $this->series = F_serie::all();
        $this->cuentas = Cuenta::all();
        $this->cgrupos = Cgrupo::with('turno', 'ciclo', 'modalidad')->get();
        return view("livewire.pagos");
    }

    public $matricula;
    public $editingMatricula = false;

    public function createMatricula()
    {
        //dd('Entrando en createMatricula', $this->all());
        $this->validate([
            //'selectedAnio' => 'required',
            'selectedCiclo' => 'required',
            'selectedTurno' => 'required',
            'selectedModalidad' => 'required',
            'selectedAula' => 'required',
            'selectedSede' => 'required',
            'selectedCarrera' => 'required',
            'selectedGrupo' => 'required',
        ]);
        //dd('Pasó la validación');

        $this->matricula->user_id = $this->userform->user->id;
        $this->matricula->anio = $this->selectedAnio;
        $this->matricula->ciclo = $this->selectedCiclo;
        $this->matricula->turno = $this->selectedTurno;
        $this->matricula->modalidad = $this->selectedModalidad;
        $this->matricula->aula = $this->selectedAula;
        $this->matricula->sede = $this->selectedSede;
        $this->matricula->carrera_id = $this->selectedCarrera;
        $this->matricula->grupo_id = $this->selectedGrupo;
        $this->matricula->estado = 1; // Activo por defecto
        $this->matricula->fvencimiento = now()->addYear(); // Ejemplo: vence en un año

        try {
            $this->matricula->save();
            session()->flash('message', 'Matrícula creada con éxito.');
        } catch (\Exception $e) {
            dd('Error al guardar:', $e->getMessage());
        }

        $this->resetMatriculaFields();
        session()->flash('message', 'Matrícula creada con éxito.');
    }

    public function editMatricula(Matricula $matricula)
    {
        //dd('Entrando en createMatricula', $this->all());
        $this->matricula = $matricula;
        $this->selectedAnio = $matricula->anio;
        $this->selectedCiclo = $matricula->ciclo;
        $this->selectedTurno = $matricula->turno;
        $this->selectedModalidad = $matricula->modalidad;
        $this->selectedAula = $matricula->aula;
        $this->selectedSede = $matricula->sede;
        $this->selectedCarrera = $matricula->carrera->name;
        $this->selectedGrupo = $matricula->grupo->name;
        $this->fvencimiento = $matricula->fvencimiento;
        $this->editingMatricula = true;
    }

    public $fvencimiento;

    public function updateMatricula()
    {
        $this->validate([
            'selectedAnio' => 'required',
            'selectedCiclo' => 'required',
            'selectedTurno' => 'required',
            'selectedModalidad' => 'required',
            'selectedAula' => 'required',
            'selectedSede' => 'required',
            'selectedCarrera' => 'required',
            'selectedGrupo' => 'required',
            'fvencimiento' => 'required',
        ]);

        $this->matricula->anio = $this->selectedAnio;
        $this->matricula->ciclo = $this->selectedCiclo;
        $this->matricula->turno = $this->selectedTurno;
        $this->matricula->modalidad = $this->selectedModalidad;
        $this->matricula->aula = $this->selectedAula;
        $this->matricula->sede = $this->selectedSede;
        $this->matricula->carrera_id = Carrera::where('name', $this->selectedCarrera)->first()->id;
        $this->matricula->grupo_id = Grupo::where('name', $this->selectedGrupo)->first()->id;
        $this->matricula->fvencimiento = $this->fvencimiento;

        $this->matricula->save();

        $this->resetMatriculaFields();
        $this->editingMatricula = false;
        session()->flash('message', 'Matrícula actualizada con éxito.');
    }

    public function deleteMatricula(Matricula $matricula)
    {
        $matricula->delete();
        session()->flash('message', 'Matrícula eliminada con éxito.');
    }

    public function resetMatriculaFields()
    {
        $this->editingMatricula = false;
    }
}
