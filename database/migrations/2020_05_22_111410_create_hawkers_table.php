<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHawkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hawkers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('address_block_number')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('est_original_completion_date')->nullable();
            $table->string('status')->nullable();
            $table->string('cleaning_start_date')->nullable();
            $table->string('address_unit_number')->nullable();
            $table->string('address_floor_number')->nullable();
            $table->integer('no_food_stalls')->nullable();
            $table->string('hyperlink')->nullable();
            $table->string('region')->nullable();
            $table->decimal('approximate', 10, 3)->nullable();
            $table->string('info_co_locators')->nullable();
            $table->integer('no_of_market')->nullable();
            $table->dateTime('awarded_date')->nullable();
            $table->decimal('landy_address_point', 17, 12)->nullable();
            $table->string('cleaning_end_date')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('address_type')->nullable();
            $table->string('rnr_status')->nullable();
            $table->string('building_name')->nullable();
            $table->dateTime('hup_completion_date')->nullable();
            $table->decimal('landx_address_point', 17, 12)->nullable();
            $table->string('address_street_name')->nullable();
            $table->integer('postal_code')->nullable();
            $table->text('description_myenv')->nullable();
            $table->dateTime('implementation_date')->nullable();
            $table->string('address_myenv')->nullable();
            $table->string('inc_crc')->nullable();
            $table->bigInteger('fmel_upd_d')->nullable();
        });

        DB::unprepared(file_get_contents('database/sql/hawkers.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hawkers');
    }
}
