<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory, Compoships;

    protected $fillable = ['name', 'aula_id', 'turno_id', 'ciclo_id', 'modalidad_id', 'estado'];

    public function aula(){return $this->belongsTo(Aula::class);}
    public function turno(){return $this->belongsTo(Turno::class);}
    public function ciclo(){return $this->belongsTo(Ciclo::class);}
    public function modalidad(){return $this->belongsTo(Modalidad::class);}

    public function cgrupo()
    {
        return $this->belongsTo(Cgrupo::class, ['turno_id', 'ciclo_id', 'modalidad_id'], ['turno_id', 'ciclo_id', 'modalidad_id']);
    }
}
