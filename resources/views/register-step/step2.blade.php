<h2>What do you need to organise?</h2>
<p>Save money by receiving personalised offers based only on what you need</p>

<div class="row justify-content-center">
  <div class="col-lg-10">
    <div class="blocks">
      <div class="row">
        @if(!empty($services))
        @php
          $selected = "";
          if (isset($user_detail) && isset($user_detail->services)) {
            $user_services = $user_detail->services->pluck('service.name')->toArray();
          }
        @endphp
        @foreach($services as $service)
          @php
            if (isset($user_services)) {
              $selected = in_array($service->name, $user_services) ? 'active' : '';
            }
          @endphp
        <div class="col-6 col-md-4">
          <div class="blocks__item {{$selected}}" data-id="{{$service->id}}">
            <div class="blocks__item--poster">
              <img class="default" src="{{$service->default_icon_url}}" alt="">
              <img class="active" src="{{$service->active_icon_url}}" alt="" style="display: none;">
            </div>
            <span class="blocks__item--title">{{$service->name}}</span>
            <span class="blocks__item--text">{{$service->description}}</span>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</div>