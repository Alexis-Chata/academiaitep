<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar turno-->
            @can('admin.turno.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_turno" wire:click="modal_turno">
                <i class="fas fa-plus-circle"></i> Crear Turno
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
            @if ($turnos->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($turnos->sortBy('name') as $key => $turno)
                            <tr>
                                <td>{{$turno->name}}</td>
                                <td>
                                    @can('admin.turno.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_turno" wire:click="modal_turno({{$turno->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.turno.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-turno-{{$turno->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_turno({{$turno->id}})' wire:click="eliminar_turno({{$turno->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay turnos</div>
            @endif
        </div>
        <div class="col-12">
                {{$turnos->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_turno', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.turnos.part.turno_modal')
</div>
