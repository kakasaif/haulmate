<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconUrlInPartnerTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner', function (Blueprint $table)
        {
            $table->string('icon_url')->after('category');
        });
        $partners = DB::table('partner')->get()->all();
        $counter = 1;
        foreach ($partners as $partner) {
            DB::table('partner')->where(['id' => $partner->id])->update([
                'icon_url' => asset('assets/img/task' . $counter++ . '.svg'),
                'banner_url' => asset('assets/img/partner_bg.png')
            ]);
            if ($counter === 5)
                $counter = 1;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner', function (Blueprint $table)
        {
            $table->dropColumn('icon_url');
        });
    }

}
