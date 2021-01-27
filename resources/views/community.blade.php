@extends('layout.forum')

@section('meta_title','Community - Haulmate')
@section('meta_description','Connect with a global community of expats and learn from those who have moved to Singapore before you ')
@section('meta_keywords','Living in Singapore, Moving to Singapore, expats, relocation, community')

@section('inner_content')
<div class="col-md-8 col-xl-9 order-2 order-md-1">
    <div class="forum__popular d-none d-md-block">
            <div class="row">
                @foreach ($popular_topics as $topic)
                <div class="col-lg-4">
                    <a href="{{route('topic.show',['id'=>$topic->id])}}" style="text-decoration: none;">
                        <div class="inner">
                            <span class="title">{{$topic->topic}}</span>
        
                            <div class="forum__popular--bottom">
                                <div class="poster">
                                    <img src="{{$topic->photo_url}}" alt="{{$topic->first_name}} {{$topic->last_name}}">
                                </div>
                                <div class="right">
                                    <span class="name">{{$topic->first_name}} {{$topic->last_name}}</span>
                                    <span class="votes"><span><img src="{{$topic->voted ? asset('assets/img/vote-active.svg') : asset('assets/img/vote.svg')}}" alt=""></span> {{$topic->votes}} Votes</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    <h2 class="forum__popular--title">Discussions & Questions</h2>
    <div class="forum__content">
        <div class="tab-content" id="myTabContent">
            <div id="all_topics"></div>
        </div>
    </div>
</div>
@endsection

@section('inner_scripts')
@if (Request::get('question') == "true" && Auth::user())
    <script>
        $(document).ready(function () {
            $("#newTopic").modal('show');
        });
    </script>
@endif
@if (Request::get('question') == "true" && !Auth::user())
    <script>
        $(document).ready(function () {
            $("#signModal").modal('show');
        });
    </script>
@endif
<script>
    $(document).ready(function () {
        update_topics();
    });
</script>
@endsection
