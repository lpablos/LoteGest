@php
    $nombreCompleto = trim(($cliente->nombre ?? '') . ' ' . ($cliente->primer_apellido ?? '') . ' ' . ($cliente->segundo_apellido ?? ''));

    function numeroALetras($numero) {
        $formatter = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        return ucfirst($formatter->format($numero)) . ' pesos';
    }
    $montoPagado = $compra->total_venta - $pago->saldo_despues;
@endphp

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

.
0..<style>
body {
    font-family: "Segoe UI", "Helvetica Neue", Arial, sans-serif;
    font-size: 12px;
    color: #2c3e50;
    margin: 0;
}

.recibo {
    width: 100%;
    max-width: 700px;
    margin: 0 auto;
    border: 1.5px solid #2c3e50;
    border-radius: 16px;
    padding: 14px;
    box-sizing: border-box;
}

/* TABLA */
table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

/* 50 / 50 */
colgroup col {
    width: 16.66%;
}

/* 🔥 CELDAS DINÁMICAS Y CENTRADAS */
td {
    border: 1px solid #e0e0e0;
    padding: 8px 10px;
    vertical-align: middle; /* 🔥 clave */

    white-space: normal;
    word-break: break-word;
    overflow-wrap: break-word;
}

/* ALINEACIONES */
.center { text-align: center; }
.left { text-align: left; }

/* HEADER */
.header-dark {
    background: #2f3e52;
    color: #fff;
    font-weight: 600;
    font-size: 13px;
}

/* SUB */
.subheader {
    background: #f1f3f5;
    font-weight: 600;
}

/* LABEL */
.gris {
    background: #f7f9fb;
    font-weight: 600;
    color: #5a6b7b;
}

/* TEXTO */
.wrap {
    line-height: 1.5;
}

/* FOLIO */
.folio {
    color: #c0392b;
    font-weight: 700;
}

/* IMPORTE */
.importe {
    font-weight: 600;
}

/* FIRMA */
.firma-box {
    height: 110px;
    vertical-align: bottom;
    text-align: center;
}

.firma-linea {
    border-top: 1px solid #555;
    width: 75%;
    margin: 0 auto;
    padding-top: 4px;
    font-size: 10px;
    color: #555;
}

/* FOOTER */
.footer {
    text-align: center;
    font-size: 10px;
    margin-top: 10px;
    color: #7a7a7a;
}
</style>

</head>

<body>

<div class="recibo">

<table>

    <colgroup>
        <col><col><col><col><col><col>
    </colgroup>

    <!-- TITULO -->
    <tr>
        <td colspan="6" class="header-dark center">
            RECIBO DE FRACCIONAMIENTOS
        </td>
    </tr>

    <!-- SUB -->
    <tr>
        <td colspan="3" class="subheader center">Datos de Pago</td>
        <td colspan="3" class="subheader center">Datos de compra</td>
    </tr>

    <!-- FOLIO -->
    <tr>
        <td class="gris">Folio</td>
        <td colspan="2" class="folio left">
            {{ $pago->folio_recibo ?? 'N/A' }}
        </td>
        <td class="gris">Fecha</td>
        <td colspan="2">
            {{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->translatedFormat('d \\d\\e F \\d\\e\\l Y') : '' }}
        </td>
       
    </tr>

    <!-- CLIENTE -->
    <tr>
        <td class="gris">Recibo de</td>
        <td colspan="2" class="wrap left">
            {{ $nombreCompleto }}
        </td>

        <td class="gris">Nombre del predio</td>
        <td colspan="2" class="wrap left">
            {{ $contrato->denominado_como_asc ?? '' }}
        </td>
    </tr>

    <!-- IMPORTE -->
    <tr>
        <td class="gris">Importe</td>
        <td colspan="2" class="importe wrap left">
            ${{ number_format($pago->monto ?? 0, 2) }}
            ({{ numeroALetras($pago->monto ?? 0) }})
        </td>

        <td class="gris">Ubicación</td>
        <td colspan="2" class="wrap left">
            {{ ($contrato->ubicacion_zona_asc ?? '') . ', ' . ($contrato->municipio_estado_asc ?? '') }}
        </td>
    </tr>

    <!-- CONCEPTO -->
    <tr>
        <td class="gris">Concepto</td>
        <td colspan="2" class="wrap left">
            {{ $pago->concepto ?? '' }}
        </td>

        <td class="gris">Tipo</td>
        <td colspan="2" class="left">
            {{ ucfirst($pago->metodo_pago ?? '') }}
        </td>
    </tr>

    <!-- PAGOS -->
    <tr>
        <td class="gris">Pagado</td>
        
        <td colspan="2">$ **{{ number_format( $montoPagado ?? 0, 2) }}</td>

        <td rowspan="3" colspan="3" class="firma-box">
            <div class="firma-linea">
                {{ $cobrador ? ($cobrador->nombre . ' ' . $cobrador->primer_apellido) : 'Firma' }}
            </div>
        </td>
    </tr>

    <tr>
        <td class="gris">Adeudo</td>
        <td colspan="2" class="left">
            ${{ number_format($pago->saldo_despues ?? 0, 2) }}
        </td>
    </tr>

    <tr>
        <td class="gris">Observaciones</td>
        <td colspan="2" class="wrap left">
            {{ $pago->observaciones ?? '' }}
        </td>
    </tr>

</table>

<div class="footer">
    Este recibo no es un comprobante fiscal. Consérvelo como comprobante parcial de pago.
</div>

</div>

</body>
</html>