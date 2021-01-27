<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFewColumnsInLeadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table)
        {
            $table->string('street')->nullable()->after('property_id');
            $table->string('postal_code', 10)->nullable()->after('street');
            $table->tinyInteger('move_size')->nullable()->after('postal_code');
            $table->enum('items', ['full', 'furniture', 'box'])->nullable()->after('move_size');
            $table->string('mobile_phone', 20)->nullable()->after('items');
            $table->date('moving_on')->nullable()->after('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table)
        {
            $table->dropColumn('street');
            $table->dropColumn('postal_code');
            $table->dropColumn('move_size');
            $table->dropColumn('items');
            $table->dropColumn('mobile_phone');
            $table->dropColumn('moving_on');
        });
    }

}
