<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalparksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalparks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 48);
            $table->string('description', 1000); 
            $table->integer('addressblockhousenumber')->nullable(); 
            $table->integer('addressbuildingname')->nullable();
            $table->integer('addresstype')->nullable(); 
            $table->string('hyperlink', 102)->nullable(); 
            $table->decimal('landxaddresspoint', 17, 12); 
            $table->decimal('landyaddresspoint', 17, 12); 
            $table->integer('name2')->nullable();
            $table->integer('photourl')->nullable();
            $table->integer('addresspostalcode')->nullable();
            $table->integer('description2')->nullable(); 
            $table->integer('addressstreetname')->nullable(); 
            $table->integer('addressfloornumber')->nullable();  
            $table->string('inc_crc', 16)->nullable(); 
            $table->bigInteger('fmel_upd_d')->nullable(); 
            $table->integer('addressunitnumber')->nullable(); 
            $table->integer('field_10')->nullable(); 
            $table->integer('field_11')->nullable(); 
            $table->integer('field_12')->nullable(); 
            $table->string('field_13', 16)->nullable(); 
            $table->integer('field_14')->nullable(); 
            $table->integer('field_15')->nullable(); 
            $table->integer('field_8')->nullable(); 
            $table->integer('field_9')->nullable(); 
            $table->decimal('field_6', 9, 4)->nullable(); 
            $table->string('field_7', 32)->nullable(); 
            $table->integer('field_4')->nullable(); 
            $table->decimal('field_5', 9, 4)->nullable(); 
            $table->integer('field_2')->nullable(); 
            $table->integer('field_3')->nullable(); 
            $table->integer('field_1')->nullable(); 
        });

        DB::unprepared(file_get_contents('database/sql/nationalparks.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationalparks');
    }
}
