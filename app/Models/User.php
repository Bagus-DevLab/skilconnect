<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;   // Trait untuk API Token
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Atribut yang boleh diisi (mass assignable)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'bio',
        'address',
        'avatar',
        'photo',
    ];

    /**
     * Atribut yang disembunyikan dalam JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Default value atribut
     */
    protected $attributes = [
        'role' => 'user',   // Default role user
    ];
}
