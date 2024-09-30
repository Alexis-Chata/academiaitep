<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_cgrupo" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_cgrupo}} Concepto del Grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_cgrupo_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="cgrupoform_ciclo_id" class="form-label">Ciclo <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="cgrupoform_ciclo_id" wire:model.live='cgrupoform.ciclo_id'>
                        <option value="">Elegir</option>
                        @foreach ($ciclos as $ciclo)
                        <option value="{{$ciclo->id}}">{{$ciclo->name}}</option>
                        @endforeach
                    </select>
                    @error('cgrupoform.ciclo_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="cgrupoform_sede_id" class="form-label">Turnos <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="cgrupoform_sede_id" wire:model.live='cgrupoform.turno_id'>
                        <option value="">Elegir</option>
                        @foreach ($turnos as $turno)
                            <option value="{{$turno->id}}">{{$turno->name}}</option>
                        @endforeach
                    </select>
                    @error('cgrupoform.turno_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="cgrupoform_modalidad_id" class="form-label">Modalidad <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="cgrupoform_modalidad_id" wire:model.live='cgrupoform.modalidad_id'>
                        <option value="">Elegir</option>
                        @foreach ($modalidads as $mod)
                            <option value="{{$mod->id}}">{{$mod->name}}</option>
                        @endforeach
                    </select>
                    @error('cgrupoform.modalidad_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="cgrupoform_costo" class="form-label">Costo<span style="color: #ff0000;">(*)</span></label>
                    <input type="number" class="form-control" id="cgrupoform_costo" aria-describedby="emailHelp" wire:model="cgrupoform.costo">
                    @error('cgrupoform.costo') <span>{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_cgrupo" type="button" wire:click="save_cgrupo">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_cgrupo', reservacion => {
            ventana = document.getElementById('cerrar_modal_cgrupo_x').click();
        });
    </script>
    @endscript
</div>