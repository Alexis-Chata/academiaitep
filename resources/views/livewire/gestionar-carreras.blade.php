<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar Area-->
            @can('admin.area.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_area" wire:click="modal_area">
                <i class="fas fa-plus-circle"></i> Crear Area
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
            @if ($areas->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th class="text-center">Carreras</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($areas->sortBy('name') as $key => $area)
                            <tr>
                                <td>{{$area->name}}</td>
                                <td class="text-center">
                                    @can('admin.area.consultar')
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal_carreras" wire:click="consultar_area({{$area->id}})">{{$area->carreras->count()}}</button>
                                    @endcan
                                </td>
                                <td>
                                    @can('admin.area.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_area" wire:click="modal_area({{$area->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.area.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-area-{{$area->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_area({{$area->id}})' wire:click="eliminar_area({{$area->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay areas</div>
            @endif
        </div>
        <div class="col-12">
                {{$areas->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_area', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.carreras.part.area_modal')
    @include('administrador.carreras.part.carrera_modal')
</div>
