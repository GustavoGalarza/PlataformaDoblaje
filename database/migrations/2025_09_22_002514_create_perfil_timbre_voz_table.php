<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_timbre_voz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perfil_id');
            $table->unsignedBigInteger('timbre_voz_id');
            $table->timestamps();

            $table->unique(['perfil_id', 'timbre_voz_id']);
            
            $table->foreign('perfil_id')->references('id_perfil')->on('perfiles')->onDelete('cascade');
            $table->foreign('timbre_voz_id')->references('id')->on('timbre_voz')->onDelete('cascade');

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_timbre_voz');
    }
};
