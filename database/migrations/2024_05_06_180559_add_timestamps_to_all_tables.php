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
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            foreach ($table as $tableName) {
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
