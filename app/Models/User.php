<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "ap_paterno",
        "ap_materno",
        "f_tipo_documento_id",
        "nro_documento",
        "direccion",
        "celular1",
        "celular2",
        "email",
        "id_moodle_user",
        "estado",
        "locked",
        "password",
        "profile_photo_path",
        "dni_path",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "remember_token",
        "two_factor_recovery_codes",
        "two_factor_secret",
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = ["profile_photo_url"];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            foreach ($model->getAttributes() as $key => $value) {
                if (is_string($value)) {
                    $model->{$key} = trim($value);
                }
            }
        });
    }

    protected function estado(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value ?? 1 // Asignar 0 si es null
        );
    }

    protected function locked(): Attribute
    {
        return Attribute::make(
            set: fn($value) => $value ?? 1 // Asignar 0 si es null
        );
    }

    public function user_apoderados()
    {
        return $this->hasMany(User_apoderado::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
