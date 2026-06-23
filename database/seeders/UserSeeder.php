<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@email.com'
            ],
            [
                'name' => 'Administrador',
                'password' => Hash::make('123456'),
                'tipo_usuario_id' => 1
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'candidato@email.com'
            ],
            [
                'name' => 'Candidato Teste',
                'password' => Hash::make('123456'),
                'tipo_usuario_id' => 2
            ]
        );
    }
}