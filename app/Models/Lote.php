<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lote extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'num_lote',
        // 'frente_m',
        // 'fondo_m',
        'medidas_m',
        'superficie_m2',
        'precio_contado',
        'precio_credito',
        'plano',
        'observaciones',
        'manzana_id',
        'cat_estatus_id',
        'cat_estatus_disponibilidad_id',
    ];

    public function manzana()
    {
        return $this->belongsTo(Manzana::class,'manzana_id','id');
    }

    public function estatu()
    {
        return $this->belongsTo(CatEstatus::class,'cat_estatus_id','id');
    }

    public function disponibilidad()
    {
        return $this->belongsTo(CatEstatusDisponibilidad::class,'cat_estatus_disponibilidad_id','id');
    }
}
