<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_turno" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_turno}} Turno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_turno_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Nombre del Turno<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="turno_nombre" aria-describedby="emailHelp" wire:model="turnoform.name">
                    @error('turnoform.name') <span>{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_turno" type="button" wire:click="save_turno">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_turno', reservacion => {
            ventana = document.getElementById('cerrar_modal_turno_x').click();
        });
    </script>
    @endscript
</div>