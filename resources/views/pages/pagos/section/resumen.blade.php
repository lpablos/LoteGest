
<div class="row">

    <!-- 70% TABLA -->
    <div class="col-md-12 mx-auto">
        <div class="table-responsive">
          <table class="table table-bordered table-sm w-100 align-middle">
            <tbody>

                <!-- ESTADO FINANCIERO -->
                <tr class="table-secondary">
                    <th colspan="6">Estado Financiero del Contrato</th>
                </tr>

                <tr>
                    <th>Total Venta</th>
                    <td>
                        $ {{ number_format($compra->total_venta, 2) }}
                    </td>
                    <th>Saldo Actual</th>
                    <td class="fw-bold text-danger">
                        $ {{ number_format($saldoActual ?? 0, 2) }}
                    </td>

                    <th>Total Pagado</th>
                    <td class="fw-bold text-success">
                        $ {{ number_format($totalPagos ?? 0, 2) }}
                    </td>

                   
                </tr>

                <!-- PLAN DE PAGOS -->
                <tr class="table-secondary">
                    <th colspan="6">Plan de Pagos</th>
                </tr>

                <tr>
                    <th>Pago Mensual</th>
                    <td>$ {{ number_format($compra->pago_mensual_venta ?? 0, 2) }}</td>

                    <th>Mensualidades</th>
                    <td>{{ $compra->mensualidad_venta_select }}</td>

                    <th>Num Pagos</th>
                    <td> {{ $numPagos ?? 0 }} Registros</td>
                </tr>

                <!-- DATOS DEL CONTRATO -->
                <tr class="table-secondary">
                    <th colspan="6">Datos del Contrato</th>
                </tr>

                <tr>
                    <th>Cliente</th>
                    <td>{{ $cliente->nombre ?? '' }} {{ $cliente->primer_apellido ?? '' }}</td>

                    <th>Solicitud</th>
                    <td>{{ $compra->num_solicitud_sistema }}</td>

                    <th>Contrato</th>
                    <td>{{ $contrato->codigo_valido_contrato }}</td>
                </tr>

            </tbody>
        </table>
        </div>
    </div>


</div>
