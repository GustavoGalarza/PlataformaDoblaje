<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_rango_vocal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('rango_vocal_id');
            $table->timestamps();

            $table->unique(['perfil_id', 'rango_vocal_id']);

            $table->foreign('perfil_id')
                  ->references('id_perfil')->on('perfiles')
                  ->onDelete('cascade');

            $table->foreign('rango_vocal_id')
                  ->references('id')->on('rango_vocal')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_rango_vocal');
    }
};
