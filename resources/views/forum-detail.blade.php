@extends('layout.forum-inner')

@section('inner_content')
<div class="col-md-8 col-xl-9">
    <div class="forum__content">
        <div class="tab-content" id="myTabContent">
            @php
            if($selected_category_id === 0) {
                $class = 'show active';
            } else {
                $class = '';
            }
            @endphp
            <div class="tab-pane fade {{ $class }}" id="all_categories" data-id="0" role="tabpanel" aria-labelledby="all_categories-tab">
            </div>
            @if(!empty($categories))
                @foreach($categories as $category)
                    @php
                    if($category->id === $selected_category_id) {
                        $class = 'show active';
                    } else {
                        $class = '';
                    }
                    @endphp
                    <div class="tab-pane fade {{ $class }}" id="{{$category->seo_name}}" data-id="{{$category->id}}" role="tabpanel" aria-labelledby="{{$category->seo_name}}-tab">
                        @if($category->id === $selected_category_id)
                        <div id="" class="forum__content-single pt-0">
                            <h2 class="forum__content-single--title">{{$topic->topic}} 
                                {{-- <a href="#" class="edit"><img src="{{asset('assets/img/edit-community.svg')}}" alt=""></a> --}}
                            </h2>

                            <div id="topic_comments">
                                <div class="community__item">
                                    <div class="community__item--bottom mb-3 mb-lg-4">
                                        <div class="community__item--user">
                                            <div class="poster">
                                                <img src="{{$topic->owner->photo_url}}" alt="">
                                            </div>
                                            <span class="name">{{$topic->owner->first_name}} {{$topic->owner->last_name}} 
                                                @if (!empty($topic->owner->moving_from) && !empty($topic->owner->moving_to))
                                                    <div class="relocation">
                                                        <span><img src="{{$flags[$topic->owner->moving_from]->flag_url ?? ''}}" alt="" width="23" height="17"></span>
                                                        <span><img src="{{asset('assets/img/relocation-arrow.svg')}}" alt=""></span>
                                                        <span><img src="{{$flags[$topic->owner->moving_to]->flag_url ?? ''}}" alt="" width="23" height="17"></span>
                                                    </div>
                                                @endif
                                            </span>
                                        </div>
                                        {{-- vote-active.svg - green color, vote.svg - default gray --}}
                                        <span class="icon-block votes"><span><img src="{{$question->voted ? asset('assets/img/vote-active.svg') : asset('assets/img/vote.svg')}}" alt=""></span> {{$question->votes}} Votes</span>
                                
                                        <span class="icon-block answers"><span><img src="{{asset('assets/img/answers.svg')}}" alt=""></span> {{count($responses)}} Answers</span>
                                
                                        <span class="icon-block posted-time"><span><img src="{{asset('assets/img/posted-time.svg')}}" alt=""></span> {{time_ago($topic->last_response)}}</span>
                                    </div>

                                    <span class="community__item--text d-none d-md-block mb-3">{{$question->question}}</span>

                                    <div class="tags mb-3 mb-md-5">
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

                                    <div class="community__item--buttons">
                                        @if (Auth::user())
                                        <a href="#newAnswerForm" class="btn anchor">Answer</a>
                                        @else
                                        <a class="register_link btn anchor" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Answer</a>
                                        @endif
                                        <a href="#" class="upvote" data-id="{{$question->id}}" data-topic="{{$question->topic_id}}" data-user="{{$question->user_id}}" >
                                            <span class="upvote-image"><img src="{{$question->voted ? asset('assets/img/vote-active.svg') : asset('assets/img/vote.svg')}}" alt=""></span>
                                            <span>Upvote (<span class="upvote-count">{{$question->votes}}</span>)</span>
                                        </a>
                                    </div>
                                </div>


                                {{-- new responses --}}
                                <div class="responses">
                                    @php
                                        $responses_limit = 5;
                                    @endphp
                                    @foreach ($responses->take($responses_limit) as $response)
                                        @include('forum-detail-response')
                                    @endforeach

                                    @if (count($responses) > $responses_limit)
                                        <a href="#" class="more">Load More</a>
                                        <div class="responses--hidden">
                                            @foreach ($responses->slice($responses_limit, count($responses)) as $response)
                                            @include('forum-detail-response')
                                        @endforeach
                                        </div>
                                    @endif
                                </div>
                                {{-- new responses end --}}



                                {{-- <div class="forum__content-single--item">
                                    <div class="forum__content-single--left">
                                        <div class="poster" style="background: url('{{$question->photo_url}}') no-repeat center center; background-size: cover;"></div>
                                        <span class="country"><img width="20" src="{{empty($countries[$question->moving_from]) ? '' : $countries[$question->moving_from]->flag_url }}" alt=""> <i class="fas fa-arrow-right"></i> <img width="20" src="{{empty($countries[$question->moving_to]) ? '' : $countries[$question->moving_to]->flag_url }}" alt=""></span>
                                        @php
                                        if(empty($question->voted)) {
                                            if(Auth::check()) {
                                                if(Auth::user()->id != $question->user_id) {
                                                    $class = 'likes';
                                                } else {
                                                    $class = 'likes-disabled';
                                                }
                                            } else {
                                                $class = 'likes-disabled';
                                            }
                                        } else {
                                            $class = 'likes active';
                                        }
                                        @endphp
                                        <div class="{{ $class }}" data-id="{{$question->id}}" data-topic="{{$question->topic_id}}" data-user="{{$question->user_id}}">
                                            <i class="fas fa-thumbs-up"></i>
                                            <span>{{ $question->votes ?? 0}} Likes</span>
                                        </div>
                                    </div>
                                    <div class="forum__content-single--right">
                                        <span class="author">By {{$question->first_name . ' ' . $question->last_name }}</span>
                                        <span class="date">{{time_ago($question->created_at)}}</span>

                                        <p>{{$question->question}}</p>
                                    </div>
                                </div> --}}
                                {{-- @foreach($responses as $response)
                                <div class="forum__content-single--item">
                                    <div class="forum__content-single--left">
                                        <div class="poster" style="background: url('{{$response->photo_url}}') no-repeat center center; background-size: cover;"></div>
                                        <span class="country"><img width="20" src="{{empty($countries[$question->moving_from]) ? '' : $countries[$question->moving_from]->flag_url }}" alt=""> <i class="fas fa-arrow-right"></i> <img width="20" src="{{empty($countries[$question->moving_to]) ? '' : $countries[$question->moving_to]->flag_url }}" alt=""></span>
                                        @php
                                        if(empty($response->voted)) {
                                            if(Auth::check()) {
                                                if(Auth::user()->id != $response->user_id) {
                                                    $class = 'likes';
                                                } else {
                                                    $class = 'likes-disabled';
                                                }
                                            } else {
                                                $class = 'likes-disabled';
                                            }
                                        } else {
                                            $class = 'likes active';
                                        }
                                        @endphp
                                        <div class="{{ $class }}" data-id="{{$response->id}}" data-topic="{{$response->topic_id}}" data-user="{{$response->user_id}}">
                                            <i class="fas fa-thumbs-up"></i>
                                            <span>{{ $response->votes ?? 0}} Likes</span>
                                        </div>
                                    </div>
                                    <div class="forum__content-single--right">
                                        <span class="author">Reply from {{$response->first_name . ' ' . $response->last_name }}</span>
                                        <span class="date">{{time_ago($response->created_at)}}</span>

                                        <p>{{$response->question}}</p>
                                    </div>
                                </div>
                                @endforeach --}}
                            </div>

                            @auth
                            <form id="newAnswerForm" action="{{ route('answer.save') }}" method="POST" class="forum__content-single--form">
                                
                                {{-- <div class="forum__content-single--left">
                                    <div class="poster"style="background: url('{{Auth::user()->photo_url}}') no-repeat center center; background-size: cover;">

                                    </div>
                                </div> --}}
                                <div class="forum__content-single--right">
                                    @csrf
                                    <div class="forum__content-single--form-block">
                                        <!--<input id="answer_token" type="hidden" value="{{-- csrf_token() --}}"/>-->
                                        <h2 class="forum__content-single--title">Submit Your Answer</h2>
                                        <input id="topic_id" type="hidden" value="{{ $topic->id }}"/>
                                        <textarea name="" id="answer" cols="30" rows="10" class="form-control" placeholder="Type your answer..."></textarea>
                                        {{-- <input id="answer" type="text" value="" class="form-control left" /> --}}
                                        <button id="sendAnswerBtn" class="btn btn-primary right" type="submit" disabled>Submit</button>
                                        <div id="errors" style="display:none"></div>
                                    </div>
                                </div>
                                
                            </form>
                            @endauth
                        </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<style>
    .error {
        border-color: red;
    }
    .mb-10 {
        margin-bottom: 10px;
    }
