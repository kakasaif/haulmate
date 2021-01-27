@if(!empty($locations))
    @foreach($locations as $location)
        @if(!empty($location->images))
            @php
                if(is_a($location->images, 'Illuminate\Database\Eloquent\Collection')) {
                    $images = $location->images->sortBy('order')->toArray();
                } else {
                    $images = collect($location->images)->sortBy('order')->toArray();
                }
                if (gettype($images) === 'object') {
                    $main_image = $location->images->first();
                } else {
                    $main_image = array_shift($images);
                }
                if (is_array($main_image))
                    $main_image = (object) $main_image;
            @endphp
        @endif
        @php
        $pref_count = 0;
        @endphp

        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{url('location/' . $location->seo_name)}}" data-id="{{ $location->id }}" class="search-block__item" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                <span>{{$location->location}}</span>
                <div class="search-block__item--hover">
                    <div class="top">
                        <span class="like @if(in_array($location->id, $faves)) active @endif" data-id="{{$location->id}}">
                            <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                            <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                        </span>
                        <span>{{$location->location}}</span>
                        <span class="close">
                            <!--<img src="{{asset('assets/img/close_w.svg')}}" alt="">-->
                        </span>
                    </div>

                    @php
                    $low_rent_score = 0;
                    @endphp
                    @if(!empty($location->prefs))
                        @foreach($location->prefs as $preference)
                            @php
                                if ($preference->preference != "Low Rent") {
                                    continue;
                                } else {
                                    $low_rent_score = $preference->score;
                                }
                            @endphp
                        @endforeach
                    @endif
                    
                    @if(!empty($location->prefs))
                    <table class="content">
                        <tbody>
                            <tr>    
                                <td>
                                    <span class="title">
                                        {{-- <span> <img width="22" src="https://www.haulmate.co/assets/img/icons/icon3.png"/></span>  --}}
                                    Low Rent</span>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bar-fill-{{$low_rent_score}}" role="progressbar" aria-valuenow="{{$low_rent_score}}" aria-valuemin="0" aria-valuemax="5"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>    
                                <td>
                                    <span class="title">
                                        {{-- <span>
                                    <img width="22" src="https://www.haulmate.co/storage/icon/I4HP9FI4gQxUE1PbjVxbzNjYb8bPi3JZeRxQwhId.png"/></span> --}}
                                     Distance to Centre</span>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bar-fill-{{$location->distance_from_center}}" role="progressbar" aria-valuenow="{{$location->distance_from_center}}" aria-valuemin="0" aria-valuemax="5"></div>
                                    </div>
                                </td>
                            </tr>
                            @foreach($location->prefs as $preference)
                                @if($pref_count < 2 && in_array($preference->preference, [
                                    'Families',
                                    'Singles/Couples',
                                    'Singles / Couples',
                                    'Students',
                                ]))
                                    <tr>    
                                        <td>
                                            <span class="title">
                                                <!-- <span><img width="22" src="{{$preference->icon_url ?? ''}}"/></span> -->
                                            {{$preference->preference}}</span>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bar-fill-{{$preference->score}}" role="progressbar" aria-valuenow="{{$preference->score}}" aria-valuemin="0" aria-valuemax="5"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $pref_count++
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </a>
        </div>
    @endforeach
@endif
