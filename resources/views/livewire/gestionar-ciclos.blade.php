<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar ciclo-->
            @can('admin.ciclo.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_ciclo" wire:click="modal_ciclo">
                <i class="fas fa-plus-circle"></i> Crear Ciclo
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
            @if ($ciclos->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($ciclos->sortBy('name') as $key => $ciclo)
                            <tr>
                                <td>{{$ciclo->name}}</td>
                                <td>
                                    @can('admin.ciclo.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_ciclo" wire:click="modal_ciclo({{$ciclo->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.ciclo.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-ciclo-{{$ciclo->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_ciclo({{$ciclo->id}})' wire:click="eliminar_ciclo({{$ciclo->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay ciclos</div>
            @endif
        </div>
        <div class="col-12">
                {{$ciclos->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_ciclo', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.ciclos.part.ciclo_modal')
</div>