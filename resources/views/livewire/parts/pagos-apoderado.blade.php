<td>
    <input type="text" wire:model.defer="apoderadoform.name" placeholder="Nombre">
    <input type="text" wire:model.defer="apoderadoform.ap_paterno" placeholder="Ap. Paterno">
    <input type="text" wire:model.defer="apoderadoform.ap_materno" placeholder="Ap. Materno">
    <div>
        @error('apoderadoform.name')
            {{ $message }}
        @enderror
    </div>
    <div>
        @error('apoderadoform.ap_materno')
            {{ $message }}
        @enderror
    </div>
    <div>
        @error('apoderadoform.ap_materno')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <input type="text" wire:model.defer="apoderadoform.celular1" placeholder="Celular">
    <div>
        @error('apoderadoform.celular1')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <select wire:model.defer="user_apoderadoform.tapoderado_id">
        @foreach($tipo_apoderados as $tapoderado)
            <option value="{{ $tapoderado->id }}">{{ $tapoderado->name }}</option>
        @endforeach
    </select>
    <div>
        @error('user_apoderadoform.tapoderado_id')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <select wire:model.defer="apoderadoform.f_tipo_documento_id" class="text-xs">
        @foreach($tipo_documentos as $tipo_documento)
            <option value="{{ $tipo_documento->id }}">{{ $tipo_documento->descripcion }}</option>
        @endforeach
    </select>
    <div>
        @error('apoderadoform.f_tipo_documento_id')
            {{ $message }}
        @enderror
    </div>
    <input type="text" wire:model.defer="apoderadoform.nro_documento" placeholder="DNI">
    <div>
        @error('apoderadoform.nro_documento')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <input type="text" wire:model.defer="apoderadoform.direccion" placeholder="Dirección">
    <div>
        @error('apoderadoform.direccion')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <button wire:click="updateApoderado">Guardar</button>
    <button wire:click="cancelEdit">Cancelar</button>
</td>
