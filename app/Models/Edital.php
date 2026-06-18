<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{

protected $table='editals';


protected $fillable=[

'nome',

'area',

'descricao',

'data_inicio_inscr',

'data_fim_inscr',

'data_inicio_rev',

'data_fim_rev'

];



protected $appends=[
'bloqueado'
];



public function getBloqueadoAttribute()
{

return now()->gt(
$this->data_fim_inscr
);

}



public function scopeFiltrar(
$query,
$filtro
){

if($filtro){

$query->where(
'nome',
'like',
"%{$filtro}%"
);

}

return $query;

}

}