<div class="community__item">
    <a href="{{route('topic.show',['id'=>$topic->id])}}" class="community__item--question">{!!empty($request->search) ? $topic->topic : str_replace([ucfirst($request->search), strtolower($request->search), strtoupper($request->search)], ['<b><u>' . ucfirst($request->search) . '</u></b>', '<b><u>' . strtolower($request->search) . '</u></b>', '<b><u>' . strtoupper($request->search) . '</u></b>'], $topic->topic)!!}</a>
    <span class="community__item--text">{!!empty($request->search) ? $topic->question_substr : str_replace([ucfirst($request->search), strtolower($request->search), strtoupper($request->search)], ['<b><u>' . ucfirst($request->search) . '</u></b>', '<b><u>' . strtolower($request->search) . '</u></b>', '<b><u>' . strtoupper($request->search) . '</u></b>'], $topic->question_substr)!!}</span>

    <div class="community__item--bottom">
        <div class="community__item--user">
            <div class="poster">
                <img src="{{$topic->owner_photo_url}}" alt="">
            </div>
            <span class="name">{{$topic->owner_first_name}} {{$topic->owner_last_name}}</span>
        </div>
        <!-- vote-active.svg - green color, vote.svg - default gray -->
        <span class="icon-block votes"><span><img src="{{$topic->voted ? asset('assets/img/vote-active.svg') : asset('assets/img/vote.svg')}}" alt=""></span> {{$topic->votes}} Votes</span>

        <a href="{{route('topic.show',['id'=>$topic->id])}}">
            <span class="icon-block answers"><span><img src="{{asset('assets/img/answers.svg')}}" alt=""></span> {{$responses}} Answers</span>
        </a>

        <span class="icon-block posted-time"><span><img src="{{asset('assets/img/posted-time.svg')}}" alt=""></span> {{time_ago($topic->last_response)}}</span>

        <div class="tags">
            <label for="">Tags:</label>

            <ul class="tags__list">
                @if (count($tags) > 0)
                    @php
                        $tags_limit = 2;
                    @endphp
                    @foreach (collect($tags)->take($tags_limit) as $tag)
                        <li>
                            <a href="#">{{$tag}}</a>
                        </li>
                    @endforeach
                    @if (count($tags) > $tags_limit)
                        <li>
                            <a href="#">+{{count($tags) - $tags_limit}}</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
