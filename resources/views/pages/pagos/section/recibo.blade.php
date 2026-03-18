<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #333;
        }

        .recibo {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            border: 1px solid #444;
            border-radius: 6px;
            padding: 15px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 4px;
            word-wrap: break-word;
        }

        .header {
            border-bottom: 2px solid #2f5fa5;
            margin-bottom: 10px;
            padding-bottom: 8px;
        }

        .titulo {
            background: #2f5fa5;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            font-size: 13px;
            border-radius: 4px;
        }

        .empresa {
            text-align: center;
            font-size: 10px;
        }

        .folio {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            color: #c62828;
        }

        .label {
            font-weight: bold;
        }

        .linea {
            border-bottom: 1px solid #999;
            padding: 2px 4px;
            display: inline-block;
            width: 100%;
        }

        .firma {
            margin-top: 35px;
            text-align: right;
        }

        .linea-firma {
            border-top: 1px solid #000;
            width: 180px;
            margin-left: auto;
            text-align: center;
            font-size: 10px;
            padding-top: 3px;
        }
    </style>
</head>
<body>

@php
    $nombreCompleto = $cliente->nombre . ' ' . $cliente->primer_apellido . ' ' . $cliente->segundo_apellido;
    $adeudo = $pago->saldo_despues ?? 0;

    function numeroALetras($numero) {
        $formatter = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        return ucfirst($formatter->format($numero)) . ' pesos';
    }
@endphp

<div class="recibo">

    <!-- HEADER -->
    <table class="header">
        <tr>
            <td style="width: 25%;">
                <span class="titulo">RECIBO</span>
            </td>

            <td class="empresa" style="width: 50%;">
                <strong>Recibo de Pago</strong><br>
                Sistema de Ventas
            </td>

            <td class="folio" style="width: 25%;">
                No. {{ $pago->id }}
            </td>
        </tr>
    </table>

    <!-- FECHA / CLIENTE -->
    <table>
        <tr>
            <td>
                <span class="label">Fecha:</span><br>
                <span class="linea">
                    {{ \Carbon\Carbon::parse($pago->created_at)->format('d/m/Y') }}
                </span>
            </td>

            <td>
                <span class="label">Recibí de:</span><br>
                <span class="linea">
                    {{ $nombreCompleto }}
                </span>
            </td>
        </tr>
    </table>

    <!-- IMPORTE + LETRAS (🔥 CORREGIDO) -->
    <div style="margin-top:10px;">
        <span class="label">Importe:</span><br>
        <span class="linea">
            ${{ number_format($pago->monto, 2) }} 
            ({{ numeroALetras($pago->monto) }})
        </span>
    </div>

    <!-- CONCEPTO -->
    <div style="margin-top:10px;">
        <span class="label">Concepto:</span><br>
        <span class="linea">
            Pago de {{ $compra->venta_tp ?? 'crédito' }} 
            del contrato {{ $contrato->denominado_como_asc ?? '' }}
        </span>
    </div>

    <!-- MÉTODO / ESTADO -->
    <table style="margin-top:10px;">
        <tr>
            <td>
                <span class="label">Método de pago:</span><br>
                <span class="linea">
                    {{ ucfirst($pago->metodo_pago) }}
                </span>
            </td>

            <td>
                <span class="label">Estado:</span><br>
                <span class="linea">
                    Pagado
                </span>
            </td>

            <td>
                <span class="label">Adeudo:</span><br>
                <span class="linea">
                    ${{ number_format($adeudo, 2) }}
                </span>
            </td>
        </tr>
    </table>
    @if(!empty($pago->observaciones))
        <div style="margin-top:10px;">
            <span class="label">Observaciones:</span><br>
            <span class="linea">
                {{ $pago->observaciones }}
            </span>
        </div>
    @endif

    <!-- FIRMA -->
    <div class="firma">
        <div class="linea-firma">Firma</div>
    </div>

</div>

</body>
</html>