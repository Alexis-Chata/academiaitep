<?php

namespace App\Models;

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

    public function tipoApoderado()
    {
        return $this->belongsTo(Tapoderado::class, "tapoderado_id");
    }
}
