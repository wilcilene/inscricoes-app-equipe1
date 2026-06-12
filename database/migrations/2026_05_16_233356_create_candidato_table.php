<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void

    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->foreignId('usuer_id')->constrained('users', 'id');
            $table->string("mae");
            $table->string("pai");
            $table->string("area_atuacao");
            $table->enum('genero', ['M', 'F', 'NB', 'O'])->default('O');
            //* M- Masc; F- Fem; NB- Não Binario; O- Outros *//
            $table->enum('estado', ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA',
                'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN',
                'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'])->default('MG');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
}
;
