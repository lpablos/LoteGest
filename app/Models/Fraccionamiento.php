<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CatTipoPredio;
use App\Models\Manzana;

class Fraccionamiento extends Model
{
    use SoftDeletes;

    protected $table = 'fraccionamientos';

    protected $fillable = [
        'nombre',
        'imagen',
        'responsable',
        'propietaria',
        'superficie',
        'ubicacion',
        'viento1',
        'viento2',
        'viento3',
        'viento4',
        'observaciones',
        'tipo_predios_id',
    ];

    protected $casts = [
        'superficie' => 'decimal:2',
    ];

    /**
     * Relaciones
     */

    // Un fraccionamiento pertenece a un tipo de predio
    public function tipoPredio()
    {
        return $this->belongsTo(CatTipoPredio::class, 'tipo_predios_id');
    }

    // Un fraccionamiento tiene muchas manzanas
    public function manzanas()
    {
        return $this->hasMany(Manzana::class, 'fraccionamiento_id');
    }

    public function lotes()
    {
        return $this->hasManyThrough(Lote::class, Manzana::class);
    }
    
}
