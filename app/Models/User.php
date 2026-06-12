<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario_id'
    ];

    // ONE TO ONE
    public function perfilCandidato()
    {
        return $this->hasOne(PerfilCandidato::class);
    }

    // ONE TO MANY
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class);
    }

    // MANY TO MANY
    public function editais()
    {
        return $this->belongsToMany(Edital::class);
    }
}