<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePartnerIdPropertyIdInLeadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE leads CHANGE partner_id partner_id BIGINT(20) DEFAULT NULL');
        DB::statement('ALTER TABLE leads CHANGE property_id property_id BIGINT(20) DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE leads CHANGE partner_id partner_id BIGINT(20) NOT NULL');
        DB::statement('ALTER TABLE leads CHANGE property_id property_id BIGINT(20) NOT NULL');
    }

}
