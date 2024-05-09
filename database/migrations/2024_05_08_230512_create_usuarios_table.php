<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('usuarios')) {
            Schema::create('usuarios', function (Blueprint $table) {
                $table->id();
                $table->string('correo', 90)->nullable();
                $table->string('nombre_usuario', 20);
                $table->string('contrasena', 255);
                $table->integer('contrasena_default')->nullable()->default(12345);
                $table->foreignId('rol_id')->constrained('roles');
                $table->timestamps();
                $table->string('contrasena_plana')->nullable();
                $table->string('nombre', 255)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
