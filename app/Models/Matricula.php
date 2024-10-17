<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "grupo_id",
        "carrera_id",
        "ciclo",
        "turno",
        "modalidad",
        "aula",
        "sede",
        "fvencimiento",
        "anio",
        "estado",
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
