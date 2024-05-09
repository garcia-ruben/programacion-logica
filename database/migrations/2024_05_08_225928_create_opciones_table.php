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
        if (!Schema::hasTable('opciones')) {
            Schema::create('opciones', function (Blueprint $table) {
                $table->id();
                $table->foreignId('producto_id')->constrained()->onDelete('cascade');
                $table->time('tiempo')->nullable();
                $table->decimal('precio', 8, 2);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opciones');
    }
};
