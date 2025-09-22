<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::create('perfil_estilos_voz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('estilo_voz_id');
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['perfil_id', 'estilo_voz_id']);

            // Foreign keys
            $table->foreign('perfil_id')
                ->references('id_perfil')->on('perfiles')
                ->onDelete('cascade');

            $table->foreign('estilo_voz_id')
                ->references('id')->on('estilos_voz')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_estilos_voz');
    }
};
