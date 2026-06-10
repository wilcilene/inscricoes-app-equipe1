<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('editals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->date('data_inicio_inscr');
            $table->date('data_fim_inscr');
            $table->date('data_inicio_rev');
            $table->date('data_fim_rev');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('editals');
    }
}
;
