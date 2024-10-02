<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "ap_paterno",
        "ap_materno",
        "f_tipo_documento_id",
        "nro_documento",
        "email",
        "celular1",
        "celular2",
        "direccion",
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, "user_apoderados")->withPivot(
            "tapoderado_id"
        );
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' ' . $this->ap_paterno . ' ' . $this->ap_materno
        );
    }
}
