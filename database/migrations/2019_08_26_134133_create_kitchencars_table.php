<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitchencarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitchencars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('vendor_id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('order')->nullable();
            $table->timestamps();

            $table->unique(['car_id', 'brand_id']);
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kitchencars');
    }
}
