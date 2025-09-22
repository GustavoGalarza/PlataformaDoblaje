<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_redes_sociales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('red_social_id');
            $table->string('link')->nullable(); // Link del perfil en la red social
            $table->timestamps();

            // Evitar duplicados de perfil + red social
            $table->unique(['perfil_id', 'red_social_id']);

            // Llaves foráneas
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')->onDelete('cascade');
            $table->foreign('red_social_id')->references('id')->on('redes_sociales')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_redes_sociales');
    }
};
