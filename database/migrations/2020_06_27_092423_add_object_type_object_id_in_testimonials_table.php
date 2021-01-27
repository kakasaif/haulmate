<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObjectTypeObjectIdInTestimonialsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table)
        {
            $table->enum('object_type', ['home', 'partner', 'property'])->default('home')->after('image_url');
            $table->integer('object_id')->nullable()->after('object_type');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table)
        {
            $table->dropColumn('object_type');
            $table->dropColumn('object_id');
        });
    }

}
