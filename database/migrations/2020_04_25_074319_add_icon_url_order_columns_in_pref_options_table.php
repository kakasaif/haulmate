<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconUrlOrderColumnsInPrefOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pref_options', function (Blueprint $table) {
            $table->string('icon_url', 255)->after('preference');
            $table->integer('order')->after('icon_url')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pref_options', function (Blueprint $table) {
            $table->dropColumn('icon_url');
            $table->dropColumn('order');
        });
    }
}
