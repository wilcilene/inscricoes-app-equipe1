<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void

    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('logradouro');
            $table->string("numero_end");
            $table->string("complemento");
            $table->string("bairro");
            $table->string("estado_end");
            $table->string("cidade");
            $table->string("telefone");
            $table->string("celular");
            $table->foreignId('candidato_id')->constrained('candidatos','id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
}
    ;
