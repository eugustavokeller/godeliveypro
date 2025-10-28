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
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45); // IPv6 suporta até 45 caracteres
            $table->text('user_agent')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->decimal('accuracy', 10, 2)->nullable();
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
        Schema::dropIfExists('access_logs');
    }
};
