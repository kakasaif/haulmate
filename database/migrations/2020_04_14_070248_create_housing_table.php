<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousingTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housing', function (Blueprint $table)
        {
            $table->id();
            $table->string('title');
            $table->decimal('rate', 16, 2);
            $table->text('description');
            $table->bigInteger('location_id');
            $table->integer('bedrooms');
            $table->integer('persons');
            $table->string('showers', 10);
            $table->string('area', 20);
            $table->date('listed_date');
            $table->string('source_url', 500);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('housing');
    }

}
