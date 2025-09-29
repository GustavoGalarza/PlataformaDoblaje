<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->id('id_demo');
            $table->unsignedBigInteger('perfil_id');
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->string('archivo_url', 255); // Cloudinary: audio/video
            $table->string('tipo_archivo', 50); // audio, video
            $table->string('portada_url', 255)->nullable(); // imagen de portada

            // Relaciones foráneas
            $table->unsignedBigInteger('idioma_id')->nullable();
            $table->unsignedBigInteger('tipo_voz_id')->nullable();
            $table->unsignedBigInteger('estilo_voz_id')->nullable();
            $table->unsignedBigInteger('rango_vocal_id')->nullable();
            $table->unsignedBigInteger('timbre_voz_id')->nullable();
            $table->unsignedBigInteger('acento_id')->nullable();

            $table->boolean('visibilidad')->default(true); // público/privado
            $table->dateTime('fecha_subida')->nullable();
            $table->string('estado', 50)->default('activo'); // activo, archivado, eliminado

            $table->timestamps();

            // Foreign keys
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')->onDelete('cascade');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->nullOnDelete();
            $table->foreign('tipo_voz_id')->references('id')->on('tipo_voz')->nullOnDelete();
            $table->foreign('estilo_voz_id')->references('id')->on('estilos_voz')->nullOnDelete();
            $table->foreign('rango_vocal_id')->references('id')->on('rango_vocal')->nullOnDelete();
            $table->foreign('timbre_voz_id')->references('id')->on('timbre_voz')->nullOnDelete();
            $table->foreign('acento_id')->references('id')->on('acentos_dialectos')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demos');
    }
};
