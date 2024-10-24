<div wire:ignore.self class="modal fade" id="modal_materias" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plantilla - @isset($splantilla->name)
            {{$splantilla->name}}
        @endisset</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_materia_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div>
                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="name_materia" class="form-label">Nombre <span style="color: #ff0000;">(*)</span></label>
                        <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" wire:model="materiaform.name">
                        @error('materiaform.name')
                            <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-12">
                        @isset($splantilla->id)
                            <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_materia()" type="button" wire:click="save_materia()">{{$titulo_materia}} Matería</button>
                        @endisset
                    </div>
                </div>
            </div>
            <div>
                @isset($splantilla->materias)
                @if ($splantilla->materias->count() > 0)
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($splantilla->materias->sortBy('name') as $materia)
                        <tr>
                            <td>{{$materia->name}}</td>
                            <td>
                                @can('admin.materia.eliminar')
                                <button type="button" class="btn btn-danger" wire:click="eliminar_materia({{$materia->id}})" wire:confirm="Estas seguro de Eliminar esta Carrera"><i class="fas fa-trash"></i></button>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                @endisset
            </div>
        </div>
        <div class="modal-footer">
        @can('admin.materia.crear')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        @endcan
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_materia', reservacion => {
            ventana = document.getElementById('cerrar_modal_materia_x').click();
        });
    </script>
    @endscript
</div>
