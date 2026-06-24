<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoInscricao extends Model
{
    protected $table = 'historico_inscricoes';

    protected $fillable = [
        'observacao',
        'inscricao_id',
        'inscricao_status_id',
    ];

    public function status()
    {
        return $this->belongsTo(
            InscricaoStatus::class,
            'inscricao_status_id'
        );
    }

    public function inscricao()
    {
        return $this->belongsTo(
            Inscricao::class,
            'inscricao_id'
        );
    }
}