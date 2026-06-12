<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $fillable = [
        'titulo'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}