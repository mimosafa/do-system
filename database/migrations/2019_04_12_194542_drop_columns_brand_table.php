<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn(['ad_copy', 'ad_text', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('ad_copy', 20)->nullable()->after('name');
            $table->string('ad_text', 40)->nullable()->after('ad_copy');
            $table->text('description')->nullable()->after('ad_text');
        });
    }
}
