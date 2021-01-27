<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPartnerIdInHousingTable extends Migration
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
            $table->bigInteger('partner_id')->nullable()->after('source_url');
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
            $table->dropColumn('partner_id');
        });
    }

}
