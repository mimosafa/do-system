<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_shop', function (Blueprint $table) {
            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('order')->default(0);
            $table->primary(['genre_id', 'shop_id']);

            $table->foreign('genre_id')->references('id')->on('genres')->onDelite('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelite('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_shop');
    }
}
