<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos';

    protected $fillable = [
        'cpf',
        'data_nascimento',
        'user_id',
        'mae',
        'pai',
        'area_atuacao',
        'genero',
        'estado',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
