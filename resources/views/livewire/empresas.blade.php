<div class="container">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-md-12">
            <button wire:click="create()" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Nueva Empresa</button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-auto">
            <select class="form-select" wire:model.live="n_pagina">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    @if ($empresas->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nombre }}</td>
                            <td>{{ $empresa->ruc }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>
                                <button wire:click="edit({{ $empresa->id }})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                <button wire:click="delete({{ $empresa->id }})" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar esta empresa?')">
                                        <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $empresas->links() }}
        </div>
    @else
        <p>No hay empresas registradas.</p>
    @endif

    @if($isOpen)
        <div class="modal show d-block" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);backdrop-filter: blur(2px);overflow-x: hidden;overflow-y: auto;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $empresa_id ? 'Editar Empresa' : 'Crear Nueva Empresa' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" wire:model="nombre">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="ruc">RUC</label>
                                <input type="text" class="form-control" id="ruc" wire:model="ruc">
                                @error('ruc') <span class="text-danger">{{ $message }}</span> @enderror
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
                                <label for="tokenapisperu">Token API Perú</label>
                                <input type="text" class="form-control" id="tokenapisperu" wire:model="tokenapisperu">
                                @error('tokenapisperu') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <style>
                        /* Estilo para el fondo del modal */
                        .modal {
                            cursor: pointer;
                        }
                        /* Mantener el cursor normal dentro del contenido del modal */
                        .modal-content {
                            cursor: default;
                        }
                        /* Asegurar que los elementos interactivos dentro del modal mantengan su cursor */
                        .modal-content :is(button, select, a){
                            cursor: pointer;
                        }
                        .modal-content input{
                            cursor: initial;
                        }
                    </style>
                    <div class="modal-footer">
    @if($empresa_id)
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Actualizar</button>
    @else
        <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
    @endif
    <button type="button" wire:click="closeModal()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
                </div>
            </div>
        </div>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Función para cerrar el modal
    function cerrarModal() {
        const botonCerrar = document.querySelector('button[wire\\:click="closeModal()"]');
        if (botonCerrar) {
            botonCerrar.click();
        }
    }

    // Detectar clic fuera del modal
    document.addEventListener('click', function(evento) {
        const modal = document.querySelector('.modal-content');
        const botonCrear = document.querySelector('button[wire\\:click="create()"]');

        if (modal && !modal.contains(evento.target) && evento.target !== botonCrear) {
            cerrarModal();
        }
    });
});
</script>