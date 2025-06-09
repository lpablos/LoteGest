<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatTipoPredio extends Model
{
    //

    use HasFactory;
    use SoftDeletes;

    protected $table = 'cat_tipo_predios';

    protected $fillable = [
        'id',
        'nombre',
    ];
}
