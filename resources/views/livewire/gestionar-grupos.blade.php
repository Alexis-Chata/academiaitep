<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar grupo-->
            @can('admin.grupo.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_grupo" wire:click="modal_grupo">
                <i class="fas fa-plus-circle"></i> Crear Grupo
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
            @if ($grupos->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Aula</th>
                        <th>Turno</th>
                        <th>Ciclo</th>
                        <th>Modalidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($grupos->sortBy('name') as $key => $grupo)
                            <tr>
                                <td>{{$grupo->name}}</td>
                                <td>@if (isset($grupo->aula)) {{$grupo->aula->name}}@endif</td>
                                <td>@if (isset($grupo->turno)) {{$grupo->turno->name}}@endif</td>
                                <td>@if (isset($grupo->ciclo)) {{$grupo->ciclo->name}}@endif</td>
                                <td>@if (isset($grupo->modalidad)) {{$grupo->modalidad->name}}@endif</td>
                                <td>{{$grupo->estado}}</td>
                                <td>
                                    @can('admin.grupo.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_grupo" wire:click="modal_grupo({{$grupo->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.grupo.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-grupo-{{$grupo->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_grupo({{$grupo->id}})' wire:click="eliminar_grupo({{$grupo->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay grupos</div>
            @endif
        </div>
        <div class="col-12">
                {{$grupos->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_grupo', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.grupos.part.grupo_modal')
</div>