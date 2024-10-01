<div>
    <div class="mainContainer">
        <!-- dni-section -->
        <div class="dniContainer">
            <div class="columnLeft">
                <!-- upload-section -->
                <div class="uploadSection">
                    <div class="buscar" style="display: flex;align-items: center;">
                        <label for="search" style="margin-right: 5px;">Buscar:</label>

                        <div style="position: relative; width: 100%;">
                            <input type="text" id="search" wire:model.live="search" placeholder="DNI ..."
                                autocomplete="off" style="flex: 1;" @keydown.arrow-down.prevent="$wire.incrementIndex()"
                                @keydown.arrow-up.prevent="$wire.decrementIndex()"
                                @keydown.enter.prevent="$wire.selectCurrent()">

                            <!-- Lista de resultados -->
                            @if (!empty($results))
                                <ul class="list-group position-absolute w-100" style="top: 100%; z-index: 1000;">
                                    @forelse ($results as $index => $result)
                                        <li class="list-group-item list-group-item-action text-sm py-2
                                            {{ $selectedIndex === $index ? 'active' : '' }}"
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
                        <label for="tab1" class="tab">Datos</label>
                        <label for="tab2" class="tab">Apoderados</label>
                        <label for="tab3" class="tab">Ubicacion</label>
                    </div>

                    <div class="tab-content-container">
                        <div class="tab-content" id="datos-content">
                            <div class="datos-container">
                                <div class="input-group">
                                    <label for="nombres">Nombres:</label>
                                    <input type="text" id="nombres" {{ $readonly_datos }}
                                        wire:model="userform.name">
                                    <div>
                                        @error('userform.name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="apPaterno">Ap. Paterno:</label>
                                    <input type="text" id="apPaterno" {{ $readonly_datos }}
                                        wire:model="userform.ap_paterno">
                                    <div>
                                        @error('userform.ap_paterno')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="apMaterno">Ap. Materno:</label>
                                    <input type="text" id="apMaterno" {{ $readonly_datos }}
                                        wire:model="userform.ap_materno">
                                    <div>
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
                                    <div>
                                        @error('userform.f_tipo_documento_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="nro_doc_identidad">Nro. Doc.:</label>
                                    <input type="text" id="nro_doc_identidad" {{ $readonly_datos }}
                                        wire:model="userform.nro_documento">
                                    <div>
                                        @error('userform.userform')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" id="direccion" {{ $readonly_datos }}
                                        wire:model="userform.direccion">
                                    <div>
                                        @error('userform.direccion')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="email">Email:</label>
                                    <input type="text" id="email" {{ $readonly_datos }}
                                        wire:model="userform.email">
                                    <div>
                                        @error('userform.email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="celular">Celular:</label>
                                    <input type="text" id="celular" {{ $readonly_datos }}
                                        wire:model="userform.celular1">
                                    <div>
                                        @error('userform.celular1')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="celular2">Celular 2:</label>
                                    <input type="text" id="celular2" {{ $readonly_datos }}
                                        wire:model="userform.celular2">
                                    <div>
                                        @error('userform.celular2')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="actions">
                                @if (isset($userform->user))
                                    <button id="btn-editar"
                                        onclick="habilitar_Edicion('datos-content')">Editar</button>
                                @else
                                    <button id="btn-editar" class="d-none" disabled>Editar</button>
                                @endif
                                <button id="btn-agregar" class="{{ $d_none_datos }}"
                                    wire:click="btnAgregar()">Agregar</button>
                                <button id="btn-guardar" class="btn-guardar guardar {{ $inline_block_datos }}"
                                    wire:click="btnGuardar()">Guardar</button>
                                <button id="btn-cancelar" class="btn-cancelar cancelar {{ $inline_block_datos }}"
                                    wire:click="btnCancelar()">Cancelar</button>
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
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Arthuro</td>
                                        <td>987654321</td>
                                        <td>Papa</td>
                                        <td>48473299</td>
                                        <td>av. varela</td>
                                        <td><button>Editar</button><button>Eliminar</button></td>
                                    </tr>
                                    <tr>
                                        <td>Ariana</td>
                                        <td>987654234</td>
                                        <td>Mama</td>
                                        <td>49473299</td>
                                        <td>av. girasoles</td>
                                        <td><button>Editar</button><button>Eliminar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="actions">
                                <button id="btn-agregar">Agregar</button>
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
                       <div class="tab-labels" style="margin-bottom: 5px">
                           <label for="toggle-perfil" class="tab">Perfil</label>
                           <label for="toggle-dni" class="tab">DNI</label>
                       </div>

                       <div class="tab-content-container">
                           <!-- Perfil Section -->
                           <div class="tab-content" id="perfil-content">
                               <div class="image-container">
                                   <img id="perfil-img" src="{{ $perfilUrl }}" alt="Perfil">
                                   <div class="btn-group" id="perfil-btn-group">
                                       @if(!$newPerfilImage)
                                           <button id="add-image-perfil" class="btn-icon" onclick="document.getElementById('perfil-upload').click()">➕</button>
                                           <input type="file" id="perfil-upload" wire:model="newPerfilImage" style="display: none;" accept="image/*">
                                       @endif
                                       @if($newPerfilImage)
                                           <button id="save-image-perfil" class="btn-icon" wire:click="saveImage('perfil')">💾</button>
                                           <button id="cancel-image-perfil" class="btn-icon" wire:click="cancelImage('perfil')">❌</button>
                                       @endif
                                   </div>
                               </div>
                           </div>

                           <!-- DNI Section -->
                           <div class="tab-content" id="dni-content">
                               <div class="image-container">
                                   <img id="dni-img" src="{{ $dniUrl }}" alt="DNI">
                                   <div class="btn-group" id="dni-btn-group">
                                       @if(!$newDniImage)
                                           <button id="add-image-dni" class="btn-icon" onclick="document.getElementById('dni-upload').click()">➕</button>
                                           <input type="file" id="dni-upload" wire:model="newDniImage" style="display: none;" accept="image/*">
                                       @endif
                                       @if($newDniImage)
                                           <button id="save-image-dni" class="btn-icon" wire:click="saveImage('dni')">💾</button>
                                           <button id="cancel-image-dni" class="btn-icon" wire:click="cancelImage('dni')">❌</button>
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
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button class="matA">MAT-A</button>
                        <button class="matB">MAT-B</button>
                        <button class="btn btn-light me-3"
                            style="margin-top: -15px;border: 2px solid #9a9a9a;border-radius: 0">
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
                        <label for="sede" class="form-label"><strong>Sede:</strong></label>
                        <input type="text" id="sede" name="sede" class="form-control" value="Local 1"
                            readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-secondary">Editar</button>
                </div>
                <div class="noMat">
                    <svg width="800px" height="800px" viewBox="0 0 36 36" version="1.1"
                        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 1em;height: auto;fill: #ffffff; ">
                        <title>alert-solid</title>
                        <path class="clr-i-solid clr-i-solid-path-1"
                            d="M18,2.5c-8.82,0-16,6.28-16,14s7.18,14,16,14a18,18,0,0,0,4.88-.68l5.53,3.52a1,1,0,0,0,1.54-.84l0-6.73a13,13,0,0,0,4-9.27C34,8.78,26.82,2.5,18,2.5ZM16.93,9.13a1.41,1.41,0,1,1,2.81,0V18.9a1.41,1.41,0,1,1-2.81,0Zm1.41,17.35a1.87,1.87,0,1,1,1.87-1.87A1.87,1.87,0,0,1,18.34,26.47Z">
                        </path>
                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
                    </svg>
                    <b>No se encontro matricula --></b>
                    <button type="button">AGREGAR</button>
                </div>
            </div>
        </div>

        <!-- pago-section -->
        <div class="pago-section">
            <div class="columnLeft mt-4">
                <h2>Comprobante de Pago</h2>

                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="femision">F. Emisión:</label>
                            <input type="date" class="form-control" id="femision">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doc">Doc:</label>
                            <select id="doc" class="form-control">
                                <option>Elegir</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cuenta">Cuenta:</label>
                            <select id="cuenta" class="form-control">
                                <option>Elegir</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mpago">M. Pago:</label>
                            <select id="mpago" class="form-control">
                                <option>Elegir</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="vaucher">Vaucher:</label>
                            <input type="text" class="form-control" id="vaucher">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="noperacion">N. Operación:</label>
                            <input type="text" class="form-control" id="noperacion">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select id="concepto" class="form-control">
                                <option>Elegir un Concepto de Cobro ...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" class="form-control" id="cantidad" value="0"
                                min="0">
                        </div>
                        <div class="form-group col-md-4 d-flex align-items-end">
                            <button type="button" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Concepto</th>
                            <th>Saldo</th>
                            <th>A Pagar</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="columnRight mt-5">
                <h2 class="mb-4">Tabla de Datos</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mes</th>
                            <th>Código</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Saldo</th>
                            <th>Concepto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Enero</td>
                            <td>A001</td>
                            <td>Activo</td>
                            <td>1500.00</td>
                            <td>500.00</td>
                            <td>Pago de servicios</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Febrero</td>
                            <td>A002</td>
                            <td>Inactivo</td>
                            <td>2000.00</td>
                            <td>0.00</td>
                            <td>Compra de materiales</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Marzo</td>
                            <td>A003</td>
                            <td>Activo</td>
                            <td>1200.00</td>
                            <td>300.00</td>
                            <td>Alquiler de oficina</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Abril</td>
                            <td>A004</td>
                            <td>Pendiente</td>
                            <td>800.00</td>
                            <td>200.00</td>
                            <td>Gastos de viaje</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Mayo</td>
                            <td>A005</td>
                            <td>Activo</td>
                            <td>2500.00</td>
                            <td>1000.00</td>
                            <td>Venta de productos</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Junio</td>
                            <td>A006</td>
                            <td>Cancelado</td>
                            <td>500.00</td>
                            <td>-100.00</td>
                            <td>Devolución</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var inputs, btnEditar, btnAgregar, btnGuardar, btnCancelar;

        function inicializar_inputs(parent) {
            inputs = parent.querySelectorAll('.tabsSection input');
            selects = parent.querySelectorAll('.tabsSection select');
            btnEditar = parent.querySelector('#btn-editar');
            btnAgregar = parent.querySelector('#btn-agregar');
            btnGuardar = parent.querySelector('#btn-guardar');
            btnCancelar = parent.querySelector('#btn-cancelar');
        }

        function habilitar_Edicion(parentid) {
            inicializar_inputs(document.getElementById(parentid))
            habilitarEdicion()
        }

        // Almacenar valores originales para restaurarlos en caso de cancelación
        let valoresOriginales = {};

        function habilitarEdicion() {
            guardarValores()

            // Cambiar la visibilidad de los botones
            btnEditar.style.display = 'none';
            btnAgregar.style.display = 'none';
            btnGuardar.style.display = 'inline-block';
            btnCancelar.style.display = 'inline-block';
        }

        function guardarValores() {
            // Guardar los valores originales de los inputs
            valoresOriginales = {};
            inputs.forEach(input => {
                valoresOriginales[input.id] = input.value;
                input.removeAttribute('readonly');
            });
            selects.forEach(select => {
                valoresOriginales[select.id] = select.value;
                select.removeAttribute('disabled');
            });
            console.log(valoresOriginales);
        }

    </script>
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
    </style>
</div>
