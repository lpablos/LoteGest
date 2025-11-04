<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatEntidadFederativa extends Model
{
    //

    protected $table = 'cat_entidad_federativas';

    protected $fillable = [
        'id',
        'nom_estado',
    ];
}
