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
        'viento1',
        'viento2',
        'viento3',
        'viento4',
        'enganche',
        'mensualidades',
        'observaciones',
        'cat_estatus_disponibilidad_id',
        'fraccionamiento_id',
    ];

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
