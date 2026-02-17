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
 
        foreach ($contrato->compra->compralotelinderos as $item) {
            // Aqui cuando se compra un lote
            // Ya sea de contado o a credito, el lote se marca como 
            // Indica que se encuentra reservado (reservado con contrato y enganche).
            // Hasta que no se realize le pago total queda en Vendido (Indica que se encuentra vendido, liquidado en su totalidad.)
            
            $item->lote->disponibilidad_id = 3;
            $item->lote->save();
        }

        
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


    public function verDocumento($id)
    {
        $contrato = Contrato::findOrFail($id);

        // Valor almacenado en DB: storage/contratos/archivo.pdf
        $ruta = storage_path('app/public/' . str_replace('storage/', '', $contrato->documento_url));

        if (!file_exists($ruta)) {
            abort(404, "El documento no existe.");
        }

        return response()->file($ruta);
    }


}
