@foreach ($partners as $partner)
<div>
    <div class="tasks__item">
        <div class="tasks__item--poster">
            <img src="{{asset($partner->icon_url)}}" alt="">
        </div>

        <span class="tasks__item--title">{{$partner->title}}</span>
        <span class="tasks__item--price" style="font-size: 12px">{{$partner->subtitle}}</span>
        <span class="tasks__item--location">{{$partner->category}}</span>
        <br><br>

        @if (Auth::user())
        <a class="partnerClick btn bottom" data-id="{{$partner->id}}" data-action="{{url('/' . $partner->type . '/' . $partner->id)}}" href="#">{{$partner->button_text}}</a>
        @else
        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/' . $partner->type . '/' . $partner->id))}}">{{$partner->button_text}}</a>
        @endif
    </div>
</div>
@endforeach
