<div class="container">
    <h1 class="mb-4">Gestión de Tipos de Documentos</h1>
    
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

    @if ($tipoDocumentos->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoDocumentos as $tipoDocumento)
                        <tr>
                            <td>{{ $tipoDocumento->id }}</td>
                            <td>{{ $tipoDocumento->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $tipoDocumentos->links() }}
        </div>
    @else
        <p>No hay tipos de documentos registrados.</p>
    @endif
</div>