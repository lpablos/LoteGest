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
        'fraccionamiento_id',
        'numero_lote',
        'superficie_m2',
        'frente_m',
        'fondo_m',
        'orientacion',
        'disponible',
        'precio_m2',
        'precio_total',
        'uso',
        'estado_legal',
        'observaciones',
    ];

    public function fraccionamiento()
    {
        return $this->belongsTo(Fraccionamiento::class);
    }
}
