<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cstandar extends Model
{
    protected $fillable = ['name','precio'];
    use HasFactory;
}
