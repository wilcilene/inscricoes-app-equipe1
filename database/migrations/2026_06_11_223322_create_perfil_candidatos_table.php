<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_candidatos', function (Blueprint $table) {
            $table->id();

            $table->string('nome_completo');
            $table->string('nome_social')->nullable();
            $table->string('cpf', 14)->unique();
            $table->date('data_nascimento');
            $table->string('genero');
            $table->string('naturalidade');
            $table->string('mae');
            $table->string('pai')->nullable();
            $table->string('area_atuacao');

            $table->string('cep', 9);
            $table->string('logradouro');
            $table->string('numero', 10);
            $table->string('complemento')->nullable();
            $table->string('bairro');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_candidatos');
    }
};