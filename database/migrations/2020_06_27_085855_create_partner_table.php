<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('category');
            $table->string('banner_url');
            $table->string('banner_title')->nullable();
            $table->string('banner_subtitle')->nullable();
            $table->string('banner_button')->nullable();
            $table->string('banner_action')->nullable();
            $table->text('body');
            $table->string('button_text');
            $table->string('action');
            $table->enum('type', ['affiliate', 'relocation'])->default('relocation');
            $table->integer('order');
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
        Schema::dropIfExists('partner');
    }

}
