<div>
    <div class="mainContainer">
        <!-- dni-section -->
        @include('livewire.parts.pagos-user')

        <!-- matricula-section -->
        <div class="matricula-section">
            <div class="columnFull mt-5 p-4 border rounded">
                @if (isset($userform->user) && $userform->user->matriculas->count())
                    <div class="tabs-matriculas">
                        <div class="tab-labels">
                            @foreach ($userform->user->matriculas as $matricu)
                                <button class="tab {{ $selectedMatriculaId == $matricu->id ? 'active' : '' }}"
                                    wire:click="selectMatricula({{ $matricu->id }})">
                                    Matrícula {{ $matricu->id }}
                                </button>
                            @endforeach
                        </div>

                        <div class="tab-content-container">
                            <div class="tab-content active">
                                @if ($editingMatricula)
                                    @include('livewire.matricula-form')
                                @else
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <button class="btn btn-light me-3 mt-n3 rounded-0 custom-border">
                                                <img src="https://cdn-icons-png.flaticon.com/512/0/532.png"
                                                    alt="Descargar" width="20px" />
                                            </button>
                                        </div>
                                        <div class="vencimiento">FV: {{ $matricula->fvencimiento }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Año:</strong> {{ $matricula->anio }}</div>
                                        <div class="col-md-3"><strong>Ciclo:</strong> {{ $matricula->ciclo }}</div>
                                        <div class="col-md-3"><strong>Turno:</strong> {{ $matricula->turno }}</div>
                                        <div class="col-md-3"><strong>Modalidad:</strong>{{ $matricula->modalidad }}
                                        </div>
                                        <div class="col-md-3"><strong>Aula:</strong> {{ $matricula->aula }}</div>
                                        <div class="col-md-3"><strong>Sede:</strong> {{ $matricula->sede }}</div>
                                        <div class="col-md-3"><strong>Carrera:</strong>
                                            {{ optional($matricula->carrera)->name ?? '-' }}</div>
                                        <div class="col-md-3"><strong>Grupo:</strong>
                                            {{ optional($matricula->grupo)->name ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button wire:click="editMatricula({{ $matricula->id }})"
                                            class="btn btn-primary">Editar</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="noMat">
                        <i class="fas fa-bell"></i>
                        <b>No se encontró matrícula</b>
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
                padding-top: 0 !important;
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

        .pago-section .row:last-child {
            display: grid;
            grid-template-columns: 1fr .5fr auto;

            & .form-group {
                grid-template-columns: 1fr !important;
                max-width: initial !important;
                margin: 0 !important;

                & div:first-child {
                    padding: 0;
                }

                & button {
                    margin: 0 !important;
                }
            }
        }

        .tab {
            padding: calc(5px + .3vw) 20px;
        }

        .tabs-matriculas {
            display: flex;
            flex-direction: column;

            & .tab-labels {
                flex-direction: row-reverse;
                margin-bottom: calc(4px + .3vw);

                & button {
                    border-radius: 0;
                    border: 0;
                    background: transparent;
                    font-size: 16px;
                    padding: calc(5px + .3vw) 20px;
                    margin: 0;
                    font-weight: bold;
                    text-shadow: 1px 1px 1px #00000033;

                    &:hover {
                        background: #b6b6b6;
                    }
                }

                & .tab.active {
                    background: #161616;
                }
            }

            & .tab-content.active {
                display: block;
            }

            & .tab-content-container {}
        }

        .gap-10 {
            gap: 10px;
        }

        .grid-initial {
            grid: initial;
        }

        .row.gap-10.grid-initial {
            grid: initial;
        }
    </style>
    @script
        <script>
            $wire.on('success', data => {
                mensaje = data[0]['message'];
                if (data[0]['obs'] && Array.isArray(data[0]['obs']))
                {
                    if (data[0]['obs'].length >= 2)
                    {
                        mensaje += " obs:"; // Añadir "obs:" al mensaje base
                        // Recorrer cada observación y añadirla al mensaje
                        data[0]['obs'].slice(1).forEach(obs => { mensaje += " " + obs;});
                    }
                }

                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 4500
                });
            });

            $wire.on('error', data => {
                Swal.fire({
                    position: "center-center",
                    icon: "error",
                    title: data[0]['message'],
                    showConfirmButton: false,
                    timer: 4500
                });
            });
        </script>
    @endscript
</div>
