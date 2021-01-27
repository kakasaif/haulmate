<div class="community__item--single">
  <div class="left">
      {{-- vote-active.svg - green color, vote.svg - default gray --}}
      <span class="icon-block votes" 
        data-id="{{$response->id}}" 
        data-topic="{{$response->topic_id}}" 
        data-user="{{$response->user_id}}" >
        <span class="upvote-image"><img width="60" src="{{$response->voted ? asset('assets/img/vote-active.svg') : asset('assets/img/vote.svg')}}" alt=""></span> 
          <span><b class="upvote-count">{{$response->votes}}</b> Votes</span> 
          
      </span>
  </div>
  <div class="right">
      <div class="community__item--user mb-2 mb-lg-3">
          <div class="poster">
              <img src="{{$response->photo_url}}" alt="">
          </div>
          <span class="name">{{$response->first_name}} {{$response->last_name}}</span>
          <span class="date">{{date('F j, Y', strtotime($response->created_at))}}</span>
      </div>
      <span class="community__item--text mb-0">{{$response->question}}</span>

      {{-- <a href="#" class="edit"><img src="{{asset('assets/img/edit-community.svg')}}" alt=""></a> --}}
  </div>
</div>