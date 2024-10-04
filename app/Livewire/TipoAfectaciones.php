<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_tipo_afectacion;
use Livewire\WithPagination;

class TipoAfectaciones extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina = 10;

    public function render()
    {
        $tipoAfectaciones = F_tipo_afectacion::paginate($this->n_pagina);
        return view('livewire.tipo-afectaciones', compact('tipoAfectaciones'));
    }
}