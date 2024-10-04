<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mt-5">Series</h2>
    <button wire:click="createSerie" class="btn btn-primary mb-3">Crear Nueva Serie</button>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tipo Comprobante</th>
                    <th>Serie</th>
                    <th>Correlativo</th>
                    <th>Sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->tipo_comprobante->descripcion ?? 'N/A' }}</td>
                        <td>{{ $serie->serie }}</td>
                        <td>{{ $serie->correlativo }}</td>
                        <td>{{ $serie->sede->nombre ?? 'N/A' }}</td>
                        <td>
                            <button wire:click="editSerie({{ $serie->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="deleteSerie({{ $serie->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $series->links() }}

    @if($isOpenSerie)
        @include('livewire.serie-form')
    @endif
</div>