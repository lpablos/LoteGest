
<div class="table-responsive d-flex justify-content-center align-items-center">
 
    <table class="table table-bordered table-sm w-100 align-middle text-nowrap">
        <tbody>

            <!-- ================= ESTADO FINANCIERO ================= -->
            <tr class="table-secondary">
                <th colspan="8">Estado Financiero del Contrato</th>
            </tr>

            <tr>
                <th>Saldo Actual</th>
                <td class="fw-bold text-danger">
                    $ {{ number_format($saldo_actual ?? 0, 2) }}
                </td>

                <th>Total Pagado</th>
                <td class="fw-bold text-success">
                    $ {{ number_format($total_pagado ?? 0, 2) }}
                </td>

                <th>Total Venta</th>
                <td>
                    $ {{ number_format($compra->total_venta, 2) }}
                </td>

                <th>Enganche</th>
                <td>
                    $ {{ number_format($compra->enganche_venta, 2) }}
                </td>
            </tr>

            <!-- ================= PLAN DE PAGOS ================= -->
            <tr class="table-secondary">
                <th colspan="8">Plan de Pagos</th>
            </tr>

            <tr>
                <th>Pago Mensual</th>
                <td class="fw-bold">
                    $ {{ number_format($compra->pago_mensual_venta ?? 0, 2) }}
                </td>

                <th>Mensualidades</th>
                <td>
                    {{ $compra->mensualidad_venta_select }}
                </td>

                <th>Mensualidades Pagadas</th>
                <td>
                    {{ $mensualidades_pagadas ?? 0 }}
                </td>

                <th>Monto Mensual</th>
                <td>
                    $ {{ number_format($monto_mensual ?? 0, 2) }}
                </td>
            </tr>

            <!-- ================= DATOS DEL CONTRATO ================= -->
            <tr class="table-secondary">
                <th colspan="8">Datos del Contrato</th>
            </tr>

            <tr>
                <th>Cliente</th>
                <td>
                    {{ $cliente->nombre ?? '' }}
                    {{ $cliente->primer_apellido ?? '' }}
                    {{ $cliente->segundo_apellido ?? '' }}
                </td>

                <th>Solicitud</th>
                <td>
                    {{ $compra->num_solicitud_sistema }}
                </td>

                <th>Contrato</th>
                <td>
                    {{ $contrato->codigo_valido_contrato }}
                </td>

                <th>Estado</th>
                <td>
                    <span class="badge bg-success">Activo</span>
                </td>
            </tr>

        </tbody>
    </table>

</div>
