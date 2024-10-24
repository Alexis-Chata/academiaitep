<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar Plantilla-->
            @can('admin.plantilla.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_plantilla" wire:click="modal_plantilla">
                <i class="fas fa-plus-circle"></i> Crear Plantilla
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
            @if ($plantillas->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th class="text-center">Materias</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($plantillas->sortBy('name') as $key => $plantilla)
                            <tr>
                                <td>{{$plantilla->name}}</td>
                                <td class="text-center">
                                    @can('admin.plantilla.consultar')
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal_materias" wire:click="consultar_plantilla({{$plantilla->id}})">{{$plantilla->materias->count()}}</button>
                                    @endcan
                                </td>
                                <td>
                                    @can('admin.plantilla.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_plantilla" wire:click="modal_plantilla({{$plantilla->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.plantilla.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-plantilla-{{$plantilla->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_plantilla({{$plantilla->id}})' wire:click="eliminar_plantilla({{$plantilla->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay plantillas</div>
            @endif
        </div>
        <div class="col-12">
                {{$plantillas->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_plantilla', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.plantillas.part.plantilla_modal')
    @include('administrador.plantillas.part.materia_modal')
</div>
