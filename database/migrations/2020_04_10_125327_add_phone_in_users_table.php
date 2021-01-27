<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneInUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE users CHANGE name username VARCHAR(255) DEFAULT NULL');
        Schema::table('users', function (Blueprint $table)
        {
            $table->string('phone', 15)->nullable()->after('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE users CHANGE username name VARCHAR(255) DEFAULT NULL');
        Schema::table('users', function (Blueprint $table)
        {
            $table->dropColumn('phone');
        });
    }

}
