<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupermarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermarkets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 7);
            $table->integer('description')->nullable();
            $table->string('lic_name', 49);
            $table->string('blk_house', 8);
            $table->string('str_name', 38);
            $table->string('unit_no', 5)->nullable();
            $table->integer('postcode');
            $table->string('lic_no', 11);
            $table->string('inc_crc', 16);
            $table->bigInteger('fmel_upd_d');
            $table->bigInteger('field_8');
            $table->string('field_6', 11);
            $table->string('field_7', 16);
            $table->string('field_4', 5)->nullable();
            $table->integer('field_5');
            $table->string('field_2', 8);
            $table->string('field_3', 38);
            $table->string('field_1', 49);
        });

        DB::unprepared(file_get_contents('database/sql/supermarkets.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supermarkets');
    }
}
