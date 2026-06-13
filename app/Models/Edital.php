<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Edital extends Model
{
    protected $fillable = [
        'titulo',
        'numero',
        'descricao',
        'data_limite',
];


protected function dataLimite(): Attribute
    {
        return Attribute::make(
        get: fn ($value) => $value ? Carbon::parse($value)->format('d/m/Y') : null,

        set: function ($value) {
    if (empty($value)) return null;


        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $value)) {
        return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}

return $value;
}
);
}
}
