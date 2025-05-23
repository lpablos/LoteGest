<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fraccionamiento extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $fillable = [
        'proyecto_id',
        'nombre',
        'superficie_m2',
        'cantidad_lotes',
        'uso_predominante',
        'etapa',
        'servicios_disponibles',
        'observaciones',
    ];

    protected $casts = [
        'servicios_disponibles' => 'array',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }
}
