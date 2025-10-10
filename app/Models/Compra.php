<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\CatEntidadFederativa;
use App\Models\CatMunicipio;
use App\Models\Cliente;


class Compra extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'num_solicitud',
        'corredor_id',
        'estado_id',
        'municipio_id',
        'fraccionamiento_id',
        'cliente_id',
    ];

    public function corredor()
    {
        return $this->belongsTo(User::class, 'corredor_id', 'id');
    }

    public function estado()
    {
        return $this->belongsTo(CatEntidadFederativa::class, 'estado_id', 'id');
    }

    public function municipio()
    {
        return $this->belongsTo(CatMunicipio::class, 'municipio_id', 'id');
    }

    public function fraccionamiento()
    {
        return $this->belongsTo(Fraccionamiento::class, 'fraccionamiento_id', 'id');
    }

      public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fraccionamiento_id', 'id');
    }
}
