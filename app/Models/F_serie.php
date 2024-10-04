<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_comprobante_id',
        'serie',
        'correlativo',
        'f_sede_id',
    ];
}
