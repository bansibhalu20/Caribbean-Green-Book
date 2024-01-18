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
            $table->text('description');
            $table->string('keyword');
            $table->string('image');
            $table->string('website');
            $table->string('email');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->unsignedBigInteger('plan_id');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->integer('zipcode');
            $table->year('how_old_ur_business');
            $table->enum('business_industry', ['industry1', 'industry2', 'industry3']);
            $table->enum('is_caribbean_owned', ['yes', 'no']);
            $table->enum('is_felony', ['yes', 'no']);
            $table->text('hear_about_us');
            $table->unsignedBigInteger('category_id');
            $table->enum('status', ['active', 'inactive']);
            $table->string('business_owner_name');
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
