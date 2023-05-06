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
        // migrate the existing records
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->default('');
        });

        // remove default value after record update
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
        });
    }
};
