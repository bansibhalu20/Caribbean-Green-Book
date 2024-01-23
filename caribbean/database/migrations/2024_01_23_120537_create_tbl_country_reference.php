<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_country_reference', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency_name')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('iso_alpha2')->nullable();
            $table->string('iso_alpha3')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('iso_numeric')->nullable();
            $table->string('flag')->nullable();
            $table->integer('country_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_country_reference');
    }
};
