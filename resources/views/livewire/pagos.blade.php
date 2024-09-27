<div>
<div class="mainContainer">
    <!-- dni-section -->
    <div class="dniContainer">
        <div class="columnLeft">
            <!-- upload-section -->
            <div class="uploadSection" style="display:flex;justify-content:space-between">
                <div>
                    <label for="search">Buscar:</label>
                    <input type="text" id="search" placeholder="DNI ...">
                </div>
                <div>
                    <label class="custom-file-upload" for="profileImage">Subir Perfil</label>
                    <input type="file" id="profileImage" accept="image/*">
                    <label class="custom-file-upload" for="documentImage">Subir DNI</label>
                    <input type="file" id="documentImage" accept="image/*">
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
                              <input type="text" id="nombres" value="Arthur Juan" readonly>
                            </div>
                            <div class="input-group">
                              <label for="apPaterno">Ap. Paterno:</label>
                              <input type="text" id="apPaterno" value="Buitron" readonly>
                            </div>
                            <div class="input-group">
                              <label for="apMaterno">Ap. Materno:</label>
                              <input type="text" id="apMaterno" value="Navarro" readonly>
                            </div>
                            <div class="input-group">
                              <label for="direccion">Dirección:</label>
                              <input type="text" id="direccion" value="Mz C Lt 14 - Chorrillos" readonly>
                            </div>
                            <div class="input-group">
                              <label for="email">Email:</label>
                              <input type="text" id="email" value="estudiante1@gmail.com" readonly>
                            </div>
                            <div class="input-group">
                              <label for="celular">Celular:</label>
                              <input type="text" id="celular" value="934 665 704" readonly>
                            </div>
                            <div class="input-group">
                              <label for="celular2">Celular 2:</label>
                              <input type="text" id="celular2" value="987 985 987" readonly>
                            </div>
                        </div>
                        <div class="actions">
                          <button id="btn-editar">Editar</button>
                          <button id="btn-agregar">Agregar</button>
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
                              <input type="text" id="referencia" value="Espalda del hospital del niño" readonly>
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
                      <button id="btn-guardar" class="btn-guardar guardar" onclick="guardarCambios()">Guardar</button>
                      <button id="btn-cancelar" class="btn-cancelar cancelar" onclick="cancelarEdicion()">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- columnRight -->
        <div class="columnRight">
            <div class="tabs-toggle_perfil-dni">
                <input type="radio" id="toggle-perfil" name="tab-toggle" checked />
                <input type="radio" id="toggle-dni" name="tab-toggle" />
                <div class="tab-labels">
                    <label for="toggle-perfil" class="tab">Perfil</label>
                    <label for="toggle-dni" class="tab">DNI</label>
                </div>

                <div class="tab-content-container">
                    <div class="tab-content" id="perfil-content">
                        <img src="https://icones.pro/wp-content/uploads/2021/03/avatar-de-personne-icone-homme.png" alt="Perfil">
                    </div>
                    <div class="tab-content" id="dni-content">
                        <img src="https://cdn.www.gob.pe/uploads/medium/archive/000/010/331/dni-digito-verificador.png" alt="DNI">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- matricula-section -->
    <div class="matricula-section">
        <div class="container mt-5 p-4 border rounded">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <button class="btn btn-primary me-2">MAT-A</button>
                    <button class="btn btn-danger">MAT-B</button>
                    <button class="btn btn-light me-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/0/532.png" alt="Descargar" width="20px" />
                    </button>
                </div>
                <div class="badge bg-success text-white p-2">
                    v: 30-09-2024
                </div>
            </div>

            <!-- Contenedor de inputs en 3 columnas -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="anio" class="form-label"><strong>Año:</strong></label>
                    <input type="text" id="anio" name="anio" class="form-control" value="2023" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="ciclo" class="form-label"><strong>Ciclo:</strong></label>
                    <input type="text" id="ciclo" name="ciclo" class="form-control" value="Primera Fase" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="proceso" class="form-label"><strong>Proceso:</strong></label>
                    <input type="text" id="proceso" name="proceso" class="form-control" value="Primera Ceprunsa" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="modalidad" class="form-label"><strong>Modalidad:</strong></label>
                    <input type="text" id="modalidad" name="modalidad" class="form-control" value="Presencial" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="area" class="form-label"><strong>Área:</strong></label>
                    <input type="text" id="area" name="area" class="form-control" value="Ingenierías" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="carrera" class="form-label"><strong>Carrera:</strong></label>
                    <input type="text" id="carrera" name="carrera" class="form-control" value="Ingeniería de Sistemas" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="sede" class="form-label"><strong>Sede:</strong></label>
                    <input type="text" id="sede" name="sede" class="form-control" value="Local 1" readonly>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary">Editar</button>
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
                        <label for="concepto">Elegir un Concepto de Cobro:</label>
                        <select id="concepto" class="form-control">
                            <option>Elegir</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cantidad">0</label>
                        <input type="number" class="form-control" id="cantidad" value="0" min="0">
                    </div>
                    <div class="form-group col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-primary">Agregar</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Columna 1</th>
                        <th>Columna 2</th>
                        <th>Columna 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
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
                <thead class="thead-light">
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
    const inputs = document.querySelectorAll('.tabsSection input');
    const btnEditar = document.getElementById('btn-editar');
    const btnAgregar = document.getElementById('btn-agregar');
    const btnGuardar = document.getElementById('btn-guardar');
    const btnCancelar = document.getElementById('btn-cancelar');

    // Almacenar valores originales para restaurarlos en caso de cancelación
    let valoresOriginales = {};

    function habilitarEdicion() {
      // Guardar los valores originales de los inputs
      valoresOriginales = {};
      inputs.forEach(input => {
        valoresOriginales[input.id] = input.value;
        input.removeAttribute('readonly');
      });

      // Cambiar la visibilidad de los botones
      btnEditar.style.display = 'none';
      btnAgregar.style.display = 'none';
      btnGuardar.style.display = 'inline-block';
      btnCancelar.style.display = 'inline-block';
    }

    function limpiarInputs() {
      // Limpiar los valores y habilitar inputs
      inputs.forEach(input => {
        input.value = '';
        input.removeAttribute('readonly');
      });

      // Cambiar la visibilidad de los botones
      btnEditar.style.display = 'none';
      btnAgregar.style.display = 'none';
      btnGuardar.style.display = 'inline-block';
      btnCancelar.style.display = 'inline-block';
    }

    function guardarCambios() {
      inputs.forEach(input => input.setAttribute('readonly', 'readonly'));
      btnEditar.style.display = 'inline-block';
      btnAgregar.style.display = 'inline-block';
      btnGuardar.style.display = 'none';
      btnCancelar.style.display = 'none';
      alert('Cambios guardados');
    }

    function cancelarEdicion() {
      // Restaurar los valores originales
      inputs.forEach(input => {
        if (valoresOriginales[input.id] !== undefined) {
          input.value = valoresOriginales[input.id];
        }
        input.setAttribute('readonly', 'readonly');
      });

      // Cambiar la visibilidad de los botones
      btnEditar.style.display = 'inline-block';
      btnAgregar.style.display = 'inline-block';
      btnGuardar.style.display = 'none';
      btnCancelar.style.display = 'none';
    }
