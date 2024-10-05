<div class="container">
    <livewire:sedes-component />
    <livewire:series-component />
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
</div>
