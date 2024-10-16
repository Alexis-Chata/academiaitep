<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgrupo extends BaseModel
{
    use HasFactory;

    protected $fillable = ['turno_id', 'ciclo_id', 'modalidad_id', 'costo', 'concepto_cobro_name'];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class);
    }

    protected function conceptoCobroName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ?? implode(" - ", [$this->turno->name, $this->ciclo->name, $this->modalidad->name, $this->costo]),
        );
    }

    protected static function booted()
    {
        static::saving(function ($cgrupo) {
            $cgrupo->concepto_cobro_name = implode(" - ", [$cgrupo->turno->name ?? '', $cgrupo->ciclo->name ?? '', $cgrupo->modalidad->name ?? '', $cgrupo->costo]);
        });
    }
}
