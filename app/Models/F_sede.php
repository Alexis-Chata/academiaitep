<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_sede extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'ubigueo',
        'addresstypecode',
        'f_empresa_id',
    ];

    public function series()
    {
        return $this->hasMany(F_serie::class, 'f_sede_id');
    }

    public function empresa()
    {
        return $this->belongsTo(F_empresa::class, 'f_empresa_id');
    }

    protected function region(): Attribute
    {
        $datos = [$this->departamento, $this->provincia, $this->distrito];
        $region = implode(" - ", $datos);

        return Attribute::make(
            get: fn () => $region,
        );
    }

    protected function direccion(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value)),
        );
    }

    protected function departamento(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value)),
        );
    }

    protected function provincia(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value)),
        );
    }

    protected function distrito(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value)),
        );
    }
}
