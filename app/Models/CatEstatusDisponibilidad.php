<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatEstatusDisponibilidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cat_estatus_disponibilidad';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
