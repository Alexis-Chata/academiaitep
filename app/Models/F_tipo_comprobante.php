<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_tipo_comprobante extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'tipo_comprobante',
        'descripcion',
        'estado_pos',
    ];

    protected $casts = [
        'estado_pos' => 'boolean',
    ];
}
