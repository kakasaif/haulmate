<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitialInTopicQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_questions', function (Blueprint $table)
        {
            $table->tinyInteger('initial')->default(0)->after('question');
        });
        $topics = DB::table('topics')->get()->all();
        foreach ($topics as $topic) {
            $initial_question = DB::table('topic_questions')->selectRaw('MIN(created_at) as min_date')->where('topic_id', $topic->id)->groupBy('topic_id')->get()->first();
            if (!empty($initial_question->min_date))
                DB::table('topic_questions')->where('created_at', $initial_question->min_date)->update(['initial' => 1]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_questions', function (Blueprint $table)
        {
            $table->dropColumn('initial');
        });
    }

}
