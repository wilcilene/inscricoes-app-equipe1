<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricaos';

    protected $fillable = [
        'caminho_ficha_inscricao',
        'caminho_identidade',
        'caminho_diploma',
        'caminho_curriculo_lattes',
        'caminho_comprovante_eleitoral',
        'caminho_certificado_militar',
        'vaga_pcd',
        'vaga_pniq',
        'edital_id',
        'candidato_id',
    ];
}