</script>
<style>
.mainContainer {
    display: grid;
    max-width: 1200px;
    margin: auto;
    padding: 15px 0 55px;
    gap: 10px;
    font-family: sans-serif;
}


/* CONTENEDOR dniContainer */
.dniContainer {
    display: grid;
    grid-template-columns: 1fr 0.4fr;
    gap: 10px;
    & .columnLeft, & .columnRight{
        padding: 20px;
        border: 1px solid #ddd;
        background-color: #fafafa;
        border-radius:5px;
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
    gap: 10px;
}

/* Ocultar los radio buttons */
input[type="radio"] {
    display: none;
}
input:read-only{
    background-color: #e9ecef;
}

.tab {
    padding: 10px 20px;
    background-color: #d7d7d7;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.tab:hover {
    background-color: #b6b6b6;
}

/* Estilo del contenido */
.tab-content-container {
}

.tab-content {
    display: none;
    min-height: 200px;
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
    background-color: #aeaeff;
}


/* CONTENEDOR matricula-section */
.matricula-section {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
    & .container{
        max-width:100%;
        background: #fafafa;
    }
}


/* CONTENEDOR pago-section */
.pago-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    & .columnLeft, & .columnRight{
        border: 1px solid #ddd;
        background-color: #fafafa;
        padding: 20px;
        border-radius: 5px;
        margin-top: 0 !important;
    }
}


/* GENERALES */
img {
    max-width: 180px;
}


.item {
    background-color: lightgray;
    padding: 20px;
    text-align: center;
}

/* SEGUNDO ESTILO */
.datos-container,
.ubicacion-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin: auto;
    font-family: Arial, sans-serif;
}

.input-group {
    display: flex;
    flex-direction: column;
    width: 30%;
    margin-bottom: 15px;
}

input {
    border: 1px solid #ccc;
    padding: 5px;
    border-radius: 4px;
    font-size: 14px;
}

.actions {
    display: flex;
    justify-content: flex-end;
    width: 100%;
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
    padding: 10px;
    cursor: pointer;
    border-radius: 4px;
    background-color: #28a745;
    /* Color verde */
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
    padding: 8px;
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
    thead {
        display: none;
        /* Oculta el encabezado en pantallas pequeñas */
    }

    tr {
        display: block;
        /* Cambia las filas a bloque */
        margin-bottom: 1rem;
        /* Espacio entre filas */
    }

    td {
        display: flex;
        /* Cambia las celdas a flex */
        justify-content: space-between;
        /* Espacio entre contenido de celdas */
        padding-left: 50%;
        /* Espacio para el contenido */
        position: relative;
        /* Posicionamiento relativo para pseudo-elementos */
    }

    td::before {
        content: attr(data-label);
        /* Usa el atributo data-label como etiqueta */
        position: absolute;
        /* Posiciona absolutamente el pseudo-elemento */
        left: 10px;
        /* Espaciado desde la izquierda */
        font-weight: bold;
        /* Negrita para las etiquetas */
    }
}
</style>
</div>
