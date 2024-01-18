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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->unsignedBigInteger('business_id');
            $table->integer('star');
            $table->text('description');
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
