<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar inicio-->
            @can('admin.inicio.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_inicio" wire:click="modal_inicio">
                <i class="fas fa-plus-circle"></i> Crear Inicio
            </button>
            @endcan
        </div>
        <div class="col-auto mb-4">
            <select class="form-select" wire:model.live="n_pagina">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="10000000">Todo</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($inicios->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($inicios->sortBy('name') as $key => $inicio)
                            <tr>
                                <td>{{$inicio->name}}</td>
                                <td>
                                    @can('admin.inicio.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_inicio" wire:click="modal_inicio({{$inicio->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.inicio.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-inicio-{{$inicio->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_inicio({{$inicio->id}})' wire:click="eliminar_inicio({{$inicio->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay inicios</div>
            @endif
        </div>
        <div class="col-12">
                {{$inicios->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_inicio', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.inicios.part.inicio_modal')
</div>
