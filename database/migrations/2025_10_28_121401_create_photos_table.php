<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executar as migrations
     */
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('filename'); // Nome do arquivo armazenado
            $table->string('original_name'); // Nome original do arquivo
            $table->string('ip', 45);
            $table->text('user_agent')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            // Índices para consultas
            $table->index('ip');
            $table->index('created_at');
        });
    }

    /**
     * Reverter as migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
