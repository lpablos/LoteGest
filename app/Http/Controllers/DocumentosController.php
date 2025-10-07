<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentosController extends Controller
{
    //

    public function vistaPreviaContrato()
    {
         $data = [
            'vendedor' => 'FAMILIA PINEDA',
            'representante' => 'LA ARQ TANIA MEDINA MARCOS',
            'comprador' => 'CARLOS',
            'escritura' => '1,354',
            'registro' => '13, tomo 14',
            'notario' => '3',
            'ubicacion' => 'AL ORIENTE DE LA CIUDAD DE ZACAPU',
            'nombre_predio' => 'LA CIENEGA',
            'municipio' => 'ZACAPU',
            'estado' => 'MICHOACAN',
            'lotes' => '3 4 5',
            'manzana' => '3',
            'superficie' => '384 m2 / 00-03-84.00 has',
            'precio_total' => '$348,000.00',
            'enganche' => '$34,800.00',
            'restante' => '$313,200.00',
            'mensualidades' => '24',
            'monto_mensual' => '$13,050.00',
            'fecha' => '31 de enero de 2025',
        ];
        $pdf = Pdf::loadView('pdf.contrato', $data);
        return $pdf->stream('contrato_compraventa.pdf');
    }
}
