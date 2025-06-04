<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manzana extends Model
{
    use SoftDeletes;
    protected $table = 'manzanas';

    protected $fillable = [
        'num_lotes',
        'colinda_norte',
        'colinda_sur',
        'colinda_este',
        'colinda_oeste',
        'fraccionamiento_id',
    ];

    public function fraccionamiento()
    {
        return $this->belongsTo(Fraccionamiento::class,'fraccionamiento_id','id');
    }


    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }






}
