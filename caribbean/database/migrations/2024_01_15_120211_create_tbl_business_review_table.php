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
        Schema::create('tbl_business_review', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('business_id');
            $table->integer('star')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('tbl_business')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_business_review');
    }
};
