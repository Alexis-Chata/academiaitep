<td>
    <input type="text" wire:model.defer="apoderadoform.name" placeholder="Nombre">
    <input type="text" wire:model.defer="apoderadoform.ap_paterno" placeholder="Ap. Paterno">
    <input type="text" wire:model.defer="apoderadoform.ap_materno" placeholder="Ap. Materno">
    <div class="text-sm text-red">
        @error('apoderadoform.name')
            {{ $message }}
        @enderror
    </div>
    <div class="text-sm text-red">
        @error('apoderadoform.ap_materno')
            {{ $message }}
        @enderror
    </div>
    <div class="text-sm text-red">
        @error('apoderadoform.ap_materno')
            {{ $message }}
        @enderror
    </div>
    <div class="text-sm text-red">
        @error('user_para_crear_apoderado')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <input type="text" wire:model.defer="apoderadoform.celular1" placeholder="Celular">
    <div class="text-sm text-red">
        @error('apoderadoform.celular1')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <select wire:model.defer="user_apoderadoform.tapoderado_id">
        @foreach ($tipo_apoderados as $tapoderado)
            <option value="{{ $tapoderado->id }}">{{ $tapoderado->name }}</option>
        @endforeach
    </select>
    <div class="text-sm text-red">
        @error('user_apoderadoform.tapoderado_id')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <select wire:model.defer="apoderadoform.f_tipo_documento_id" class="text-xs">
        @foreach ($tipo_documentos as $tipo_documento)
            <option value="{{ $tipo_documento->id }}">{{ $tipo_documento->descripcion }}</option>
        @endforeach
    </select>
    <div class="text-sm text-red">
        @error('apoderadoform.f_tipo_documento_id')
            {{ $message }}
        @enderror
    </div>
    <input type="text" wire:model.defer="apoderadoform.nro_documento" placeholder="Nro Documento">
    <div class="text-sm text-red">
        @error('apoderadoform.nro_documento')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <input type="text" wire:model.defer="apoderadoform.direccion" placeholder="Dirección">
    <div class="text-sm text-red">
        @error('apoderadoform.direccion')
            {{ $message }}
        @enderror
    </div>
</td>
<td>
    <input type="email" wire:model.defer="apoderadoform.email" placeholder="Email">
    <div class="text-sm text-red">
        @error('apoderadoform.email')
            {{ $message }}
        @enderror
    </div>
</td>
<td class="flex-column">
    <button wire:click="updateApoderado" wire:loading.attr="disabled"
        wire:loading.class="cursor-not-allowed medio-opaco"
        wire:target="editApoderado, deleteApoderado, addApoderado, updateApoderado, cancelEdit">Guardar</button>
    <button wire:click="cancelEdit" wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed medio-opaco"
        wire:target="editApoderado, deleteApoderado, addApoderado, updateApoderado, cancelEdit">Cancelar</button>
</td>
