<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Compra;

class Lindero extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'viento1',
        'colinda1',
        'viento2',
        'colinda2',
        'viento3',
        'colinda3',
        'viento4',
        'colinda4',
    ];

    public function compraLoteLinderos()
    {
        return $this->hasMany(CompraLoteLindero::class);
    }
    // // Relación con compra
    // public function compra()
    // {
    //     return $this->belongsTo(Compra::class);
    // }
}
