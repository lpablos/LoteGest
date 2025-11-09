<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Compraventa</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
            text-align: justify; /* Justificado */
        }
        h1 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }
        h3 {
            text-align: center;
            /* font-size: 16px; */
            /* margin-bottom: 10px; */
        }

       .text-right {
            text-align: right;
        }

        hr {
            border: 1px dashed #000;
            margin: 15px 0;
        }
        .clausula {
            margin-bottom: 15px;
        }
        .firma {
            margin-top: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .firma div {
            text-align: center;
        }
        .observaciones {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
            text-align: center;
        }

        .tabla-firmas {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-firmas .celda {
            width: 50%;
            padding: 8px;
            vertical-align: middle;
        }

        .tabla-firmas .vacia {
            height: 30px; /* espacio para firma */
            border-bottom: 1px solid #000;
        }

        .tabla-firmas .vendedor {
            text-align: center;
        }

        .tabla-firmas .comprador {
            text-align: center;
        }


        .tabla-firmas {
            border: none;
            /* border-collapse: collapse; */
            width: 100%;
        }

        .tabla-firmas td {
            border: none;
        }

        .tabla-firmas .vacia {
            border: none;
            height: 20px;      /* da un poco de espacio sin línea */
            content: "";        /* asegura que esté vacía */
        }

    </style>
</head>
<body>

<h1>CONTRATO DE COMPRAVENTA</h1>
<p>Contrato de la compraventa que celebran por una parte como VENDEDOR <strong><?php echo e($contrato->vendedor_propietario_asc); ?></strong> 
quienes son <strong>propietarios/copropietarios</strong> y que son representados por <strong><?php echo e($contrato->vendedor_representante_asc); ?></strong>
y por el otro lado como COMPRADOR(A): <strong><?php echo e($contrato->comprador_nombre_completo_asc); ?></strong> los cuales se sujetan al tenor de las siguientes clausulas:</p>

<h3> -------------------------------------------- ANTECEDENTES -------------------------------------------- </h3>

<p>La familia <strong><?php echo e($contrato->propietarios_familia_asc); ?></strong> son <strong>propietarios/copropietarios</strong> de un predio identificado con
<strong><?php echo e($contrato->ubicacion_escritura_asc); ?></strong> ubicado <strong><?php echo e($contrato->ubicacion_zona_asc); ?></strong>denominado como <strong><?php echo e($contrato->denominado_como_asc); ?></strong>
municipio de <strong><?php echo e($contrato->municipio_estado_asc); ?></strong>.</p>

<h3> ----------------------------------------------- CLAUSULAS ----------------------------------------------- </h3>

<h4>PRIMERA. - </h4>
<p><?php echo e($contrato->textoContrato); ?></p>


 <?php echo $contrato->html_tablas; ?>


<h4>SEGUNDA. - </h4>
<p><?php echo e($contrato->textoContratoSegunda); ?></p>

<h4>TERCERA.-</h4>
<p>La responsabilidad de obtención de los permisos de subdivisión, lotificación y servicios recaen íntegramente en el comprador.</p>

<h4>CUARTA.-</h4>
<p>El comprador se compromete a cumplir con los abonos antes mencionados; en caso de incumplir con el tercer abono perderá los derechos 
de su terreno y no se reintegrarán los pagos realizados.</p>

<h4>QUINTA.-</h4>
<p>La escrituración y los gastos que se generen de este mismo quedarán a cargo del comprador.</p>

<h4>SEXTA.-</h4>
<p>Ambas partes aceptan el presente contrato en todos y cada uno de sus términos de conformidad, por lo que firman al calce.</p>

<h4>SEPTIMA.-</h4>
<p>Ambas partes manifiestan que en el presente contrato no existió error, dolo, mala fe, ni ningún otro vicio de la voluntad que pudiera invalidarlo.</p>
<p class="text-right"><?php echo e($contrato->fecha_asc_dato); ?></p>

<!-- Firmas -->
<table class="tabla-firmas">
  <tr>
    <td class="celda vacia"></td>
    <td class="celda vacia"></td>
  </tr>
  <tr>
    <td class="celda vendedor"> ______________________________<br/><strong><?php echo e($contrato->representante_firma); ?></strong><br>Representante de los Vendedores</td>
    <td class="celda comprador">______________________________<br/<strong><?php echo e($contrato->comprador_firma); ?></strong><br>Comprador </td>
  </tr>
</table>

<!-- Observaciones -->
<div class="observaciones">
    <?php if($contrato->observaciones !== 'Ninguna'): ?>
        <p><strong>OBSERVACIONES:</strong></p>
        <p><?php echo e($contrato->observaciones); ?></p>
    <?php endif; ?>
</div> 

</body>
</html>
<?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pdf/contrato.blade.php ENDPATH**/ ?>