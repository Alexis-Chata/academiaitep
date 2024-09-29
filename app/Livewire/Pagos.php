<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Pagos extends Component
{
    public UserForm $userform;

    public function mount()
    {
        // $this->userform->name = "Arthur Juan";
        // $this->userform->ap_paterno = "Buitron";
        // $this->userform->ap_materno = "Navarro";
        // $this->userform->f_tipo_documento_id = "DNI";
        // $this->userform->nro_documento = "12345678";
        // $this->userform->direccion = "Mz C Lt 14 - Chorrillos";
        // $this->userform->email = "estudiante1@gmail.com";
        // $this->userform->celular1 = "934 665 704";
        // $this->userform->celular2 = "987 985 987";
    }

    #[On('user-save')]
    public function save_user()
    {
        $this->userform->store();
    }

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
            $this->selectResult($this->results[$this->selectedIndex]->name);
        }
    }

    public function selectResult(User $user)
    {
        $this->search = $user->name;
        $this->results = []; // Limpiar los resultados
        $this->userform->set($user);
    }
    public function render()
    {
        return view('livewire.pagos');
    }
}
