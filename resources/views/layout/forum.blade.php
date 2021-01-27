@extends('layout.app')

@section('content')
<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Community</li>
            </ol>
        </nav>
    </div>
</div>

<section class="forum">
    @if(Auth::check())
        <!-- Modal -->
        <div class="modal fade new-topic" id="newTopic" tabindex="-1" role="dialog" aria-labelledby="newTopicLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newTopicLabel">Ask The Community</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><img src="{{asset('assets/img/close-topic.svg')}}" alt=""></span>
                        </button>
                    </div>
                    <form id="newTopicForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="new-topic__user">
                                <div class="poster">
                                    <img src="{{Auth::user()->photo_url}}" alt="">
                                </div>
                                <span class="name">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                <select name="categories" id="category-select" required>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="topic" id="topic" class="form-control" placeholder="Topic Overview (e.g. Best schools for a 7 & 10-year-old)" required>
                            </div>
                            <div class="form-group">
                                <textarea name="question" id="question" class="form-control" placeholder="Enter your question..." required cols="30" rows="5"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="category">Choose Categories</label>
                                <select name="categories" id="category-select" class="select2-forum" multiple="multiple" required>
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> -->

                            <ul>
                                <li>Ask open ended questions to spark conversation amongst community members</li>
                                <li>Write questions in a clear and thoughtful way to get the best responses</li>
                                <li>Thank others when they do respond</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12 alert alert-warning alert-block modal-success-alert" @if(Auth::check()) style="display:none;" @endif>
                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                <strong id="success-message">Guests can read posts from members. To post a question or reply to a thread, please sign-up.</strong>
            </div>
            <div class="col-12 d-md-none">
            </div>
   
            @if (count($popular_topics) > 0)
                <div class="col-12">
                    <h2 class="forum__popular--title">Trending Questions</h2>
                </div>
            @endif
        </div>

        <div class="row forum-row">
            @yield('inner_content')

            <div class="col-md-4 col-xl-3 order-1 order-md-2">
                <!-- only mob -->
                <div class="forum__popular d-md-none">
                    <div class="row">
                        @php
                            $topic_ids = [];
                        @endphp
                        @foreach ($popular_topics as $topic)
                            @php
                                $topic_ids[] = $topic->id;
                            @endphp
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
                <!-- only mob end -->
                <div class="forum__sidebar">
                    <div class="forum__sidebar--search">
                        <form id="topicSearchForm">
                            @csrf
                            <input type="text" id="search_input" name="search" class="form-control" placeholder="Search community">
                            <input type="hidden" id="topic_ids" value="{{ empty($topic_ids) ? '' : implode(',', $topic_ids) }}"/>
                            <span class="search"></span>
                        </form>
                    </div>

                    @if(Auth::check())
                    <a href="#" class="btn" data-toggle="modal" data-target="#newTopic">Ask The Community</a>
                    @else
                    <a class="register_link btn" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Ask The Community</a>
                    @endif

                    <div class="forum__sidebar--filter">
                        <span class="title">Filters</span>

                        <label for="">Tags</label>
                        <ul class="tags-list">
                            @foreach ($tags as $tag)
                                <li>
                                    <a href="#">{{$tag}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('scripts')
<script>
    function update_topics() {
        var search = $('#search_input').val();
        var topic_ids = $('#topic_ids').val();
        var tags = [];
        $('.tags-list li a.active').each(function(item, html) {
            tags.push(html.text);
        });
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        $.ajax({
            url: '{{route("category.topics")}}',
            type: 'POST',
            data: {tags: tags, search: search, topic_ids: topic_ids, _token: csrf_token},
            dataType: "JSON",
        })
        .done(function (data) {
            $('#all_topics').html('');
            var topics = data.topics;
            $.each(topics, function (index, value) {
                $('#all_topics').append(value);
            });
            if (data.search !== '') {
                $('#all_topics').prepend(data.search);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('server not responding...');
        })
        .always(function(jqXHR, textStatus){
//            $('#search_input').val('');
        });
    }

    $(document).ready(function () {
        $('#topicSearchForm').on('submit', function(e){
            e.preventDefault();
            update_topics();
        });

        $('.tags-list li a').on('click', function(event) {
            event.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).attr('style','');
            } else {
                $(this).addClass('active');
                $(this).attr('style','background: #0093E0;color: #fff;');
            }
            update_topics();
        });
        
        $('.search').on('click', function(e){
            $(this).closest('form').submit();
        });

        $('body').on('click', '.topic_link', function(e){
            e.preventDefault();
            var topicForm = '#topicForm-' + $(this).data('id');
            var action = $(topicForm).attr('action') + '?category_id=' + $(this).data('category_id');
            $(topicForm).attr('action', action);
            $(topicForm).submit();
        });
        
        $('#categorySwitch').on('change', function(){
            $('.tab-pane').removeClass('show active');
            var tab = $('#categorySwitch option:selected').data('tab');
            $(tab).addClass('show active');
            update_topics();
        });
        
        $('#newTopicForm').on('submit', function(e){
            e.preventDefault();
            var topic = $('#topic').val();
            var question = $('#question').val();
            var categories = [];
            $('#category-select option:selected').each(function(index, item){
                categories.push($(item).val());
            })
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                url: '{{route("topic.new")}}',
                type: 'POST',
                data: {_token: csrf_token, topic: topic, question: question, categories: categories},
                dataType: "JSON",
            })
            .done(function (data) {
                if (data.result === 'success') {
                    $('#newTopic').modal('hide');
                    update_topics();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                $('#newTopic').modal('hide');
                console.log('server not responding...');
            });
        });
    });
</script>

@yield('inner_scripts')
    <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
