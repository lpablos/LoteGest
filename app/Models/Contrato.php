<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Compra;

class Contrato extends Model
{
    //
    use SoftDeletes;

    protected $table = 'contratos';

    protected $fillable = [
        'vendedor_propietario_asc',
        'vendedor_representante_asc',
        'comprador_nombre_completo_asc',
        'propietarios_familia_asc',
        'ubicacion_escritura_asc',
        'ubicacion_zona_asc',
        'municipio_estado_asc',
        'textoContrato',
        'textoContratoSegunda',
        'fecha_asc_dato',
        'representante_firma',
        'comprador_firma',
        'observaciones',
        'compra_id',
    ];

    /**
     * Relación: un contrato pertenece a una compra.
     */
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
