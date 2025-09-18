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
        'viento1',
        'viento2',
        'viento3',
        'viento4',
        'manzanas',
        'observaciones',
        'tipo_predios_id',
    ];

    protected $appends = ['lotes_total'];
      
    public function getLotesTotalAttribute()
    {
        return $this->lotes()->count();
    }

    public function lotes(){        
        return $this->hasMany(Lote::class);
    }

     public function predio()
    {
        return $this->belongsTo(CatTipoPredio::class,'tipo_predios_id','id');
    }
    
}
