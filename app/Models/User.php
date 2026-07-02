<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'name',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'tipo_usuario_id',
        ];
    }

    public function candidato()
    {
        return $this->hasOne(Candidato::class);
    }
}