<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('advertisable');
            $table->string('title_primary', 30)->nullable();
            $table->string('title_secondary', 30)->nullable();
            $table->string('description_primary', 80)->nullable();
            $table->string('description_secondary', 80)->nullable();
            $table->text('content_primary')->nullable();
            $table->text('content_secondary')->nullable();
            $table->json('other_values')->nullable();
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
        Schema::dropIfExists('advertisements');
    }
}
