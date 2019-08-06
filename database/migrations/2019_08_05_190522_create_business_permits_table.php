<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_permits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('approved');
            $table->unsignedInteger('health_center_id');
            $table->unsignedSmallInteger('business_category');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('conditions')->nullable();
            $table->string('permit_number')->nullable();
            $table->json('aplicant_properties');
            $table->json('other_properties');
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
        Schema::dropIfExists('business_permits');
    }
}
