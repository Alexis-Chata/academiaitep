<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MetodoPago extends BaseModel
{
    use HasFactory;

    protected $fillable = ['tipo', 'name'];

    protected function tipo(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value)),
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtoupper($value),
        );
    }
}
