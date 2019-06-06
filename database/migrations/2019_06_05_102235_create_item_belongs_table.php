<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemBelongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_belongs', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->index();
            $table->morphs('item_belong');
            $table->unsignedInteger('order')->nullable();

            $table->foreign('item_id')->references('id')->on('items')->onDelite('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_belongs');
    }
}
