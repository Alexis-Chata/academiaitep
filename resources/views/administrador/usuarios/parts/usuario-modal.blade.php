<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modalusuario">
    Modal Usuario
</button>

<!-- Modal -->
<div class="modal fade" id="modalusuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalUsuarioLabel">{{ $titlemodal }} Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar_modal_usuario_x"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="guardar" id="formularioUsuario">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-address-card"></i> <span class="text-danger">*</span></div>
                                <input type="text" class="form-control" id="usuariosform.name" placeholder="Escribir Nombre" wire:model="usuariosform.name">
                            </div>
                            @error('usuariosform.name')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-address-card"></i> <span class="text-danger">*</span></div>
                                <input type="text" class="form-control" id="usuariosform.ap_paterno" placeholder="Escribir Ap. Paterno" wire:model="usuariosform.ap_paterno">
                            </div>
                            @error('usuariosform.ap_paterno')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-address-card"></i></div>
                                <input type="text" class="form-control" id="usuariosform.ap_materno" placeholder="Escribir Ap. Materno" wire:model="usuariosform.ap_materno">
                            </div>
                            @error('usuariosform.ap_materno')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-file"></i></div>
                                <select class="form-select" id="usuariosform_f_tipo_documento_id" wire:model="usuariosform.f_tipo_documento_id">
                                    <option value="">Elegir</option>
                                    @foreach ($tipo_documentos as $tdoc)
                                    <option value="{{$tdoc->descripcion}}">{{$tdoc->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('usuariosform.f_tipo_documento_id')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-address-card"></i></div>
                                <input type="text" class="form-control" id="usuariosform.nro_documento" placeholder="N° Documento" wire:model="usuariosform.nro_documento">
                            </div>
                            @error('usuariosform.nro_documento')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                <input type="text" class="form-control" id="usuariosform.email" placeholder="Escribir Email" wire:model="usuariosform.email">
                            </div>
                            @error('usuariosform.email')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-house-user"></i> <span class="text-danger">*</span></div>
                                <input type="text" class="form-control" id="usuariosform.direccion" placeholder="Escribir Dirección" wire:model="usuariosform.direccion">
                            </div>
                            @error('usuariosform.direccion')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-phone-alt"></i> <span class="text-danger">*</span></div>
                                <input type="text" class="form-control" id="usuariosform.celular1" placeholder="Escribir Celular" wire:model="usuariosform.celular1">
                            </div>
                            @error('usuariosform.celular1')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                                <input type="text" class="form-control" id="usuariosform.celular2" placeholder="Escribir Celular Secundario" wire:model="usuariosform.celular2">
                            </div>
                            @error('usuariosform.celular2')
                                <span class="error" style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="pais" class="form-label">Imagen del Usuario</label>
                            <input type="file" class="form-control" id="imagen-{{$iteration}}" placeholder="Ingrese Imagen de la Usuario" wire:model.live="imagen_perfil">
                        </div>
                    </div>
                    @if(isset($usuariosform) == true)
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="roles2" class="form-label">Roles</strong></label><br>
                                <!--role-->
                                @foreach ($roles as $role)
                                    {{$role->name}} : <input type="checkbox"   class="mr-1" wire:model='roles2' value="{{$role->name}}"><br>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="formularioUsuario" class="btn btn-primary">{{ $titlemodal }} Usuario</button>
            </div>
        </div>
    </div>
</div>
