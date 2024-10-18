<div class="columnRight mt-5">
    <h2 class="mb-4">Hisotrial de Pagos</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Serie</th>
                <th>Correlativo</th>
                <th>Monto Pagado</th>
                <th>Saldo Pendiente</th>
            </tr>
        </thead>
        <tbody>
            @forelse (optional(optional($userform)->user)->comprobantes??[] as $comprobante)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($comprobante->fechaEmision)->format('d/m/Y') }}</td>
                    <td>{{ $comprobante->serie }}</td>
                    <td>{{ $comprobante->correlativo }}</td>
                    <td>{{ $comprobante->monto_pagado_total }}</td>
                    <td>{{ $comprobante->saldo_pendiente_total }}</td>
                </tr>
            @empty
                <tr>
                    <td>1</td>
                    <td>Enero</td>
                    <td>A001</td>
                    <td>1500.00</td>
                    <td>500.00</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
