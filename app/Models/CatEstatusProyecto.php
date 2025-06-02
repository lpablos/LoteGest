<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatEstatusProyecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cat_estatus_proyectos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

     public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
