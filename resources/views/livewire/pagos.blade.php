<div>
    <div class="mainContainer">
        <!-- dni-section -->
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
                        <div class="actions d-none">
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
                                        <button id="add-image-perfil" class="btn-icon d-none"
                                            onclick="document.getElementById('perfil-upload').click()"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="cursor-not-allowed-important medio-opaco"
                                            wire:target="saveImage, cancelImage, newPerfilImage">➕</button>
                                        <input type="file" id="perfil-upload" wire:model="newPerfilImage"
                                            accept="image/*">
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
                                        <button id="add-image-dni" class="btn-icon d-none"
                                            onclick="document.getElementById('dni-upload').click()"
                                            wire:loading.attr="disabled"
                                            wire:loading.class="cursor-not-allowed-important medio-opaco"
                                            wire:target="saveImage, cancelImage, newDniImage">➕</button>
                                        <input type="file" id="dni-upload" wire:model="newDniImage"
                                            accept="image/*">
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

        <!-- matricula-section -->
        <div class="matricula-section">
            <div class="columnFull mt-5 p-4 border rounded">
                @if (isset($userform->user) and $userform->user->matriculas->count())
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <button class="matA">MAT-A</button>
                            <button class="matB">MAT-B</button>
                            <button class="btn btn-light me-3 mt-n3 rounded-0 custom-border">
                                <img src="https://cdn-icons-png.flaticon.com/512/0/532.png" alt="Descargar"
                                    width="20px" />
                            </button>
                        </div>
                        <div class="vencimiento">v: 30-09-2024</div>
                    </div>

                    <!-- Contenedor de inputs en 3 columnas -->
                    <div class="row grid-input">
                        <div class="col-md-4 mb-3">
                            <label for="anio" class="form-label"><strong>Año:</strong></label>
                            <input type="text" id="anio" name="anio" class="form-control" value="2023"
                                readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="ciclo" class="form-label"><strong>Ciclo:</strong></label>
                            <input type="text" id="ciclo" name="ciclo" class="form-control"
                                value="Primera Fase" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="proceso" class="form-label"><strong>Proceso:</strong></label>
                            <input type="text" id="proceso" name="proceso" class="form-control"
                                value="Primera Ceprunsa" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="modalidad" class="form-label"><strong>Modalidad:</strong></label>
                            <input type="text" id="modalidad" name="modalidad" class="form-control"
                                value="Presencial" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="area" class="form-label"><strong>Área:</strong></label>
                            <input type="text" id="area" name="area" class="form-control"
                                value="Ingenierías" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="carrera" class="form-label"><strong>Carrera:</strong></label>
                            <input type="text" id="carrera" name="carrera" class="form-control"
                                value="Ingeniería de Sistemas" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div>
                                <div x-data="{
                                    selectedIndex_sede: 0,
                                    query_sede: @entangle('query_sede'),
                                    dataresults_sede: @entangle('dataresults_sede'),
                                    selectedItem_sede: null,
                                    selectCurrent_sede(i = null) {
                                        if (i !== null) {
                                            this.selectedIndex_sede = i;
                                        }
                                        var item = null
                                        if (this.query_sede) {
                                            var item = this.dataresults_sede[this.selectedIndex_sede];
                                        }
                                        if (item) {
                                            this.query_sede = item.nombre;
                                            this.selectedItem_sede = item; // Guardar el elemento seleccionado
                                            this.dataresults_sede = [];
                                            this.selectedIndex_sede = 0;
                                            $wire.selectItem_sede(this.selectedItem_sede.id);
                                        }
                                    }
                                }" class="relative col">
                                    <label for="sede" class="form-label"><strong>Sede:</strong></label>
                                    <input type="text" x-model="query_sede"
                                        @input="$wire.set('query_sede', query_sede)"
                                        @keydown.arrow-up.prevent="selectedIndex_sede = Math.max(selectedIndex_sede - 1, 0)"
                                        @keydown.arrow-down.prevent="selectedIndex_sede = Math.min(selectedIndex_sede + 1, dataresults_sede.length - 1)"
                                        @keydown.enter.prevent="selectCurrent_sede()"
                                        placeholder="Buscar Sedes..." class="form-control">

                                    <!-- Mostrar la lista solo si hay resultados y el query_sede no está vacío -->
                                    <ul class="list-group mt-2 position-absolute w-100 bg-white"
                                        x-show="dataresults_sede.length > 0 && query_sede.length > 0"
                                        style="z-index: 1000;">
                                        <template x-for="(result, i) in dataresults_sede" :key="i">
                                            <li :class="{ 'active': selectedIndex_sede === i }"
                                                class="list-group-item text-sm px-2 py-1"
                                                @click="selectCurrent_sede(i);"
                                                @mouseover="selectedIndex_sede = i" x-text="result.nombre">
                                            </li>
                                        </template>
                                    </ul>

                                    <!-- Mostrar los detalles del elemento seleccionado -->
                                    <div class="mt-4 d-none" x-show="selectedItem_sede">
                                        <h4>Detalles del Sede seleccionado</h4>
                                        <p><strong>Nombre:</strong> <span
                                                x-text="selectedItem_sede ? selectedItem_sede.nombre : ''"></span>
                                        </p>
                                        <p><strong>Descripción:</strong> <span
                                                x-text="selectedItem_sede ? selectedItem_sede.id : ''"></span>
                                        </p>
                                        <p><strong>Precio:</strong> <span
                                                x-text="selectedItem_sede ? selectedItem_sede.costo : ''"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-secondary">Editar</button>
                    </div>
                @else
                    <div class="noMat">
                        <i class="fas fa-bell"></i>
                        <b>No se encontro matricula</b>
                    </div>
                @endif
            </div>
        </div>

        <!-- pago-section -->
        <div class="pago-section">
            @include('livewire.parts.pagos-comprobante-pagos')
            @include('livewire.parts.pagos-historial-pagos')
        </div>
    </div>
    <style>
        .mainContainer {
            display: grid;
            max-width: 1600px;
            margin: auto;
            padding: 5px 0 55px;
            gap: 10px;
            font-family: sans-serif;
            font-size: 16px;

            @media(width <=1200px) {
                font-size: 14px;
            }

            @media(width <=700px) {
                font-size: 13px;
            }
        }


        /* CONTENEDOR dniContainer */
        .dniContainer {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: calc(4px + .3vw);
            width: 80%;
            margin: auto;

            & .columnLeft,
            & .columnRight {
                padding: calc(4px + .5vw);
                border-top: 3px solid #01aaa6;
                background-color: #fafafa;
                border-radius: 5px;
            }

            @media (width <=1200px) {
                width: 100%;
            }

            @media (width <=500px) {
                grid-template-columns: 1fr;
            }
        }

        .dniContainer .columnRight {
            padding: 0;
            border-top: 0;
            background-color: transparent;
            border-radius: 0;
            box-shadow: none;
            display: grid;
            align-items: start;
            justify-content: center;

            & .tabs-toggle_perfil-dni {
                padding: calc(4px + .5vw);
                background-color: #fafafa;
                border-radius: 5px;
                box-shadow: 0 0 2px 1px #d7d7d7;
                overflow: hidden;

                & .tab-labels {
                    justify-content: center;
                    margin-top: calc(-4px - .5vw);
                }
            }
        }

        .uploadSection {
            display: flex;
            justify-content: space-between;
            margin-bottom: calc(5px + .3vw);

            @media (width <=615px) {
                gap: calc(4px + .3vw);

                & input {
                    width: auto;
                }

                & .buscar label {
                    display: none;
                }

                & .buscar+div {
                    display: flex;
                    flex-direction: column;
                    gap: 4px;
                }
            }
        }

        /* Estilo general de los tabs */
        .tabsSection {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .tab-labels {
            display: flex;
            background-color: #18b9b5;
            color: white;
            justify-content: center;
            margin: 0 calc(-4px - .5vw);
        }

        /* Ocultar los radio buttons */
        input[type="radio"] {
            display: none;
        }

        input:read-only {
            background-color: #e9ecef;
        }

        .tab {
            padding: 5px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tab:hover {
            background-color: #b6b6b6;
        }

        /* Estilo del contenido */
        .tab-content-container {}

        .tab-content {
            display: none;
        }

        /* tabs-informacion */
        input#tab1:checked~.tab-content-container #datos-content,
        input#tab2:checked~.tab-content-container #apoderados-content,
        input#tab3:checked~.tab-content-container #ubicacion-content,

        /* toggle_perfil-dni */
        input#toggle-perfil:checked~.tab-content-container #perfil-content,
        input#toggle-dni:checked~.tab-content-container #dni-content {
            display: block;
        }

        /* tabs-informacion */
        input#tab1:checked~.tab-labels label[for="tab1"],
        input#tab2:checked~.tab-labels label[for="tab2"],
        input#tab3:checked~.tab-labels label[for="tab3"],

        /* toggle_perfil-dni */
        input#toggle-perfil:checked~.tab-labels label[for="toggle-perfil"],
        input#toggle-dni:checked~.tab-labels label[for="toggle-dni"] {
            background-color: #161616;
            color: white;
        }


        /* CONTENEDOR matricula-section */
        .container-fluid {
            padding: 0 calc(2px + .7vw) !important;
        }

        .matricula-section {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;

            & .columnFull {
                max-width: 100%;
                background: #fafafa;
                padding: calc(4px + .5vw) !important;
                margin: 0 !important;
                border-top: 3px solid #01aaa6 !important;
            }
        }


        /* CONTENEDOR pago-section */
        .pago-section {
            display: grid;
            grid-template-columns: .85fr 1fr;
            gap: 10px;

            & .columnLeft,
            & .columnRight {
                background-color: #fafafa;
                padding: calc(4px + .5vw);
                border-radius: 5px;
                margin-top: 0 !important;
                overflow-x: auto;

                & table {
                    overflow-x: auto;
                }
            }

            @media(width <=800px) {
                grid-template-columns: 1fr;
            }
        }

        .columnLeft,
        .columnFull,
        .columnRight {
            box-shadow: 0 0 2px 1px #d7d7d7;
        }

        .pago-section h2 {
            font-size: calc(14px + .4vw);
            background: #737373;
            color: white;
            padding: calc(4px + .5vw);
            margin: calc(-4px - .5vw);
            margin-bottom: calc(4px + .5vw);
        }

        .pago-section .columnRight thead {
            background-color: #000000;
            color: white;
        }

        /* GENERALES */
        .tabs-toggle_perfil-dni img {
            max-width: 180px;
            width: calc(100px + 5vw);
            display: block;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 3px 0 #c0c0c0;
            margin-top: 8px;
        }


        .item {
            background-color: lightgray;
            padding: 20px;
            text-align: center;
        }

        /* SEGUNDO ESTILO */
        .datos-container,
        .ubicacion-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(180px, 100%), 1fr));
            align-items: center;
            justify-content: center;
            gap: 1vw;

            @media (width <=600px) {
                grid-template-columns: repeat(auto-fit, minmax(min(130px, 100%), 1fr));
            }
        }

        .input-group {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-bottom: 15px;
        }

        input {
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            margin-top: calc(2px + .3vw);
        }

        button {
            margin-left: 10px;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            border: 1px solid #007bff;
            background-color: #007bff;
            color: white;
        }

        button.cancelar {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        button.guardar {
            background-color: #28a745;
            border-color: #28a745;
        }

        .matA {
            background-color: #3878ff;
            font-size: 20px;
            color: white;
            padding: 10px;
            margin: -6px !important;
            border-radius: 0;
            border: none;
        }

        .matB {
            background-color: #ea0000;
            font-size: 20px;
            color: white;
            padding: 10px;
            margin: -6px !important;
            margin-left: 0px !important;
            border-radius: 0;
            border: none;
        }

        .vencimiento {
            background-color: #009400;
            font-size: 20px;
            color: white;
            padding: 10px;
            margin: -6px !important;
            margin-top: -8px !important;
        }

        /* Ocultar por defecto los botones de guardar y cancelar */
        .btn-guardar,
        .btn-cancelar {
            display: none;
        }

        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 400px;
            /* Ancho máximo para los inputs */
        }

        .custom-file-upload {
            display: inline-block;
            padding: 6px 10px;
            cursor: pointer;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            text-align: center;
        }

        input[type="file"] {
            display: none;
            /* Oculta el input de archivo */
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: calc(2px + .3vw);
            text-align: left;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            /* Color al pasar el mouse sobre la fila */
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 600px) {
            .tab-content-container thead {
                display: none;
                /* Oculta el encabezado en pantallas pequeñas */
            }

            .tab-content-container tr {
                display: block;
                /* Cambia las filas a bloque */
                margin-bottom: 1rem;
                /* Espacio entre filas */
            }

            .tab-content-container td {
                display: flex;
                justify-content: right;
                align-items: center;
                padding-left: 50%;
                position: relative;
            }

            .tab-content-container td::before {
                content: attr(data-label);
                /* Usa el atributo data-label como etiqueta */
                position: absolute;
                /* Posiciona absolutamente el pseudo-elemento */
                left: 10px;
                /* Espaciado desde la izquierda */
                font-weight: bold;
                /* Negrita para las etiquetas */
            }

            .tab-content-container td:nth-of-type(1):before {
                content: "Nombre";
            }

            .tab-content-container td:nth-of-type(2):before {
                content: "Celular";
            }

            .tab-content-container td:nth-of-type(3):before {
                content: "Tipo";
            }

            .tab-content-container td:nth-of-type(4):before {
                content: "DNI";
            }

            .tab-content-container td:nth-of-type(5):before {
                content: "Dirección";
            }

            .tab-content-container td:nth-of-type(6):before {
                content: "Acciones";
            }

        }

        .content-wrapper>.content {
            padding: 0 !important;

            .grid-input {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(min(210px, 100%), 1fr));

                & .col-md-4 {
                    max-width: 100% !important;
                }
            }

            .tab-content-container td:last-child {
                display: flex;
                justify-content: center;
                gap: calc(2px + .3vw);

                & button {
                    margin: 0 !important;
                }

                @media(max-width: 600px) {
                    justify-content: end;
                }
            }

            .form-row {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(min(180px, 100%), 1fr));
            }

            .col-md-6,
            .col-md-2 {
                max-width: 100% !important;
                display: grid;
                grid-template-columns: auto 1fr;
                gap: calc(5px + .3vw);
                align-items: center;
                margin-bottom: calc(4px + .3vw);

                @media(max-width: 1300px) {
                    grid-template-columns: 1fr;
                    gap: 0;
                }
            }

            label {
                margin-bottom: 0px !important;
            }
        }

        .noMat {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #d42020;
            color: white;
            font-size: calc(14px + .35vw);
            border-radius: 5px;
            gap: 5px;
            text-shadow: 1px 1px 1px #960000;
            padding: 10px 0;
            margin-top: 5px;

            & svg {
                width: 1em;
                height: auto;
                fill: #fff;
                margin-top: -3px;
            }

            & button {
                background: white;
                color: #000;
                border: 0;
                box-shadow: 0 0 3px 1px #8a8a8a;
                font-weight: bold;
                transition: .3s;

                &:hover {
                    background: black;
                    color: white;
                }
            }
        }

        /*Estilos Button upload Perfil & DNI*/
        .image-container {
            position: relative;
            display: inline-block;
        }

        .btn-group {
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .btn-icon {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

        .btn-icon:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .top-100-zindex-1000 {
            top: 100%;
            z-index: 1000;
        }

        .custom-border {
            border: 2px solid #9a9a9a;
        }
    </style>
</div>
