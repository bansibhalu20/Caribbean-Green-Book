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
        Schema::create('tbl_social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false); // Set NOT NULL constraint on name column
            $table->string('type')->nullable(false); // Set NOT NULL constraint on type column
            $table->string('url')->nullable(false); // Set NOT NULL constraint on url column
            $table->unsignedBigInteger('business_id');
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('tbl_business')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_social_media');
    }
};
