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
        Schema::table('applications', function (Blueprint $table) {
            // Change 'drivers_licence' and 'adult' to TINYINT (1) type
            $table->boolean('drivers_licence')->change();
            $table->boolean('adult')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            // Revert 'drivers_licence' and 'adult' back to INTEGER
            $table->integer('drivers_licence')->change();
            $table->integer('adult')->change();
        });
    }
};
