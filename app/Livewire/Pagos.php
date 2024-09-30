<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Livewire\Component;

class Pagos extends Component
{
    public UserForm $userform;
    public $readonly_datos = 'readonly';
    public $disabled_datos = 'disabled';
    public $d_none_datos = '';
    public $inline_block_datos = '';

    public $search = ''; // Para almacenar el valor de búsqueda
    public $results = []; // Para almacenar los resultados filtrados
    public $selectedIndex = -1; // Índice del resultado seleccionado

    // Este método se ejecuta cada vez que el campo de búsqueda cambia
    public function updatedSearch()
    {
        $this->selectedIndex = -1; // Reiniciar la selección cuando la búsqueda cambia

        if (!empty($this->search)) {
            $this->results = User::when($this->search, function ($q) {
                $q->where('name', 'like', '%%' . $this->search . '%%');
            })->when($this->search, function ($q) {
                $q->orWhere('ap_paterno', 'like', '%%' . $this->search . '%%');
            })->when($this->search, function ($q) {
                $q->orWhere('ap_materno', 'like', '%%' . $this->search . '%%');
            })->when($this->search, function ($q) {
                $q->orWhere('nro_documento', 'like', '%%' . $this->search . '%%');
            })->when($this->search, function ($q) {
                $q->orWhereFullText(["name", "ap_paterno", "ap_materno", "nro_documento"], $this->search);
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
    }

    public function btnAgregar()
    {
        $this->refreshComponent();
        $this->readonly_datos = '';
        $this->disabled_datos = '';
        $this->d_none_datos = 'd-none';
        $this->inline_block_datos = 'd-inline-block';
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
        $this->reset(array_keys(Arr::except($this->all(), ['userform'])));
    }

    #[On('user-save')]
    public function save_user()
    {
        $this->userform->store();
    }

    public function render()
    {
        return view('livewire.pagos');
    }
}
