@foreach($properties as $property)
    @php
        $loc_images = $property->images->all();
        $main_loc_image = array_shift($loc_images);
    @endphp
    <div>
        <div class="properties__item">
            <div class="properties__item--poster" style="background: url('{{$main_loc_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                <span class="like {{in_array($property->id, $faves) ? 'active fill' : ''}}" data-id="{{$property->id}}" data-properties="true">
                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                </span>
            </div>
            <a href="{{route('property', $property->id)}}" class="properties__item--title">{{$property->title}}</a>
            <span class="properties__item--price">${{number_format($property->rate)}} per month</span>

            <div class="properties__item--bottom">
                <span><img src="{{asset('assets/img/bed.svg')}}" alt=""> {{$property->bedrooms}}</span>
                <span><img src="{{asset('assets/img/bath.svg')}}" alt=""> {{$property->showers}}</span>
                <span class="type">{{$property->type->type}}</span>
            </div>
        </div>
    </div>
@endforeach