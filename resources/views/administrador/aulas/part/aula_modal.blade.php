<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_aula" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_aula}} Aula</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_aula_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Nombre<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="aula_nombre" aria-describedby="emailHelp" wire:model="aulaform.name">
                    @error('aulaform.name') <span style="color: red;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="shortname" class="form-label">Nombre Corto<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="aulaform_shortname" aria-describedby="emailHelp" wire:model="aulaform.shortname">
                    @error('aulaform.shortname') <span style="color: red;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Capacidad<span style="color: #ff0000;">(*)</span></label>
                    <input type="number" step="0.01" class="form-control" id="aula_nombre" aria-describedby="emailHelp" wire:model="aulaform.capacidad">
                    @error('aulaform.capacidad') <span style="color: red;">{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="aulaform_taula_id" class="form-label">Tipo de Aula <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="aulaform_taula_id" wire:model.live='aulaform.taula_id'>
                        <option value="">Elegir</option>
                        @foreach ($taulas as $taula)
                        <option value="{{$taula->id}}">{{$taula->name}}</option>
                        @endforeach
                    </select>
                    @error('aulaform.taula_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="aulaform_sede_id" class="form-label">Sede <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="aulaform_sede_id" wire:model.live='aulaform.sede_id'>
                        <option value="">Elegir</option>
                        @foreach ($sedes as $sede)
                        <option value="{{$sede->id}}">{{$sede->name}}</option>
                        @endforeach
                    </select>
                    @error('aulaform.sede_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_aula" type="button" wire:click="save_aula">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_aula', reservacion => {
            ventana = document.getElementById('cerrar_modal_aula_x').click();
        });
    </script>
    @endscript
</div>