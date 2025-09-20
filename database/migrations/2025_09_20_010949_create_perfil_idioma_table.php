<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_idioma', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('idioma_id');
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['perfil_id', 'idioma_id']);

            // Foreign keys
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')->onDelete('cascade');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_idioma');
    }
};
