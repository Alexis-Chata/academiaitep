<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar cstandar-->
            @can('admin.cstandar.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_cstandar" wire:click="modal_cstandar">
                <i class="fas fa-plus-circle"></i> Crear Concepto
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
            @if ($cstandars->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($cstandars->sortBy('name') as $key => $cstandar)
                            <tr>
                                <td>{{$cstandar->name}}</td>
                                <td>{{$cstandar->precio}}</td>
                                <td>
                                    @can('admin.cstandar.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_cstandar" wire:click="modal_cstandar({{$cstandar->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.cstandar.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-cstandar-{{$cstandar->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_cstandar({{$cstandar->id}})' wire:click="eliminar_cstandar({{$cstandar->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay cstandars</div>
            @endif
        </div>
        <div class="col-12">
                {{$cstandars->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_cstandar', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.cstandars.part.cstandar_modal')
</div>