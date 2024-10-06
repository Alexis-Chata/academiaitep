<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_tipo_documento extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'descripcion',
    ];

    // Si estás usando el campo 'id' como string, necesitas especificarlo:
    protected $keyType = 'string';
    public $incrementing = false;
}
