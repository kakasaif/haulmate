<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeoColumnsInHousingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('housing', function (Blueprint $table) {
            $table->string('postal_code', 10)->nullable()->after('area');
            $table->decimal('latitude', 10, 8)->nullable()->after('postal_code');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
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
            $table->dropColumn('postal_code');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
}
