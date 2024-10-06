<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_empresa extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'razon_social',
        'ruc',
        'telefono',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'ubigueo',
        'tokenapisperu',
    ];
}
