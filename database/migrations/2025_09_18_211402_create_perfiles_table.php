<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id('id_perfil');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('nombre')->nullable();
            $table->integer('edad')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('biografia')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('disponibilidad')->nullable();

            // Campos de habilidades
            $table->text('diccion_articulacion')->nullable();
            $table->text('actuacion_emociones')->nullable();
            $table->text('advertencia_vocal')->nullable();
            $table->text('home_studio')->nullable();
            $table->text('edicion_postproduccion')->nullable();
            $table->text('entregas_flujo_trabajo')->nullable();
            $table->text('creditos')->nullable();
            $table->text('formacion')->nullable();
            $table->text('reconocimientos')->nullable();

            // Cloudinary URL
            $table->string('foto_url')->nullable();

            $table->string('estado')->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
