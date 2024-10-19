<div class="dniContainer">
    <div class="columnLeft">
        <!-- upload-section -->
        <div class="uploadSection">
            <div class="buscar d-flex align-items-center">
                <label for="search" class="mr-2">Buscar:</label>

                <div class="position-relative w-auto">
                    <input type="text" id="search" wire:model.live="search" placeholder="DNI ..."
                        autocomplete="off" @keydown.arrow-down.prevent="$wire.incrementIndex()"
                        @keydown.arrow-up.prevent="$wire.decrementIndex()"
                        @keydown.enter.prevent="$wire.selectCurrent()">

                    <!-- Lista de resultados -->
                    @if (!empty($results))
                        <ul class="list-group position-absolute w-100 top-100-zindex-1000">
                            @forelse ($results as $index => $result)
                                <li class="list-group-item list-group-item-action text-sm py-2 {{ $selectedIndex === $index ? 'active' : '' }}"
                                    role="button" wire:click="selectResult('{{ $result->id }}')">
                                    {{ $result->name }}
                                </li>
                            @empty
                                <li class="list-group-item list-group-item-action text-sm py-2" role="button">
                                    No encontrado
                                </li>
                            @endforelse
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <!-- tabs-section -->
        <div class="tabsSection">
            <input type="radio" id="tab1" name="tab-informacion" checked />
            <input type="radio" id="tab2" name="tab-informacion" />
            <input type="radio" id="tab3" name="tab-informacion" />
            <div class="tab-labels">
                <label for="tab1" class="tab" wire:click='cancelEdit'>Datos</label>
                <label for="tab2" class="tab" wire:click='cancelEdit'>Apoderados</label>
                <label for="tab3" class="tab" wire:click='cancelEdit'>Ubicacion</label>
            </div>

            <div class="tab-content-container">
                <div class="tab-content" id="datos-content">
                    <div class="datos-container">
                        <div class="input-group">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" {{ $readonly_datos }}
                                wire:model="userform.name">
                            <div class="text-sm text-red">
                                @error('userform.name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="apPaterno">Ap. Paterno:</label>
                            <input type="text" id="apPaterno" {{ $readonly_datos }}
                                wire:model="userform.ap_paterno">
                            <div class="text-sm text-red">
                                @error('userform.ap_paterno')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="apMaterno">Ap. Materno:</label>
                            <input type="text" id="apMaterno" {{ $readonly_datos }}
                                wire:model="userform.ap_materno">
                            <div class="text-sm text-red">
                                @error('userform.ap_materno')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="tipo_doc_identidad">Tipo Doc.:</label>
                            <select id="tipo_doc_identidad" class="form-control w-100" {{ $disabled_datos }}
                                wire:model="userform.f_tipo_documento_id">
                                <option value="DNI">DNI</option>
                                <option value="CE">C.E</option>
                            </select>
                            <div class="text-sm text-red">
                                @error('userform.f_tipo_documento_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="nro_doc_identidad">Nro. Doc.:</label>
                            <input type="text" id="nro_doc_identidad" {{ $readonly_datos }}
                                wire:model="userform.nro_documento">
                            <div class="text-sm text-red">
                                @error('userform.userform')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" id="direccion" {{ $readonly_datos }}
                                wire:model="userform.direccion">
                            <div class="text-sm text-red">
                                @error('userform.direccion')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="email">Email:</label>
                            <input type="text" id="email" {{ $readonly_datos }}
                                wire:model="userform.email">
                            <div class="text-sm text-red">
                                @error('userform.email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="celular">Celular:</label>
                            <input type="text" id="celular" {{ $readonly_datos }}
                                wire:model="userform.celular1">
                            <div class="text-sm text-red">
                                @error('userform.celular1')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="celular2">Celular 2:</label>
                            <input type="text" id="celular2" {{ $readonly_datos }}
                                wire:model="userform.celular2">
                            <div class="text-sm text-red">
                                @error('userform.celular2')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        @if (isset($userform->user) and !$editandoUser)
                            <button id="btn-editar" wire:click="editUser({{ $userform->user->id }})"
                                wire:loading.attr="disabled" wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Editar</button>
                        @endif
                        @if ($editandoUser)
                            <button id="btn-guardar" class="btn-guardar guardar {{ $inline_block_datos }}"
                                wire:click="btnGuardar()" wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Guardar</button>
                            <button id="btn-cancelar" class="btn-cancelar cancelar {{ $inline_block_datos }}"
                                wire:click="cancelEdit()" wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Cancelar</button>
                        @endif
                        @if ($agregandoUser)
                            <button id="btn-agregar" class="{{ $d_none_datos }}" wire:click="btnAgregar()"
                                wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Agregar</button>
                        @else
                            <button id="btn-guardar" class="btn-guardar guardar {{ $inline_block_datos }}"
                                wire:click="btnGuardar()" wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Guardar</button>
                            <button id="btn-cancelar" class="btn-cancelar cancelar {{ $inline_block_datos }}"
                                wire:click="cancelEdit()" wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed medio-opaco"
                                wire:target="editUser, btnGuardar, cancelEdit, btnAgregar">Cancelar</button>
                        @endif
                    </div>
                </div>
                <div class="tab-content" id="apoderados-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Celular</th>
                                <th>Tipo</th>
                                <th>DNI</th>
                                <th>Dirección</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user_apoderados as $user_apoderado)
                                <tr>
                                    @if ($editingApoderadoId === $user_apoderado->apoderado->id)
                                        @include('livewire.parts.pagos-apoderado')
                                    @else
                                        <td>{{ $user_apoderado->apoderado->full_name }}</td>
                                        <td>{{ $user_apoderado->apoderado->celular1 }}</td>
                                        <td>{{ $user_apoderado->tipo_apoderado->name }}</td>
                                        <td>{{ $user_apoderado->apoderado->nro_documento }}</td>
                                        <td>{{ $user_apoderado->apoderado->direccion }}</td>
                                        <td>{{ $user_apoderado->apoderado->email }}</td>
                                        <td>
                                            <button
                                                wire:click="editApoderado({{ $user_apoderado->apoderado->id }}, {{ $user_apoderado->id }})"
                                                wire:loading.attr="disabled"
                                                wire:loading.class="cursor-not-allowed medio-opaco"
                                                wire:target="editApoderado, deleteApoderado, addApoderado, updateApoderado, cancelEdit">Editar</button>
                                            <button wire:click="deleteApoderado({{ $user_apoderado->id }})"
                                                wire:loading.attr="disabled"
                                                wire:loading.class="cursor-not-allowed medio-opaco"
                                                wire:target="editApoderado, deleteApoderado, addApoderado, updateApoderado, cancelEdit">Eliminar</button>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Sin registro</td>
                                </tr>
                            @endforelse
                            @if ($editingApoderadoId === 'new')
                                <tr>
                                    @include('livewire.parts.pagos-apoderado')
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="actions">
                        <button id="btn-agregar" wire:click="addApoderado" wire:loading.attr="disabled"
                            wire:loading.class="cursor-not-allowed medio-opaco"
                            wire:target="editApoderado, deleteApoderado, addApoderado, updateApoderado, cancelEdit">Agregar</button>
                    </div>
                </div>
                <div class="tab-content" id="ubicacion-content">
                    <div class="ubicacion-container">
                        <div class="input-group">
                            <label for="udireccion">Dirección:</label>
                            <input type="text" id="udireccion" value="Av. Huancavelica" readonly>
                        </div>
                        <div class="input-group">
                            <label for="referencia">Referencia:</label>
                            <input type="text" id="referencia" value="Espalda del hospital del niño"
                                readonly>
                        </div>
                        <div class="input-group">
                            <label for="celular">Celular:</label>
                            <input type="text" id="celular" value="934665704" readonly>
                        </div>
                    </div>
                    <div class="actions">
                        <button id="btn-editar">Editar</button>
                        <button id="btn-agregar">Agregar</button>
                    </div>
                </div>
                <div class="actions" style="display: none">
                    <button id="btn-editar" onclick="habilitarEdicion()">Editar</button>
                    <button id="btn-agregar" onclick="limpiarInputs()">Agregar</button>
                    <button id="btn-guardar" class="btn-guardar guardar"
                        onclick="guardarCambios()">Guardar</button>
                    <button id="btn-cancelar" class="btn-cancelar cancelar"
                        onclick="cancelarEdicion()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- columnRight -->
    <div class="columnRight">
        <div class="tabs-toggle_perfil-dni">
            <input type="radio" id="toggle-perfil" name="tab-toggle" checked />
            <input type="radio" id="toggle-dni" name="tab-toggle" />
            <div class="tab-labels mb-2">
                <label for="toggle-perfil" class="tab">Perfil</label>
                <label for="toggle-dni" class="tab">DNI</label>
            </div>

            <div class="tab-content-container">
                <!-- Perfil Section -->
                <div class="tab-content" id="perfil-content">
                    <div class="image-container">
                        <img id="perfil-img" src="{{ $perfilUrl }}" alt="Perfil">
                        <div class="btn-group" id="perfil-btn-group">
                            <div wire:loading wire:target="newPerfilImage">Loading...</div>
                            @if (!$newPerfilImage)
                                <button id="add-image-perfil" class="btn-icon"
                                    onclick="document.getElementById('perfil-upload').click()"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newPerfilImage">➕</button>
                                <input type="file" id="perfil-upload" wire:model="newPerfilImage"
                                    style="display: none;" accept="image/*">
                            @endif
                            @if ($newPerfilImage)
                                <button id="save-image-perfil" class="btn-icon"
                                    wire:click="saveImage('perfil')" wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newPerfilImage">💾</button>
                                <button id="cancel-image-perfil" class="btn-icon"
                                    wire:click="cancelImage('perfil')" wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newPerfilImage">❌</button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- DNI Section -->
                <div class="tab-content" id="dni-content">
                    <div class="image-container">
                        <img id="dni-img" src="{{ $dniUrl }}" alt="DNI">
                        <div class="btn-group" id="dni-btn-group">
                            <div wire:loading wire:target="newDniImage">Loading...</div>
                            @if (!$newDniImage)
                                <button id="add-image-dni" class="btn-icon"
                                    onclick="document.getElementById('dni-upload').click()"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newDniImage">➕</button>
                                <input type="file" id="dni-upload" wire:model="newDniImage"
                                    style="display: none;" accept="image/*">
                            @endif
                            @if ($newDniImage)
                                <button id="save-image-dni" class="btn-icon" wire:click="saveImage('dni')"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newDniImage">💾</button>
                                <button id="cancel-image-dni" class="btn-icon"
                                    wire:click="cancelImage('dni')" wire:loading.attr="disabled"
                                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                                    wire:target="saveImage, cancelImage, newDniImage">❌</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
