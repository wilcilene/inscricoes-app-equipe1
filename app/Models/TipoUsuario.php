<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    /*Nome da tabela definido na migration 0000_05_16_233108_create_tipo_usuario_table.php
     */
    protected $table = 'tipo_usuario';

    /* Atributos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'tipo_usuario',
    ];
}