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
        'nombre',
        'imagen',
        'reponsable',
        'propietaria',
        'superficie',
        'ubicacion',
        'proyecto_id',
        'observaciones',
        'tipo_predios_id',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

    public function manzanas()
    {
        return $this->hasMany(Manzana::class);
    }

     public function predio()
    {
        return $this->belongsTo(CatTipoPredio::class,'tipo_predios_id','id');
    }
    
}
