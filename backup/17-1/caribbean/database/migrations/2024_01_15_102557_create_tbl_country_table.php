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
        // Create tbl_country table
        Schema::create('tbl_country', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency_name');
            $table->string('currency_icon');
            $table->string('flag');
            $table->integer('country_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tbl_country table if the migration is rolled back
        Schema::dropIfExists('tbl_country');
    }
};
