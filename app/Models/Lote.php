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
        'medidas_m',
        'superficie_m2',
        'precio_contado',
        'precio_credito',
        'plano',
        'manzana',
        'colinda_norte',
        'colinda_sur',
        'colinda_oriente',
        'colinda_poniente',
        'observaciones',
        'cat_estatus_disponibilidad_id',
        'fraccionamiento_id',
        // 'frente_m',
        // 'fondo_m',
        // 'manzana_id',
        // 'cat_estatus_id',
        // 'user_corredor_id',
    ];

    // public function manzana()
    // {
    //     return $this->belongsTo(Manzana::class,'manzana_id','id');
    // }

    // public function estatu()
    // {
    //     return $this->belongsTo(CatEstatus::class,'cat_estatus_id','id');
    // }

    public function disponibilidad()
    {
        return $this->belongsTo(CatEstatusDisponibilidad::class,'cat_estatus_disponibilidad_id','id');
    }

    public function fraccionamiento()
    {
        return $this->belongsTo(Fraccionamiento::class,'fraccionamiento_id','id');
    }

    // public function corredor()
    // {
    //     return $this->belongsTo(User::class,'user_corredor_id','id');
    // }
}
