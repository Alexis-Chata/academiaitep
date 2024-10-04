<div class="container">
    <h1 class="mb-4">Gestión de Tipos de Comprobantes</h1>
    
    <div class="row mb-3">
        <div class="col-auto">
            <select class="form-select" wire:model.live="n_pagina">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    @if ($tipoComprobantes->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Estado POS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoComprobantes as $tipoComprobante)
                        <tr>
                            <td>{{ $tipoComprobante->tipo_comprobante }}</td>
                            <td>{{ $tipoComprobante->descripcion }}</td>
                            <td>
                                @if ($tipoComprobante->estado_pos)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-secondary">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $tipoComprobantes->links() }}
        </div>
    @else
        <p>No hay tipos de comprobantes registrados.</p>
    @endif
</div>