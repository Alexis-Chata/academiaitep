<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ["name","shortname","capacidad",'taula_id','sede_id'];
    use HasFactory;

    public function taula(){
        return $this->belongsTo(Taula::class);
    }

    public function sede(){
        return $this->belongsTo(Sede::class);
    }
}
