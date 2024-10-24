<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    use HasFactory;
    protected $fillable = ['name','id_category_moodle','id_anio','estado'];

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }
}
