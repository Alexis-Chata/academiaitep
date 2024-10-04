<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2>Sedes</h2>
    <button wire:click="createSede" class="btn btn-primary mb-3">Crear Nueva Sede</button>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Departamento</th>
                    <th>Provincia</th>
                    <th>Distrito</th>
                    <th>Ubigeo</th>
                    <th>Código de Tipo de Dirección</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedes as $sede)
                    <tr>
                        <td>{{ $sede->nombre }}</td>
                        <td>{{ $sede->telefono }}</td>
                        <td>{{ $sede->direccion }}</td>
                        <td>{{ $sede->departamento }}</td>
                        <td>{{ $sede->provincia }}</td>
                        <td>{{ $sede->distrito }}</td>
                        <td>{{ $sede->ubigueo }}</td>
                        <td>{{ $sede->addresstypecode }}</td>
                        <td>{{ $sede->f_empresa_id }}</td>
                        <td>
                            <button wire:click="editSede({{ $sede->id }})" class="btn btn-primary btn-sm">Editar</button>
                            <button wire:click="deleteSede({{ $sede->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sedes->links() }}

    @if($isOpenSede)
        @include('livewire.sede-form')
    @endif
</div>