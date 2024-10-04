<div class="modal show d-block" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $sede_id ? 'Editar Sede' : 'Crear Nueva Sede' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModalSede">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre_sede">Nombre</label>
                        <input type="text" class="form-control" id="nombre_sede" wire:model="nombre_sede">
                        @error('nombre_sede') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" wire:model="telefono">
                        @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" wire:model="direccion">
                        @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" id="departamento" wire:model="departamento">
                        @error('departamento') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <input type="text" class="form-control" id="provincia" wire:model="provincia">
                        @error('provincia') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="distrito">Distrito</label>
                        <input type="text" class="form-control" id="distrito" wire:model="distrito">
                        @error('distrito') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ubigueo">Ubigeo</label>
                        <input type="text" class="form-control" id="ubigueo" wire:model="ubigueo">
                        @error('ubigueo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="addresstypecode">Código de Tipo de Dirección</label>
                        <input type="text" class="form-control" id="addresstypecode" wire:model="addresstypecode">
                        @error('addresstypecode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="f_empresa_id">Empresa</label>
                        <select class="form-control" id="f_empresa_id" wire:model="f_empresa_id">
                            <option value="">Seleccione una empresa</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                            @endforeach
                        </select>
                        @error('f_empresa_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="{{ $sede_id ? 'updateSede' : 'storeSede' }}" class="btn btn-primary">
                    {{ $sede_id ? 'Actualizar' : 'Guardar' }}
                </button>
                <button type="button" wire:click="closeModalSede()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>