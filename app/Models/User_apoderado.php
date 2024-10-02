<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_apoderado extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }

    public function tipo_apoderado()
    {
        return $this->belongsTo(Tapoderado::class, "tapoderado_id");
    }
}
