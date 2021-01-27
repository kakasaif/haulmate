<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeMetaFieldsNullableInHousingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('housing', function (Blueprint $table) {
            $table->string('meta_description', 500)->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
        });
        Schema::table('locations', function (Blueprint $table) {
            $table->string('meta_description', 500)->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
        });
        Schema::table('partner', function (Blueprint $table) {
            $table->string('meta_description', 500)->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('housing', function (Blueprint $table) {
            //
        });
    }
}
