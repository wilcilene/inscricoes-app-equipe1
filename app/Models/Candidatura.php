<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inscricao;

class Candidatura extends Model
{
    use HasFactory;

    protected $table = 'candidaturas';

    protected $fillable = [
        'candidato_id',
        'edital_id',
        'status_id',
        'data_submissao',
        'ultimoHistorico'
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function edital()
    {
        return $this->belongsTo(Edital::class);
    }

    public function status()
    {
        return $this->belongsTo(InscricaoStatus::class, 'status_id');
    }
}