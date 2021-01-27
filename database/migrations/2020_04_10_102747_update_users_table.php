<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE users CHANGE salt salt VARCHAR(255) DEFAULT NULL');
        DB::statement('ALTER TABLE users CHANGE name name VARCHAR(255) DEFAULT NULL');
        DB::statement('ALTER TABLE users CHANGE photo_url photo_url VARCHAR(255) DEFAULT NULL');
        DB::statement("ALTER TABLE users CHANGE gender gender ENUM('male','female') DEFAULT NULL");
        DB::statement('ALTER TABLE users CHANGE birthday birthday DATE DEFAULT NULL');
        DB::statement('ALTER TABLE users CHANGE status status VARCHAR(255) DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE users CHANGE salt salt VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE users CHANGE name name VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE users CHANGE photo_url photo_url VARCHAR(255) NOT NULL');
        DB::statement("ALTER TABLE users CHANGE gender gender ENUM('male','female') NOT NULL");
        DB::statement('ALTER TABLE users CHANGE birthday birthday DATE NOT NULL');
        DB::statement('ALTER TABLE users CHANGE status status VARCHAR(255) NOT NULL');
    }

}
