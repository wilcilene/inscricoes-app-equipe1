<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'cep',
        'logradouro',
        'numero_end',
        'complemento',
        'bairro',
        'estado_end',
        'cidade',
        'telefone',
        'celular',
        'candidato_id',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }
}
