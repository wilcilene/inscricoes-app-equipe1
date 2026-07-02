<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InscricaoStatus;
use App\Models\Candidato;
use App\Models\Edital;

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
        'candidato_id'
        
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function edital()
{
    return $this->belongsTo(
        Edital::class,
        'edital_id'
    );
}

    public function historico()
{
    return $this->hasMany(
        HistoricoInscricao::class,
        'inscricao_id'
    )->orderBy('created_at');
}

    public function status()
{
    return $this->belongsTo(
        InscricaoStatus::class,
        'status_id'
    );
}

    public function ultimoHistorico()
{
    return $this->hasOne(HistoricoInscricao::class)
        ->latestOfMany();
}
}