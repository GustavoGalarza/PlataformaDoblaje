<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agrega la columna rol_id con valor por defecto 2
            if (!Schema::hasColumn('users', 'rol_id')) {
                $table->unsignedBigInteger('rol_id')->default(2)->after('password');
                $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'rol_id')) {
                $table->dropForeign(['rol_id']);
                $table->dropColumn('rol_id');
            }
        });
    }
};
