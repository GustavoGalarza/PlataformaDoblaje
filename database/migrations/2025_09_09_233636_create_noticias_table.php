<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id'); // autoincrement
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('titulo');
            $table->text('contenido')->nullable();
            $table->enum('tipo_publicacion', ['taller', 'masterclass', 'webinar', 'evento', 'anuncio'])->default('anuncio');
            $table->string('archivo_url')->nullable();
            $table->string('fecha_publicacion')->nullable(); // ahora string
            $table->string('fecha_evento')->nullable(); // ahora string
            $table->string('lugar')->nullable();
            $table->string('enlace_transmision')->nullable();
            $table->boolean('requiere_inscripcion')->default(false);
            $table->boolean('certificado')->default(false);
            $table->enum('estado', ['no_iniciado', 'en_curso', 'finalizado'])->default('no_iniciado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
