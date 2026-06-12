<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilCandidato extends Model
{
    protected $table = 'perfil_candidatos';

    protected $fillable = [
        'user_id',
        'telefone',
        'cpf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}