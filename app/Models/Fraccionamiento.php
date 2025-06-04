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
        'predio_urbano',
        'superficie',
        'ubicacion',
        'proyecto_id',
        'observaciones',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

    public function manzanas()
    {
        return $this->hasMany(Manzana::class);
    }
    
}
