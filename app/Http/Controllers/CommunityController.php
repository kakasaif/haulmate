<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicAnswer;
use App\Models\Categories;
use App\Models\Topics;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use View;

class CommunityController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::where('is_active', 1)->get()->all();
        $selected_category_id = 0;
        $all_topics = Topics::where('is_active', 1)->orderBy('last_response', 'desc')->with('categories')->get()->all();
        $tags = [];
        foreach ($all_topics as $topic) {
            foreach ($topic->categories as $category) {
                $tags[] = $category->category;
            }
        }
        $tags = collect($tags)->unique();
        $popular_topics = Topics::getPopular(3);
        return view('community', compact('categories', 'selected_category_id', 'tags', 'popular_topics'));
    }

    public function category_topics(Request $request)
    {
        $user_id = empty(Auth::user()->id) ? 0 : Auth::user()->id;
        $topics = [];
        $topic_ids = empty($request->topic_ids) ? '' : explode(',', $request->topic_ids);
        $query = DB::table(DB::raw('topic_questions tq'))
                ->select('tq.topic_id', 'tq.user_id', 'tq.question', 'tq.votes', 't.id', 't.topic', 't.last_response',
                    'u.first_name', 'u.last_name', 'u.username', 'u.photo_url', 'u.moving_from', 'u.moving_to',
                    DB::raw('o.first_name as owner_first_name, o.last_name as owner_last_name, o.photo_url as owner_photo_url, o.moving_from as owner_moving_from, o.moving_to as owner_moving_to'),
                    DB::raw("(SELECT COUNT(tq2.id) FROM topic_questions tq2 WHERE tq2.topic_id = t.id) as comments"),
                    DB::raw("IF((SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tq.initial = 1 AND tuv.user_id = " . $user_id . "), 1, 0) as voted"),
                    DB::raw("(SELECT COUNT(tuv2.id) FROM topic_user_votes tuv2 WHERE tuv2.question_id = tq.id AND tq.initial = 1) as votes")
                )
                ->join(DB::raw('users u'), 'u.id', '=', "tq.user_id")
                ->join(DB::raw('topics t'), 't.id', '=', "tq.topic_id")
                ->join(DB::raw('users o'), 'o.id', '=', "t.owner_id")
                ->when(empty($request->search), function($query) use ($topic_ids)
                {
                    if (empty($topic_ids))
                        return $query->where('tq.initial', '=', 1);
                    return $query->where('tq.initial', '=', 1)->whereNotIn('tq.topic_id', $topic_ids);
                })
                ->when(!empty($request->tags), function($query) use ($request)
                {
                    return $query->whereIn('tq.topic_id', function($query) use ($request)
                        {
                            $query->selectRaw('DISTINCT(tc2.topic_id)')
                                ->from(DB::raw('topic_category tc2'))
                                ->join(DB::raw('categories c'), 'c.id', '=', 'tc2.category_id')
                                ->whereIn('c.category', $request->tags);
                        });
                })
                ->when(!empty($request->search), function($query) use ($request)
                {
                    return $query->selectRaw('POSITION(\''. $request->search . '\' IN tq.question) AS question_match_position')
//                        ->selectRaw('POSITION(\''. $request->search . '\' IN t.topic) AS topic_match_position')
                        ->where(function($query) use ($request)
                        {
                            $query->where('tq.question', 'like', "%$request->search%")
                                ->orWhere('t.topic', 'like', "%$request->search%");
                        });
                })
                ->orderBy('t.last_response', 'desc');
        $all_topics = $query->get()->all();

        if (!empty($all_topics)) {
            $countries = get_countries(['is_active' => 1], []);
            foreach ($all_topics as $topic) {
                if (empty($topics[$topic->topic_id])) {
                    $categories = DB::table('categories')
                            ->selectRaw('DISTINCT(categories.category)')
                            ->join('topic_category', 'topic_category.category_id', '=', 'categories.id')
                            ->where('categories.is_active', 1)
                            ->where('topic_category.topic_id', $topic->topic_id)
                            ->get()->all();
                    $tags = [];
                    foreach ($categories as $category) {
                        $tags[] = $category->category;
                    }
                    $responses = (int) $topic->comments - 1;
                    $responses_text = ($responses === 1) ? '<span class="responses">1 response</span>' : '<span class="responses">' . $responses . ' responses</span>';

                    $start = 0;
                    $question_length = strlen($topic->question);
                    $max_length = 200;
                    if ($question_length > $max_length) {
                        if (empty($topic->question_match_position)) {
                            $topic->question_substr = substr($topic->question, 0, $max_length) . ' ...';
                        } else {
                            $clean_additional_length = $max_length - strlen($request->search);
                            if ($topic->question_match_position > $clean_additional_length) {
                                if ($question_length - $topic->question_match_position > ceil($clean_additional_length / 2)) {
                                    $start = $topic->question_match_position - $clean_additional_length / 2;
                                    if ($start > 0)
                                        $topic->question_substr = '... ' . substr($topic->question, $start, $max_length) . ' ...';
                                    else
                                        $topic->question_substr = substr($topic->question, 0, $max_length) . ' ...';
                                } else {
                                    $topic->question_substr = '... ' . substr($topic->question, $question_length - $max_length);
                                }
                            } else {
                                $topic->question_substr = substr($topic->question, 0, $max_length) . ' ...';
                            }
                        }
                    } else {
                        $topic->question_substr = $topic->question;
                    }
                    $topic_row = View::make('community-topic-row', compact('topic', 'tags', 'responses', 'request'));
                    $topics[$topic->topic_id] = $topic_row->render();
                }
            }
        }
        $search = '';
        if (!empty($request->search)) {
            $search = '<div class="forum__content--item">
                <h4>Found ' . count($topics) . ' topics for "' . $request->search . '"</h4>
            </div>';
        }
        return response()->json(['topics' => $topics, 'search' => $search]);
    }

    public function add_topic(Request $request)
    {
        if (empty($request->categories)) {
            return response()->json(['status' => 'error', 'message' => 'Category must be provided']);
        }

        foreach ($request->categories as $category_id) {
            if (empty($category_id))
                return response()->json(['status' => 'error', 'message' => 'Category must be provided']);
        }

        $topic_id = DB::table('topics')->insertGetId([
            'topic' => $request->topic,
            'owner_id' => Auth::user()->id,
            'last_response' => date('Y-m-d H:i:s'),
            'is_active' => 1
        ]);

        // add the topic to a categories
        foreach ($request->categories as $category_id) {
            DB::table('topic_category')->insert(['topic_id' => $topic_id, 'category_id' => $category_id]);
        }

        // add question to topic
        DB::table('topic_questions')->insert([
            'topic_id' => $topic_id,
            'user_id' => Auth::user()->id,
            'question' => $request->question,
            'initial' => 1
        ]);

        return response()->json(['result' => 'success']);
    }

    public function show_topic($topic_id, Request $request)
    {
        $categories = Categories::where('is_active', 1)->get()->all();
        $topic = Topics::where('id', $topic_id)->with('owner', 'categories')->get()->first();
        $first_topic_category = isset($topic->categories) ? $topic->categories->first() : '';

        if (empty($first_topic_category) || empty($topic)) {
            return abort(404);
        }

        $selected_category_id = empty($request->category_id) ? (empty($first_topic_category->id) ? 0 : (int) $first_topic_category->id) : (int) $request->category_id;
        $styles = ['assets/admin/plugins/sweetalert2/sweetalert2.min.css'];
        $scripts = ['assets/admin/plugins/sweetalert2/sweetalert2.min.js'];

        $user_id = empty(Auth::user()->id) ? 0 : Auth::user()->id;
        $countries = get_countries(['is_active' => 1]);
        $question = DB::table(DB::Raw('topic_questions tq'))
                ->select('tq.*', 'u.first_name', 'u.last_name', 'u.username', 'u.photo_url', 'u.moving_from', 'u.moving_to', DB::raw("IF((SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tuv.user_id = " . $user_id . "), 1, 0) as voted"))
                ->join(DB::Raw('users u'), 'u.id', '=', 'tq.user_id')
                ->where('tq.topic_id', $topic->id)
                ->orderBy('tq.id', 'asc')
                ->get()->first();
        $responses = DB::table(DB::Raw('topic_questions tq'))
            ->select('tq.*', 'u.first_name', 'u.last_name', 'u.username', 'u.photo_url', 'u.moving_from', 'u.moving_to', DB::raw("IF((SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tuv.user_id = " . $user_id . "), 1, 0) as voted, DATEDIFF('" . date('Y-m-d') . "', tq.updated_at) as days_ago"))
            ->join(DB::Raw('users u'), 'u.id', '=', 'tq.user_id')
            ->where('tq.topic_id', $topic->id)
            ->where('tq.id', '!=', $question->id)
            ->orderBy(DB::raw('tq.votes - days_ago'), 'desc')
            ->get();
        $counter = 0;

        $tags = [];
        $tags_ids = [];
        foreach ($topic->categories as $category) {
            $tags[] = $category->category;
            $tags_ids[] = $category->id;
        }

        $related_posts = DB::table(DB::Raw('topics t'))
            ->select('t.id', 't.topic')
            ->join(DB::Raw('topic_category tc'), 'tc.topic_id', '=', 't.id')
            ->whereIn('tc.category_id', $tags_ids)
            ->where('t.id', '!=', $topic->id)
            ->groupBy([
                't.id',
                't.topic',
            ])
            ->limit(5)
            ->orderBy('t.created_at', 'desc')
            ->get();

        $topic_title = $topic->topic;

        $flags = get_countries(['is_active' => 1], []);

        return view('forum-detail', compact('flags', 'user_id', 'topic_title', 'related_posts', 'categories', 'topic', 'selected_category_id', 'question', 'responses', 'countries', 'styles', 'scripts', 'tags'));
    }

    public function save_answer(StoreTopicAnswer $request)
    {
        if (!Auth::check())
            return redirect('/login');

        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $answer_id = DB::table('topic_questions')->insertGetId($validated);
        $answer = DB::table(DB::Raw('topic_questions tq'))
                ->select('tq.*', 'u.first_name', 'u.last_name', 'u.username', 'u.photo_url', 'u.moving_from', 'u.moving_to', DB::raw(
                        "IF((SELECT COUNT(tuv.id) FROM topic_user_votes tuv WHERE tuv.question_id = tq.id AND tuv.user_id = " . $validated['user_id'] . "), 1, 0) as voted"
                ))
                ->join(DB::Raw('users u'), 'u.id', '=', 'tq.user_id')
                ->where('tq.id', $answer_id)
                ->get()->first();
        $topic_id = $validated['topic_id'];
        DB::table('topics')->where('id', $topic_id)->update(['last_response' => $answer->created_at]);

        $countries = get_countries(['is_active' => 1]);
        if (!empty($answer->moving_from) && !empty($countries[$answer->moving_from]))
            $flag_from_url = $countries[$answer->moving_from]->flag_url;
        if (!empty($answer->moving_to) && !empty($countries[$answer->moving_to]))
            $flag_to_url = $countries[$answer->moving_to]->flag_url;

        $answer_html = View::make('forum-detail-response', ['response' => $answer])->render();
        return response()->json(['answer' => $answer_html]);
    }

    public function search_topics(Request $request)
    {
        $categories = Categories::where('is_active', 1)->get()->all();
        $selected_category_id = 0;
        $search = empty($request->search) ? '' : $request->search;
        $popular_topics = Topics::getPopular(3);
        $all_topics = Topics::where('is_active', 1)->orderBy('last_response', 'desc')->with('categories')->get()->all();
        $tags = [];
        foreach ($all_topics as $topic) {
            foreach ($topic->categories as $category) {
                $tags[] = $category->category;
            }
        }
        $tags = collect($tags)->unique();
        return view('community', compact('tags', 'popular_topics', 'categories', 'selected_category_id', 'search'));
    }

    public function like(Request $request)
    {
        // check if logged in
        if (!Auth::check())
            return response()->json(['status' => 'error', 'message' => 'Only logged in users can vote']);

        // check if it's own response
        $user = Auth::user();
        if ($user->id == $request->owner_id)
            return response()->json(['status' => 'error', 'message' => 'You can\'t vote on your own comment']);

        // check if already voted
        $votes = DB::table('topic_user_votes')
                ->where('topic_id', $request->topic_id)
                ->where('question_id', $request->question_id)
                ->where('user_id', $user->id)
                ->get()->count();
        ;
        if ($votes) {
            $votes = DB::table('topic_user_votes')
                ->where('topic_id', $request->topic_id)
                ->where('question_id', $request->question_id)
                ->where('user_id', $user->id)
                ->delete();
            // update topic question votes
            DB::table('topic_questions')->where('id', $request->question_id)->decrement('votes');
            $icon_active = false;
        } else {
            // insert topic user vote
            DB::table('topic_user_votes')->insert([
                'topic_id' => $request->topic_id,
                'question_id' => $request->question_id,
                'user_id' => $user->id
            ]);
            // update topic question votes
            DB::table('topic_questions')->where('id', $request->question_id)->increment('votes');
            $icon_active = true;
        }

        $question = DB::table('topic_user_votes')
                ->select(DB::raw('COUNT(id) as likes'))
                ->where('question_id', $request->question_id)
                ->groupBy('question_id')
                ->get()->first();
        if (empty($question->likes))
            $likes = 0;
        else
            $likes = $question->likes;

        return response()->json(['status' => 'success', 'likes' => $likes, 'icon_active' => $icon_active]);
    }

}
