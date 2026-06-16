<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = 'candidatos';

    protected $fillable = [
        'cpf',
        'data_nascimento',
        'usuer_id',
        'mae',
        'pai',
        'area_atuacao',
        'genero',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuer_id');
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'candidato_id');
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class, 'candidato_id');
    }
}
