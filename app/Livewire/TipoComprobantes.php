<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\F_tipo_comprobante;
use Livewire\WithPagination;

class TipoComprobantes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $n_pagina = 10;

    public function render()
    {
        $tipoComprobantes = F_tipo_comprobante::where('estado_pos', true)->paginate($this->n_pagina);
        return view('livewire.tipo-comprobantes', compact('tipoComprobantes'));
    }
}
