<form wire:submit.prevent="{{ $editingMatricula ? 'updateMatricula' : 'createMatricula' }}">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div>
            <label for="name" class="form-label"><strong>Año:</strong></label>
            <input type="text" name="anio" value="{{ $selectedAnio }}" wire:model="selectedAnio" class="form-control"/>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Ciclo',
                'placeholder' => 'Buscar Ciclos...',
                'model' => 'Ciclo',
                'field' => 'name',
                'query' => $selectedCiclo
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Turno',
                'placeholder' => 'Buscar Turnos...',
                'model' => 'Turno',
                'field' => 'name',
                'query' => $selectedTurno
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Modalidad',
                'placeholder' => 'Buscar Modalidades...',
                'model' => 'Modalidad',
                'field' => 'name',
                'query' => $selectedModalidad
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Aula',
                'placeholder' => 'Buscar Aulas...',
                'model' => 'Aula',
                'field' => 'name',
                'query' => $selectedAula
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Sede',
                'placeholder' => 'Buscar Sedes...',
                'model' => 'F_sede',
                'field' => 'nombre',
                'query' => $selectedSede
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Carrera',
                'placeholder' => 'Buscar Carreras...',
                'model' => 'Carrera',
                'field' => 'name',
                'query' => $selectedCarrera
            ])
        </div>
        <div class="col-md-3 mb-3">
            @livewire('search-field', [
                'label' => 'Grupo',
                'placeholder' => 'Buscar Grupos...',
                'model' => 'Grupo',
                'field' => 'name',
                'query' => $selectedGrupo
            ])
        </div>
        <div class="col-md-3 mb-3">
            <div>
            <label for="fvencimiento" class="form-label"><strong>F. Vencimiento:</strong></label>
            <input type="date" name="fvencimiento" value="{{ $fvencimiento }}" wire:model="fvencimiento" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">{{ $editingMatricula ? 'Actualizar' : 'Crear' }} Matrícula</button>
        @if ($editingMatricula)
            <button type="button" wire:click="resetMatriculaFields" class="btn btn-secondary">Cancelar</button>
        @endif
    </div>
</form>
