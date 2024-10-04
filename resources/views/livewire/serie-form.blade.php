<div class="modal show d-block" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $serie_id ? 'Editar Serie' : 'Crear Nueva Serie' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModalSerie">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="tipo_comprobante_id">Tipo de Comprobante</label>
                        <select class="form-control" id="tipo_comprobante_id" wire:model="tipo_comprobante_id">
                            <option value="">Seleccione un tipo de comprobante</option>
                            @foreach($tipoComprobantes as $tipoComprobante)
                                <option value="{{ $tipoComprobante->id }}">{{ $tipoComprobante->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('tipo_comprobante_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="serie">Serie</label>
                        <input type="text" class="form-control" id="serie" wire:model="serie">
                        @error('serie') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="correlativo">Correlativo</label>
                        <input type="number" class="form-control" id="correlativo" wire:model="correlativo">
                        @error('correlativo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="f_sede_id">Sede</label>
                        <select class="form-control" id="f_sede_id" wire:model="f_sede_id">
                            <option value="">Seleccione una sede</option>
                            @foreach($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                        @error('f_sede_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="{{ $serie_id ? 'updateSerie' : 'storeSerie' }}" class="btn btn-primary">
                    {{ $serie_id ? 'Actualizar' : 'Guardar' }}
                </button>
                <button type="button" wire:click="closeModalSerie()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>