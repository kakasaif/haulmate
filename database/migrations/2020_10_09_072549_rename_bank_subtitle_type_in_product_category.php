<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBankSubtitleTypeInProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('product_category')
            ->where('subtitle','<p class="mb-0">Open a bank account with <b>DBS or OCBC</b> any of these Banks and get amazing offers</p>')
            ->update(['subtitle'=>'Start the process of opening a bank account with <b>DBS</b> and other popular banks even before you land']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('product_category')
        ->where('subtitle','Start the process of opening a bank account with <b>DBS</b> and other popular banks even before you land')
        ->update(['subtitle'=>'<p class="mb-0">Open a bank account with <b>DBS or OCBC</b> any of these Banks and get amazing offers</p>']);
    }
}
