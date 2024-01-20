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
        // Create tbl_business table
        Schema::create('tbl_business', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->text('description')->nullable();
            $table->string('keyword')->nullable();
            $table->string('image')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('zipcode')->nullable();
            $table->year('how_old_ur_business');
            $table->enum('business_industry', ['industry1', 'industry2', 'industry3']);
            $table->enum('is_caribbean_owned', ['yes', 'no']);
            $table->enum('is_felony', ['yes', 'no']);
            $table->text('hear_about_us')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->enum('status', ['active', 'inactive']);
            $table->string('business_owner_name')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('tbl_country')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('tbl_plans')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('tbl_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_business');
    }
};
