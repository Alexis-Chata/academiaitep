<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grupo_id',
        'carrera_id',
        'ciclo',
        'turno',
        'modalidad',
        'aula',
        'sede',
        'fvencimiento',
        'anio',
        'estado',
    ];
}
