<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar modalidad-->
            @can('admin.modalidad.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_modalidad" wire:click="modal_modalidad">
                <i class="fas fa-plus-circle"></i> Crear Modalidad
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
            @if ($modalidads->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($modalidads->sortBy('name') as $key => $modalidad)
                            <tr>
                                <td>{{$modalidad->name}}</td>
                                <td>
                                    @can('admin.modalidad.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_modalidad" wire:click="modal_modalidad({{$modalidad->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.modalidad.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-modalidad-{{$modalidad->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_modalidad({{$modalidad->id}})' wire:click="eliminar_modalidad({{$modalidad->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay modalidads</div>
            @endif
        </div>
        <div class="col-12">
                {{$modalidads->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_modalidad', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.modalidads.part.modalidad_modal')
</div>