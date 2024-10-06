<div>
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

    <h2>Sedes</h2>
    <button wire:click="createSede" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Crear Nueva Sede</button>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Región</th>
                    <th>Ubigeo</th>
                    <th>Anexo</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedes as $sede)
                    <tr>
                        <td>{{ $sede->nombre }}</td>
                        <td>{{ $sede->telefono }}</td>
                        <td>{{ $sede->direccion }}</td>
                        <td>{{ $sede->region }}</td>
                        <td>{{ $sede->ubigueo }}</td>
                        <td>{{ $sede->addresstypecode }}</td>
                        <td>{{ $sede->empresa->nombre }}</td>
                        <td>
                            <button wire:click="editSede({{ $sede->id }})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                            <button wire:click="deleteSede({{ $sede->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $sedes->links() }}

    @if($isOpenSede)
        @include('livewire.sede-form')
    @endif
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para cerrar el modal de sede
    function cerrarModalSede() {
        const botonCerrarSede = document.querySelector('button[wire\\:click="closeModalSede()"]');
        if (botonCerrarSede) {
            botonCerrarSede.click();
        }
    }

    // Detectar clic fuera del modal
    document.addEventListener('click', function(evento) {
        const modalContent = document.querySelector('.modal-content');
        const botonCrearSede = document.querySelector('button[wire\\:click$="Sede"]'); // Asumiendo que el botón para abrir el modal tiene un wire:click que termina en "Sede"

        if (modalContent && !modalContent.contains(evento.target) && evento.target !== botonCrearSede) {
            cerrarModalSede();
        }
    });
});
</script>
