<div class="container">
    <h1 class="mb-4">Gestión de Tipos de Afectaciones</h1>
    
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

    @if ($tipoAfectaciones->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Letra</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipoAfectaciones as $tipoAfectacion)
                        <tr>
                            <td>{{ $tipoAfectacion->id }}</td>
                            <td>{{ $tipoAfectacion->descripcion }}</td>
                            <td>{{ $tipoAfectacion->letra }}</td>
                            <td>{{ $tipoAfectacion->codigo }}</td>
                            <td>{{ $tipoAfectacion->nombre }}</td>
                            <td>{{ $tipoAfectacion->tipo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $tipoAfectaciones->links() }}
        </div>
    @else
        <p>No hay tipos de afectaciones registrados.</p>
    @endif
</div>