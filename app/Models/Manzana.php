<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Fraccionamiento;
use App\Models\Lote;

class Manzana extends Model
{
   use SoftDeletes;

    protected $table = 'manzanas';

    protected $fillable = [
        'num_manzana',
        'precio_contado',
        'precio_credito',
        'enganche',
        'mensualidades',
        'num_lotes',
        'fraccionamiento_id',
    ];

    protected $casts = [
        'precio_contado'  => 'decimal:2',
        'precio_credito'  => 'decimal:2',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * Relaciones
     */

    // Una manzana pertenece a un fraccionamiento
    public function fraccionamiento()
    {
        return $this->belongsTo(Fraccionamiento::class, 'fraccionamiento_id');
    }

    // Una manzana tiene muchos lotes
    public function lotes()
    {
        return $this->hasMany(Lote::class, 'manzana_id');
    }
}
