<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Contrato;

class DocumentosController extends Controller
{
    //

    public function vistaPreviaContrato($registro)
    {
        
        $contrato = Contrato::find($registro);
        
        if (!$contrato) {
            abort(404, 'Contrato no encontrado');
        }
        // dd($contrato);
        $pdf = Pdf::loadView('pdf.contrato', [ 'contrato' => $contrato]);
        return $pdf->stream('contrato_compraventa.pdf');
    }

    public function contratoPDF($registro)
    {
        
        $contrato = Contrato::find($registro);
        
        if (!$contrato) {
            abort(404, 'Contrato no encontrado');
        }
        // dd($contrato);
        $pdf = Pdf::loadView('pdf.contrato', [ 'contrato' => $contrato]);
        return $pdf->stream('contrato_compraventa.pdf');
    }
}
