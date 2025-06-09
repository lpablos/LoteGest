<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'responsable_proyecto',
        // 'clave',
        'observaciones',
        // 'estatus_proyecto_id',
    ];

    // public function estatus()
    // {
    //     return $this->belongsTo(CatEstatusProyecto::class, 'estatus_proyecto_id','id');
    // }

    // public function fraccionamientos()
    // {

        // return $this->hasMany(Fraccionamiento::class);
        //    return $this->hasMany(Fraccionamiento::class)->orderByDesc('nombre');
    // }

    // protected $appends = ['cantidad_fraccionamientos_registros'];

    // public function getCantidadFraccionamientoRegistrosAttribute()
    // {
    //     return $this->fraccionamientos()->count();
    // }

   
}
