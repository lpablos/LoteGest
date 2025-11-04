<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CatTipoPredio;
use App\Models\Manzana;
use App\Models\CatEntidadFederativa;

class Fraccionamiento extends Model
{
    use SoftDeletes;

    protected $table = 'fraccionamientos';

    protected $fillable = [
        'nombre',
        'imagen',
        'responsable',
        'propietaria',
        'superficie',
        'ubicacion',
        'viento1',
        'viento2',
        'viento3',
        'viento4',
        'observaciones',
        'tipo_predios_id',
        'entidad_fed_id',
        'municipio_id',
        'datos_propiedad',
        'tipo_predio_nombre'
    ];

    protected $casts = [
        'superficie' => 'decimal:2',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $appends = ['municipio_nombre', 'entidad_nombre','tipo_predio_nombre'];


    public function getMunicipioNombreAttribute()
    {
        return $this->municipio ? $this->municipio->nom_mpio : null;
    }

    public function getEntidadNombreAttribute()
    {
        return $this->entidadFederativa ? $this->entidadFederativa->nom_estado : null;
    }

    public function getTipoPredioNombreAttribute()
    {
        return $this->tipoPredio ? $this->tipoPredio->nombre : null; 
    }

    /**
     * Relaciones
     */

    // Un fraccionamiento pertenece a un tipo de predio
    public function tipoPredio()
    {
        return $this->belongsTo(CatTipoPredio::class, 'tipo_predios_id');
    }

    public function entidadFederativa()
    {
        return $this->belongsTo(CatEntidadFederativa::class, 'entidad_fed_id');
    }

    public function municipio()
    {
        return $this->belongsTo(CatMunicipio::class, 'municipio_id');
    }

    // Un fraccionamiento tiene muchas manzanas
    public function manzanas()
    {
        return $this->hasMany(Manzana::class, 'fraccionamiento_id');
    }

    public function lotes()
    {
        return $this->hasManyThrough(Lote::class, Manzana::class);
    }
    
}
