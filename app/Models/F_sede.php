<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_sede extends Model
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
}
