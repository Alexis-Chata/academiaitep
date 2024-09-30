<div wire:ignore.self class="modal fade" id="modal_crear_actualizar_grupo" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$titulo_grupo}} Grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id="cerrar_modal_grupo_x" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="grupoform_name" class="form-label">Nombre<span style="color: #ff0000;">(*)</span></label>
                    <input type="text" class="form-control" id="cgrupoform_costo" aria-describedby="emailHelp" wire:model="grupoform.name">
                    @error('grupoform.name') <span>{{$message}}</span> @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="grupoform_aula_id" class="form-label">Aulas <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="grupoform_aula_id" wire:model.live='grupoform.aula_id'>
                        <option value="">Elegir</option>
                        @foreach ($aulas as $aula)
                            <option value="{{$aula->id}}">{{$aula->name}}</option>
                        @endforeach
                    </select>
                    @error('grupoform.aula_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="grupoform_ciclo_id" class="form-label">Ciclo <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="grupoform_ciclo_id" wire:model.live='grupoform.ciclo_id'>
                        <option value="">Elegir</option>
                        @foreach ($ciclos as $ciclo)
                        <option value="{{$ciclo->id}}">{{$ciclo->name}}</option>
                        @endforeach
                    </select>
                    @error('grupoform.ciclo_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
                

                <div class="mb-3 col-12">
                    <label for="grupoform_turno_id" class="form-label">Turnos <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="grupoform_sede_id" wire:model.live='grupoform.turno_id'>
                        <option value="">Elegir</option>
                        @foreach ($turnos as $turno)
                            <option value="{{$turno->id}}">{{$turno->name}}</option>
                        @endforeach
                    </select>
                    @error('grupoform.turno_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>


                <div class="mb-3 col-12">
                    <label for="grupoform_modalidad_id" class="form-label">Modalidad <span class='text-red'>(*)</span></label>
                    <select class="form-select" id="grupoform_modalidad_id" wire:model.live='grupoform.modalidad_id'>
                        <option value="">Elegir</option>
                        @foreach ($modalidads as $mod)
                            <option value="{{$mod->id}}">{{$mod->name}}</option>
                        @endforeach
                    </select>
                    @error('grupoform.modalidad_id')<div class="p-1" style="color:red;"> {{ $message }}</div>@enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save_grupo" type="button" wire:click="save_grupo">Guardar</button>
        </div>
    </div>
    </div>
    @script
    <script>
        $wire.on('cerrar_modal_grupo', reservacion => {
            ventana = document.getElementById('cerrar_modal_grupo_x').click();
        });
    </script>
    @endscript
</div>