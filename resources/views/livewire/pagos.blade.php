<div>
<div class="container">
    <!-- dni-section -->
    <div class="dni-section">
        <div class="containe">
            <label for="search">Buscar:</label>
            <input type="text" id="search" placeholder="DNI ...">
            <!-- <label for="profileImage">Perfil:</label> -->
            <label class="custom-file-upload" for="profileImage">Subir Perfil</label>
            <input type="file" id="profileImage" accept="image/*">
            <!-- <label for="documentImage">DNI:</label> -->
            <label class="custom-file-upload" for="documentImage">Subir DNI</label>
            <input type="file" id="documentImage" accept="image/*">



        <div class="tabs-informacion">
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
                </div>
                <div class="actions">
                  <button id="btn-editar" onclick="habilitarEdicion()">Editar</button>
                  <button id="btn-agregar" onclick="limpiarInputs()">Agregar</button>
                  <button id="btn-guardar" class="btn-guardar guardar" onclick="guardarCambios()">Guardar</button>
                  <button id="btn-cancelar" class="btn-cancelar cancelar" onclick="cancelarEdicion()">Cancelar</button>
                </div>
            </div>
        </div>
        </div>
        <div class="toggle_perfil-dni">
            <div class="tabs-toggle_perfil-dni">
                <input type="radio" id="toggle-perfil" name="tab-toggle" checked />
                <input type="radio" id="toggle-dni" name="tab-toggle" />
                <div class="tab-labels">
                    <label for="toggle-perfil" class="tab"
                        >Perfil</label
                    >
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
        <div class="item">1fr</div>
    </div>

    <!-- pago-section -->
    <div class="pago-section">
        <div class="item">.8fr</div>
        <div class="item">1fr</div>
    </div>
</div>
<script>
    const inputs = document.querySelectorAll('input');
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
.datos-container,
.ubicacion-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    width: 80%;
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
    background-color: #f1f1f1; /* Color al pasar el mouse sobre la fila */
}

/* Estilos para pantallas pequeñas */
@media (max-width: 600px) {
    thead {
        display: none; /* Oculta el encabezado en pantallas pequeñas */
    }

    tr {
        display: block; /* Cambia las filas a bloque */
        margin-bottom: 1rem; /* Espacio entre filas */
    }

    td {
        display: flex; /* Cambia las celdas a flex */
        justify-content: space-between; /* Espacio entre contenido de celdas */
        padding-left: 50%; /* Espacio para el contenido */
        position: relative; /* Posicionamiento relativo para pseudo-elementos */
    }

    td::before {
        content: attr(data-label); /* Usa el atributo data-label como etiqueta */
        position: absolute; /* Posiciona absolutamente el pseudo-elemento */
        left: 10px; /* Espaciado desde la izquierda */
        font-weight: bold; /* Negrita para las etiquetas */
    }
}
.datos-container,
.ubicacion-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    width: 80%;
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
    background-color: #f1f1f1; /* Color al pasar el mouse sobre la fila */
}

/* Estilos para pantallas pequeñas */
@media (max-width: 600px) {
    thead {
        display: none; /* Oculta el encabezado en pantallas pequeñas */
    }

    tr {
        display: block; /* Cambia las filas a bloque */
        margin-bottom: 1rem; /* Espacio entre filas */
    }

    td {
        display: flex; /* Cambia las celdas a flex */
        justify-content: space-between; /* Espacio entre contenido de celdas */
        padding-left: 50%; /* Espacio para el contenido */
        position: relative; /* Posicionamiento relativo para pseudo-elementos */
    }

    td::before {
        content: attr(data-label); /* Usa el atributo data-label como etiqueta */
        position: absolute; /* Posiciona absolutamente el pseudo-elemento */
        left: 10px; /* Espaciado desde la izquierda */
        font-weight: bold; /* Negrita para las etiquetas */
    }
}
</style>
</div>
