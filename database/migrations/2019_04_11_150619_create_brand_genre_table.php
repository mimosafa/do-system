<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_genre', function (Blueprint $table) {
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('genre_id');
            $table->primary(['brand_id', 'genre_id']);

            $table->foreign('brand_id')->references('id')->on('brands')->onDelite('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelite('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_genre');
    }
}
