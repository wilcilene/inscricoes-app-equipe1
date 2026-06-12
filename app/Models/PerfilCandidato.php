<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilCandidato extends Model
{
    use HasFactory;

    protected $table = 'perfil_candidatos';

    protected $fillable = [
        'nome_completo', 
        'nome_social', 
        'cpf', 
        'data_nascimento', 
        'genero', 
        'naturalidade', 
        'mae', 
        'pai', 
        'area_atuacao',
        'cep', 
        'logradouro', 
        'numero', 
        'complemento', 
        'bairro'
    ];
}