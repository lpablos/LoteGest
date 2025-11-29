<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Contrato;
use App\Models\Compra;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class DocumentosController extends Controller
{
    //

    public function vistaPreviaContrato($registro)
    {
        
        $contrato = Contrato::find($registro);
        
        if (!$contrato) {
            abort(404, 'Contrato no encontrado');
        }
        
        $pdf = Pdf::loadView('pdf.contrato', [ 'contrato' => $contrato]);
        return $pdf->stream('contrato_compraventa.pdf');
    }

    public function contratoPDF($registro)
    {
        $contrato = Contrato::find($registro);
        $compra = Compra::find($contrato->compra_id);
        $compra->estatus_id = 3;
        $compra->save();
        if (!$contrato) {
            abort(404, 'Contrato no encontrado');
        }

        if (empty($contrato->codigo_valido_contrato)) {
            $contrato->codigo_valido_contrato = Contrato::generarCodigoUnico();
        }

   
        $qr = base64_encode(
            QrCode::format('svg')
                ->size(120)
                ->errorCorrection('H')
                ->generate($contrato->codigo_valido_contrato)
        );

        $pdf = Pdf::loadView('pdf.contrato', [
            'contrato' => $contrato,
            'qr' => $qr,
        ]);

  
        $nombreArchivo = 'contrato-' . $contrato->id . '.pdf';
        $ruta = 'public/contratos/' . $nombreArchivo;

       
        Storage::put($ruta, $pdf->output());

        $urlPublica = Storage::url($ruta);

    
        $contrato->documento_url = $urlPublica;
        $contrato->save();

    
        return response()->file(storage_path('app/' . $ruta));

     
    }

}
