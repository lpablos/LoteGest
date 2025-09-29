<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CatEstatusDisponibilidad;
use App\Models\Manzana;

class Lote extends Model
{
    //
    use SoftDeletes;

    protected $table = 'lotes';

    protected $fillable = [
        'num_lote',
        'medidas_m',
        'superficie_m2',
        'plano',
        'precio_contado',
        'precio_credito',
        'enganche',
        'mensualidades',
        'observaciones',
        'cat_estatus_disponibilidad_id',
        'manzana_id',
    ];

    protected $casts = [
        'superficie_m2'   => 'decimal:2',
        'precio_contado'  => 'decimal:2',
        'precio_credito'  => 'decimal:2',
    ];

    /**
     * Relaciones
     */

    // Un lote pertenece a un estatus de disponibilidad
    public function estatusDisponibilidad()
    {
        return $this->belongsTo(CatEstatusDisponibilidad::class, 'cat_estatus_disponibilidad_id');
    }

    // Un lote pertenece a una manzana
    public function manzana()
    {
        return $this->belongsTo(Manzana::class, 'manzana_id');
    }
}
