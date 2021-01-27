<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIntegersInLocationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table)
        {
            $table->integer('schools')->default(0)->change();
            $table->integer('supermarkets')->default(0)->change();
            $table->integer('restaurants')->default(0)->change();
            $table->integer('parks')->default(0)->change();
            $table->string('source_url')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table)
        {
            //
        });
    }

}
