<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_tipo_documento;
use Livewire\WithPagination;

class TipoDocumentos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina = 10;

    public function render()
    {
        $tipoDocumentos = F_tipo_documento::paginate($this->n_pagina);
        return view('livewire.tipo-documentos', compact('tipoDocumentos'));
    }
}