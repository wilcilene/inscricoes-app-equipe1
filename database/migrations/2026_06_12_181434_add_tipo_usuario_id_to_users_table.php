<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adiciona relacionamento users → tipo_usuarios
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->foreignId('tipo_usuario_id')
                ->default(2)
                ->after('password')
                ->constrained('tipo_usuarios')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

        });
    }

    /**
     * Remove alteração
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['tipo_usuario_id']);

            $table->dropColumn('tipo_usuario_id');

        });
    }
};