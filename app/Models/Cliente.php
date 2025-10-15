<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * Nombre de la tabla (opcional si sigue convención plural).
     */
    protected $table = 'clientes';

    /**
     * Campos que se pueden asignar masivamente (fillable).
     */
    protected $fillable = [
        'no_cliente',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'fecha_nacimiento',
        'email',
        'num_contacto',
        'parentesco',
        'url_ine',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
}
