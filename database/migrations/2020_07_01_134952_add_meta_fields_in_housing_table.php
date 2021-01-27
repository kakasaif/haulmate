<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaFieldsInHousingTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('housing', function (Blueprint $table)
        {
            $table->string('meta_description', 500)->after('description');
            $table->string('meta_keyword')->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('housing', function (Blueprint $table)
        {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keyword');
        });
    }

}
