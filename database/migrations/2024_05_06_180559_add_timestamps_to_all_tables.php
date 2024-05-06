<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Obtiene las tablas de la base de datos como un objeto stdClass
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            // Accede al valor de la propiedad de la tabla (nombre de la tabla)
            foreach ($table as $tableName) {
                // Verifica si las columnas created_at y updated_at ya existen en la tabla
                if (!Schema::hasColumn($tableName, 'created_at')) {
                    Schema::table($tableName, function (Blueprint $table) {
                        $table->timestamps();
                    });
                }
            }
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
