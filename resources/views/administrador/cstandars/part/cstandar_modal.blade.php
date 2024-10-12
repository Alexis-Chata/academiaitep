<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_cstandar" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_cstandar}} Concepto Normales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_cstandar_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="cstandar_nombre" class="form-label">Nombre del Concepto<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="cstandar_nombre" aria-describedby="emailHelp" wire:model="cstandarform.name">
                    @error('cstandarform.name') <span>{{$message}}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="cstandar_precio" class="form-label">Precio<span style="color: #ff0000;">(*)</span></label>
                    <input type="number" step="0.01" class="form-control" id="cstandar_precio"  wire:model="cstandarform.precio">
                    @error('cstandarform.precio') <span>{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_cstandar" type="button" wire:click="save_cstandar">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_cstandar', reservacion => {
            ventana = document.getElementById('cerrar_modal_cstandar_x').click();
        });
    </script>
    @endscript
</div>