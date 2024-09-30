<div class="container">
    <div class="row">
        <div class="col-auto mb-4">
            <!--agregar cgrupo-->
            @can('admin.cgrupo.crear')
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_cgrupo" wire:click="modal_cgrupo">
                <i class="fas fa-plus-circle"></i> Crear Cgrupo
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
            @if ($cgrupos->count()>0)
            <div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Ciclo</th>
                        <th>Turno</th>
                        <th>Modalidad</th>
                        <th>Costo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($cgrupos->sortBy('name') as $key => $cgrupo)
                            <tr>
                                <td>@if (isset($cgrupo->ciclo)){{$cgrupo->ciclo->name}}@endif</td>
                                <td>@if (isset($cgrupo->turno)){{$cgrupo->turno->name}}@endif</td>
                                <td>@if (isset($cgrupo->modalidad)){{$cgrupo->modalidad->name}}@endif</td>
                                <td>{{$cgrupo->costo}}</td>
                                <td>
                                    @can('admin.cgrupo.editar')
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_crear_actualizar_cgrupo" wire:click="modal_cgrupo({{$cgrupo->id}})"><i class="fas fa-edit"></i></button>
                                    @endcan
                                    @can('admin.cgrupo.eliminar')
                                        <button type="button" class="btn btn-danger" id="anular-cgrupo-{{$cgrupo->id}}"  wire:loading.attr='disabled'  wire:target='eliminar_cgrupo({{$cgrupo->id}})' wire:click="eliminar_cgrupo({{$cgrupo->id}})" wire:confirm="Estas seguro de Eliminar esta Aréa"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>Por el momento no hay cgrupos</div>
            @endif
        </div>
        <div class="col-12">
                {{$cgrupos->links()}}
        </div>
    </div>
    @script
    <script>
        $wire.on('mensaje_eliminar_cgrupo', mensaje => {
            alert(mensaje);
        });
    </script>
    @endscript
    @include('administrador.cgrupos.part.cgrupo_modal')
</div>