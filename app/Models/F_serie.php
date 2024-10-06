<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F_serie extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'tipo_comprobante_id',
        'serie',
        'correlativo',
        'fecha_emision',
        'f_sede_id',
    ];

    public function tipo_comprobante()
    {
        return $this->belongsTo(F_tipo_comprobante::class);
    }

    public function sede()
    {
        return $this->belongsTo(F_sede::class, 'f_sede_id');
    }
}
