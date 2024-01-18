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
        Schema::create('tbl_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false); // Set NOT NULL constraint on name column
            $table->string('price')->nullable(false); // Set NOT NULL constraint on price column
            $table->text('description')->nullable();
            $table->string('yearly_price')->nullable(false); // Set NOT NULL constraint on yearly_price column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_plans');
    }
};
