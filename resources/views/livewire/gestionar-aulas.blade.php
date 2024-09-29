<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar aula-->
            @can('admin.aula.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_aula" wire:click="modal_aula">
                <i class="fas fa-plus-circle"></i> Crear Aula
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
            @if ($aulas->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Shortname</th>
                        <th>Capacidad</th>
                        <th>Tipo de Aula</th>
                        <th>Sede</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($aulas->sortBy('name') as $key => $aula)
                            <tr>
                                <td>{{$aula->name}}</td>
                                <td>{{$aula->shortname}}</td>
                                <td>{{$aula->capacidad}}</td>
                                <td>@if (isset($aula->taula)){{$aula->taula->name}}@endif</td>
                                <td>@if (isset($aula->sede)){{$aula->sede->name}}@endif</td>
                                <td>
                                    @can('admin.aula.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_aula" wire:click="modal_aula({{$aula->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.aula.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-aula-{{$aula->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_aula({{$aula->id}})' wire:click="eliminar_aula({{$aula->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay aulas</div>
            @endif
        </div>
        <div class="col-12">
                {{$aulas->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_aula', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.aulas.part.aula_modal')
</div>