</style>
    @if(!empty($styles))
        @foreach($styles as $style)
        <link rel="stylesheet" href="{{ asset($style) }}">
        @endforeach
    @endif
@endsection

@section('inner_scripts')
    @if(!empty($scripts))
        @foreach($scripts as $script)
        <script src="{{ asset($script) }}"></script>
        @endforeach
    @endif
<script>
    $(document).ready(function () {
        $('#answer').on('input', function () {
            $('#errors').hide();
            if ($(this).val() === '')
                $('#sendAnswerBtn').attr('disabled', true);
            else
                $(this).removeClass('error');
            $('#sendAnswerBtn').attr('disabled', false);
        });

        $('#newAnswerForm').on('submit', function (e) {
            e.preventDefault();
            var topic = $('#topic_id').val();
            var answer = $('#answer').val();
            if (answer === '') {
                $('#answer').addClass('error');
                $('#sendAnswerBtn').attr('disabled', true);
                return false;
            }

//            var csrf_token = $('#answer_token').val();
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                url: '{{route("answer.save")}}',
                type: 'POST',
                data: {_token: csrf_token, topic_id: topic, question: answer},
                dataType: "JSON",
            })
            .done(function (data) {
//                if (data.message !== undefined) {
//                    $('#errors').append('<div>' + message + '</div>');
//                    $('#errors').show();
//                }
                if (data.answer !== undefined) {
                    $('#topic_comments').append(data.answer);
                    $('#answer').val('');
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('server not responding...');
            });
        });

        // like community
        $(document).on("click",".votes, .upvote",function(e) {
            var self = $(this);
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            var question_id = $(this).data('id');
            var topic_id = $(this).data('topic');
            var owner_id = $(this).data('user');
            $.ajax({
                url: '{{route("likes.add")}}',
                type: 'POST',
                data: {_token: csrf_token, question_id: question_id, topic_id: topic_id, owner_id: owner_id},
                dataType: "JSON",
            })
            .done(function (data) {
                if (data.status === 'success') {
                    $(self).find('.upvote-count').html(data.likes);
//                    $(self).removeClass('likes').addClass('likes-disabled').addClass("active");
                    if(data.icon_active)
                        var upvote_img = $("#base_url").val() + '/assets/img/vote-active.svg';
                    else
                        var upvote_img = $("#base_url").val() + '/assets/img/vote.svg';
                    $(self).find('img').attr('src',upvote_img);
                } else {
//                    $(self).removeClass('likes').addClass('likes-disabled');
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('server not responding...');
            });
        });
    });
</script>
@endsection
