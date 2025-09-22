<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_acento_dialecto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('acento_dialecto_id');
            $table->timestamps();

            // Evitar duplicados
            $table->unique(['perfil_id', 'acento_dialecto_id']);

            // Foreign keys
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')->onDelete('cascade');
            $table->foreign('acento_dialecto_id')->references('id')->on('acentos_dialectos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_acento_dialecto');
    }
};
