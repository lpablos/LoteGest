<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{

    protected $table = 'configuracion';

    protected $fillable = [
        'nombre_empresa',
        'direccion',
        'telefono',
        'email'
    ];
}
