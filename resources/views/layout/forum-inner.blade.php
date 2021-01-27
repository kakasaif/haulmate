@extends('layout.app')

@section('content')
<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{url('/community')}}">Community</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$topic_title}}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="forum">
    <div class="container">
        <div class="row">
            <div class="col-12 alert alert-warning alert-block modal-success-alert" @if(Auth::check()) style="display:none;" @endif>
                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                <strong id="success-message">Guests can read posts from members. To post a question or reply to a thread, please sign-up.</strong>
            </div>
        </div>

        <div class="row forum-row">
            @yield('inner_content')

            <div class="col-md-4 col-xl-3 order-1 order-md-2">
                <div class="forum__sidebar">
                    <div class="dashboard__block">
                        <span class="dashboard__block--label">Share with others</span>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>

                    <div class="dashboard__block">
                        <span class="dashboard__block--label">Related Posts</span>
                        <ul class="dashboard__block--related">
                            @foreach ($related_posts as $post)
                            <li>
                                <a href="{{route('topic.show',['id'=>$post->id])}}">
                                    {{$post->topic}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>

            

        </div>
    </div>
</section>

@yield('inner_scripts')

@endsection