<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    /** @use HasFactory<\Database\Factories\PagoFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'fecha_pago',
        'concepto',
        'metodo_pago',
        'monto',
        'saldo_despues',
        'compra_id',
        'folio_recibo',
        'referencia',
        'observaciones',
        'recibido_por',
        'comprobante_url'

    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
