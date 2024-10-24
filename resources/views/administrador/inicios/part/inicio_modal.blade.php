<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_inicio" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_inicio}} inicio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_inicio_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Nombre del inicio<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="inicio_nombre" aria-describedby="emailHelp" wire:model="inicioform.name">
                    @error('inicioform.name') <span>{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Elegir Año<span style="color: #ff0000;">(*)</span></label>
                    <select class="form-select" aria-label="elegir por defecto" wire:model="inicioform.id_anio">
                            <option value="">Elegir</option>
                            @foreach ($anios as $anio)
                                <option value="{{ $anio->id }}">{{ $anio->name}}</option>
                            @endforeach
                    </select>
                    @error('inicioform.id_anio') <span>{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Elegir Plantilla<span style="color: #ff0000;">(*)</span></label>
                    <select class="form-select" aria-label="elegir por defecto" wire:model="splantilla">
                            <option value="">Elegir</option>
                            @foreach ($plantillas as $plantilla)
                                <option value="{{ $plantilla->id }}">{{ $plantilla->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_inicio" type="button" wire:click="save_inicio">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_inicio', reservacion => {
            ventana = document.getElementById('cerrar_modal_inicio_x').click();
        });
    </script>
    @endscript
</div>
