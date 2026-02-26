<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\CatEntidadFederativa;
use App\Models\CatMunicipio;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\CatEstatusProyecto;


class Compra extends Model
{
    //
    use SoftDeletes;
    protected $table = 'compras';

    protected $fillable = [
        'num_solicitud',
        'num_solicitud_sistema',
        'corredor_id',
        'estado_id',
        'municipio_id',
        'fraccionamiento_id',
        'cliente_id',
        'venta_tp',
        'estatus_id',
        'superficiel_venta',
        'total_venta',
        'enganche_venta_select',
        'enganche_venta',
        'mensualidad_venta_select',
        'pago_mensual_venta',
    ];

    protected static function booted()
    {
        static::creating(function ($compra) {
            // Generar un número único con formato COMP-YYYYMMDD-####
            $fecha = now()->format('Ymd');

            // Contar cuántas compras se han hecho hoy para generar el consecutivo
            $conteo = self::whereDate('created_at', now()->toDateString())->count() + 1;

            // Crear un número con 4 dígitos (relleno con ceros)
            $consecutivo = str_pad($conteo, 4, '0', STR_PAD_LEFT);

            // Generar el código final
            $compra->num_solicitud_sistema = "COMP-{$fecha}-{$consecutivo}";
        });
    }

    public function corredor()
    {
        return $this->belongsTo(User::class, 'corredor_id', 'id')->withTrashed();
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
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id')->withTrashed();
    }
    
    public function compralotelinderos()
    {
        return $this->hasMany(CompraLoteLindero::class, 'compra_id', 'id');
    }

    public function contrato()
    {
        return $this->hasOne(Contrato::class);
    }

    public function estatus()
    {
        return $this->belongsTo(CatEstatusProyecto::class, 'estatus_id');
    }
}
