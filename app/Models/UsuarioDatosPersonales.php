<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UsuarioDatosPersonales extends Model
{
    //
    protected $table = 'usuario_datos_personales';

    protected $fillable = [
        'edad',
        'domicilio',
        'enfermedades',
        'fecha_nacimiento',
        'tipo_sangre',
        'fecha_laboral',
        'num_contacto',
        'parentesco',
        'usuario_id',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_laboral' => 'date',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
