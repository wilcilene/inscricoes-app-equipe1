<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que podem ser preenchidos no cadastro.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Campos que ficam ocultos em consultas (segurança).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Garante que a senha seja criptografada automaticamente.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}