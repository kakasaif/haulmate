<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Topics extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic', 'owner_id', 'last_response', 'is_active'
    ];

    public function categories()
    {
        return $this->hasManyThrough('App\Models\Categories', 'App\Models\Topic_category', 'topic_id', 'id', 'id', 'category_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id', 'id');
    }

    public static function getPopular($limit)
    {
        $user_id = empty(Auth::user()->id) ? 0 : Auth::user()->id;
        $popular_topics = DB::table(DB::Raw('topics t'))
            ->select('t.*', 'u.first_name', 'u.last_name', 'u.photo_url',
                DB::raw("(SELECT COUNT(tq2.id) FROM topic_questions tq2 WHERE tq2.topic_id = t.id) as comments"),
                DB::raw("IF((SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tq.initial = 1 AND tuv.user_id = " . $user_id . "), 1, 0) as voted"),
                DB::raw("(SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tq.initial = 1) as votes")
            )
            ->join(DB::Raw('topic_questions tq'), 't.id', '=', 'tq.topic_id')
            ->join(DB::Raw('users u'), 'u.id', '=', 't.owner_id')
            ->where('tq.initial', '=', 1)
            ->where('tq.updated_at', '>', date('Y-m-d', strtotime("-14 days")))
            ->orderBy('tq.votes', 'desc')
            ->orderBy('comments', 'desc')
            ->orderBy('tq.updated_at', 'desc')
            ->limit($limit)
            ->get();
        return $popular_topics;
    }

}
