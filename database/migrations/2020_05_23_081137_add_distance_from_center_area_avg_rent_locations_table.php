<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDistanceFromCenterAreaAvgRentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->integer('distance_from_center')->after('parks');
            $table->renameColumn('distance','area');
            $table->decimal('avg_rent', 16, 2)->after('distance');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('distance_from_center');
            $table->rename('area','distance');
            $table->dropColumn('avg_rent');
        });
    }
}
