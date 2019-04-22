<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_holders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('file_id');
            $table->morphs('holder');
            $table->string('collection', 100)->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files')->onDelite('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_holders');
    }
}
