<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mt-5">Series</h2>
    <button wire:click="createSerie" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Crear Nueva Serie</button>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Tipo Comprobante</th>
                    <th>Serie</th>
                    <th>Correlativo</th>
                    <th>Fecha</th>
                    <th>Sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                    <tr>
                        <td>{{ $serie->tipo_comprobante->descripcion ?? 'N/A' }}</td>
                        <td>{{ $serie->serie }}</td>
                        <td>{{ $serie->correlativo }}</td>
                        <td>{{ $serie->fecha_emision }}</td>
                        <td>{{ $serie->sede->nombre ?? 'N/A' }}</td>
                        <td>
                            <button wire:click="editSerie({{ $serie->id }})" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                            <button wire:click="deleteSerie({{ $serie->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $series->links() }}

    @if($isOpenSerie)
        @include('livewire.serie-form')
    @endif
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para cerrar el modal de serie
    function cerrarModalSerie() {
        const botonCerrarSerie = document.querySelector('button[wire\\:click="closeModalSerie()"]');
        if (botonCerrarSerie) {
            botonCerrarSerie.click();
        }
    }

    // Detectar clic fuera del modal
    document.addEventListener('click', function(evento) {
        const modalContent = document.querySelector('.modal-content');
        const botonCrearSerie = document.querySelector('button[wire\\:click$="Serie"]'); // Asumiendo que el botón para abrir el modal tiene un wire:click que termina en "Serie"

        if (modalContent && !modalContent.contains(evento.target) && evento.target !== botonCrearSerie) {
            cerrarModalSerie();
        }
    });
});
</script>
