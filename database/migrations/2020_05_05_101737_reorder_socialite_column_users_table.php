<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReorderSocialiteColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE users MODIFY COLUMN google_id VARCHAR(255) AFTER remember_token");
            DB::statement("ALTER TABLE users MODIFY COLUMN google_avatar VARCHAR(255) AFTER google_id");
            DB::statement("ALTER TABLE users MODIFY COLUMN google_avatar_original VARCHAR(255) AFTER google_avatar");
            DB::statement("ALTER TABLE users MODIFY COLUMN facebook_id VARCHAR(255) AFTER google_avatar_original");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 
    }
}
