<?php

namespace App\Models;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgrupo extends Model
{
    use HasFactory, Compoships;

    protected $fillable = ['turno_id','ciclo_id','modalidad_id','costo'];

    public function turno(){return $this->belongsTo(Turno::class);}
    public function ciclo(){return $this->belongsTo(Ciclo::class);}
    public function modalidad(){return $this->belongsTo(Modalidad::class);}
    public function grupo(){return $this->belongsTo(Grupo::class, ['turno_id', 'ciclo_id', 'modalidad_id'], ['turno_id', 'ciclo_id', 'modalidad_id']);}
}
