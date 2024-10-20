<div class="columnLeft mt-4">
    <h2>Comprobante de Pago</h2>

    <form id="formComprobantePago" wire:submit="saveComprobantePago">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="doc">Doc:</label>
                <select id="doc" class="form-control" wire:model.live='slctSerie' required>
                    <option value="">Elegir</option>
                    @forelse ($series as $serie)
                        <option value="{{ $serie->id }}">{{ $serie->serie }}</option>
                    @empty
                        <option value="">sin registro</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="femision">F. Emisión:</label>
                <input type="date" class="form-control" id="femision" min="{{ $fecha_minima }}"
                    wire:model.live='fecha_emision'
                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                    wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro"
                    required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cuenta">Cuenta:</label>
                <select id="cuenta" class="form-control" wire:model.live='slctCuenta' required>
                    <option value="">Elegir</option>
                    @forelse ($cuentas as $cuenta)
                        <option value="{{ $cuenta->id }}">{{ $cuenta->name }}</option>
                    @empty
                        <option value="">sin registro</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="mpago">M. Pago:</label>
                <select id="mpago" class="form-control" wire:model='slctMetodoPago'
                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                    wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro"
                    required>
                    <option value="">Elegir</option>
                    @forelse ($metodoPagos as $metodoPago)
                        <option value="{{ $metodoPago->name }}">{{ $metodoPago->name }}</option>
                    @empty
                        <option value="">sin opciones</option>
                    @endforelse
                </select>
            </div>
        </div>
        @if ($tipoCuentaVirtual)
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="vaucher">Vaucher:</label>
                    <input type="text" class="form-control" id="vaucher" wire:model='file_vaucher'
                        wire:loading.attr="disabled"
                        wire:loading.class="cursor-not-allowed-important medio-opaco"
                        wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="noperacion">N. Operación:</label>
                    <input type="text" class="form-control" id="noperacion"
                        wire:model='nro_operacion' wire:loading.attr="disabled"
                        wire:loading.class="cursor-not-allowed-important medio-opaco"
                        wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro"
                        required>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="form-group col-7">

                <div x-data="{
                    selectedIndex: 0,
                    query: @entangle('query'),
                    dataresults: @entangle('dataresults'),
                    selectedItem: null,
                    selectCurrent(i = null) {
                        if (i !== null) {
                            this.selectedIndex = i;
                        }
                        var item = null
                        if (this.query) {
                            var item = this.dataresults[this.selectedIndex];
                        }
                        if (item) {
                            this.query = item.concepto_cobro_name;
                            this.selectedItem = item; // Guardar el elemento seleccionado
                            this.dataresults = [];
                            this.selectedIndex = 0;
                            $wire.select_Item(this.selectedItem.id);
                        }
                    }
                    }" class="relative col">
                    <input type="text" x-model="query" @input="$wire.set('query', query)"
                        @keydown.arrow-up.prevent="selectedIndex = Math.max(selectedIndex - 1, 0)"
                        @keydown.arrow-down.prevent="selectedIndex = Math.min(selectedIndex + 1, dataresults.length - 1)"
                        @keydown.enter.prevent="selectCurrent()" placeholder="Buscar Cobros..."
                        class="form-control">

                    <!-- Mostrar la lista solo si hay resultados y el query no está vacío -->
                    <ul class="list-group mt-2 position-absolute w-100 bg-white"
                        x-show="dataresults.length > 0 && query.length > 0" style="z-index: 1000;">
                        <template x-for="(result, i) in dataresults" :key="i">
                            <li :class="{ 'active': selectedIndex === i }"
                                class="list-group-item text-sm px-2 py-1"
                                @click="selectCurrent(i); $wire.select_Item(result.id);"
                                @mouseover="selectedIndex = i" x-text="result.concepto_cobro_name">
                            </li>
                        </template>
                    </ul>

                    <!-- Mostrar los detalles del elemento seleccionado -->
                    <div class="mt-4 d-none" x-show="selectedItem">
                        <h4>Detalles del Cobro seleccionado</h4>
                        <p><strong>Nombre:</strong> <span
                                x-text="selectedItem ? selectedItem.concepto_cobro_name : ''"></span></p>
                        <p><strong>Descripción:</strong> <span
                                x-text="selectedItem ? selectedItem.id : ''"></span></p>
                        <p><strong>Precio:</strong> <span
                                x-text="selectedItem ? selectedItem.costo : ''"></span></p>
                    </div>
                </div>

            </div>
            <div class="form-group col-3">
                <input type="number" class="form-control col" id="cantidad" value="0" required
                    min="0" max="{{ $montoTotalConcepto }}" wire:model='montoCobro'
                    wire:loading.attr="disabled"
                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                    wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro">
                <div class="text-sm text-red">
                    @error('montoCobro')
                        {{ $message }}
                    @enderror
                </div>
                <input type="hidden" class="form-control" id="montoTotalConcepto"
                    wire:model='montoTotalConcepto'>
                <input type="hidden" class="form-control" id="conceptoName" wire:model='conceptoName'>
            </div>
            <div class="form-group col-2 d-flex align-items-start ">
                <button type="submit" class="btn btn-primary col" {{ $disabledAddConcepto }}
                    form="form-montoCobro" wire:click='addConceptoCobro'
                    wire:loading.class="cursor-not-allowed-important medio-opaco"
                    wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro">Agregar</button>
            </div>
        </div>
    </form>
    <div wire:loading wire:target="addConceptoCobro">Loading...</div>
    <table class="table table-bordered mt-3">
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
            @forelse ($comprobanteDetalles as $comprobanteDetalle)
                <tr>
                    <td>{{ $comprobanteDetalle->codigo }}</td>
                    <td>{{ $comprobanteDetalle->concepto }}</td>
                    <td>{{ $comprobanteDetalle->importeConceptoPendiente }}</td>
                    <td>S/. {{ number_format($comprobanteDetalle->importeConceptoPagar, 2) }}</td>
                    <td><button id="cancel-image-perfil" class="btn-icon"
                            wire:click="removeConceptoCobro('{{ $comprobanteDetalle->codigo }}')"
                            wire:loading.class="cursor-not-allowed-important medio-opaco"
                            wire:target="slctSerie, slctCuenta, select_Item, addConceptoCobro, removeConceptoCobro, saveComprobantePago">❌</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>-</td>
                    <td>Agregue conceptos</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforelse
            <tr>
                <td></td>
                <td><div class="text-sm text-red">@error('dto_comprobante_pagoform.user_id') {{ '* '.$message }} @enderror</div></td>
                <td></td>
                <td><b>Total:</b> <br />
                    S/. {{ number_format($comprobanteDetalles->sum('importeConceptoPagar'), 2) }}</td>
                <td>
                    @if ($comprobanteDetalles->count())
                        <button form="formComprobantePago">Guardar</button>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
