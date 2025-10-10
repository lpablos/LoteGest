<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Compra;
use App\Models\Lote;
use App\Models\Lindero;


class CompraLoteLindero extends Model
{
    //
    use SoftDeletes;

    protected $table = 'compra_lote_linderos';

    protected $fillable = [
        'compra_id',
        'lote_id',
        'lindero_id',
        'descripcion',
    ];

    // Relaciones
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function lindero()
    {
        return $this->belongsTo(Lindero::class);
    }
}
