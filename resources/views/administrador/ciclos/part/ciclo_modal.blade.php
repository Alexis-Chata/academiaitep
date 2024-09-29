<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_ciclo" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_ciclo}} Ciclo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_ciclo_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="name" class="form-label">Nombre del Ciclo<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="ciclo_nombre" aria-describedby="emailHelp" wire:model="cicloform.name">
                    @error('cicloform.name') <span>{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_ciclo" type="button" wire:click="save_ciclo">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_ciclo', reservacion => {
            ventana = document.getElementById('cerrar_modal_ciclo_x').click();
        });
    </script>
    @endscript
</div>