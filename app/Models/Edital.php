<?php
<<<<<<< HEAD

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inscricao;

class Edital extends Model
{
    protected $table = 'editals';

    protected $fillable = [
        'nome',
        'resumo',
        'descricao',
        'data_inicio_inscr',
        'data_fim_inscr',
        'data_inicio_rev',
        'data_fim_rev',
        'data_prova'
    ];

    protected $appends = [
        'bloqueado'
    ];

    protected $casts = [
        'data_inicio_inscr' => 'datetime',
        'data_fim_inscr' => 'datetime',
        'data_inicio_rev' => 'datetime',
        'data_fim_rev' => 'datetime',
        'data_prova' => 'datetime'
    ];

    /*
    |---------------------------------
    | RELACIONAMENTOS
    |---------------------------------
    */

    public function inscricoes()
    {
        return $this->hasMany(
            Inscricao::class,
            'edital_id'
        );
    }

    /*
    |---------------------------------
    | ATRIBUTOS
    |---------------------------------
    */

    public function getBloqueadoAttribute()
    {
        return now()->gt(
            $this->data_fim_inscr
        );
    }

    /*
    |---------------------------------
    | FILTRO
    |---------------------------------
    */

    public function scopeFiltrar(
        $query,
        $filtro
    ) {
        if (!empty($filtro)) {
            $query->where(
                'nome',
                'like',
                "%{$filtro}%"
            );
        }

        return $query;
    }
=======
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model {
    protected $fillable = ['nome', 'descricao', 'data_inicio_inscr', 'data_fim_inscr', 
    'data_inicio_rev', 'data_fim_rev'];
>>>>>>> main
}