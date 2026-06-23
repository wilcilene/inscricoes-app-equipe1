<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InscricaoStatus;


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

    public function candidato()
{
    return $this->belongsTo(Candidato::class, 'candidato_id');
}

public function edital()
{
    return $this->belongsTo(Edital::class, 'edital_id');
}

public function status()
{
    return $this->belongsTo(
        InscricaoStatus::class,
        'id',   // coluna da tabela inscricoes
        'id'    // coluna da tabela inscricao_statuss
    );
}
}