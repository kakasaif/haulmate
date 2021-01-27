@foreach ($locations as $location)
    @php
        $images = isset($location->images) ? (array) $location->images : [];
        $main_image = array_shift($images);
    @endphp
    <div class="col-md-6 col-lg-4 content" data-id="{{$location->id}}">
        <div class="properties__item">
            <div class="properties__item--poster" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                <span class="like {{in_array($location->id, $faves) ? 'fill active' : ''}}" data-id="{{$location->id}}">
                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                </span>
                @if (count($user_pref_ids) > 0)
                <span class="properties__item--matched {{$location->perc_match >= 75 ? 'active' : ''}}">{{$location->perc_match}}% Match</span>
                @endif
            </div>
            <a href="{{route('location',['seo_name'=> $location->seo_name])}}" class="properties__item--title">{{$location->location}}</a>
            <div class="properties__item--options">
                @if(!empty($location->prefs))
                    @php
                        $good_prefs = [];
                        $show_count = 4;
                        $counter = 0;
                    @endphp
                    @foreach($location->prefs as $preference)
                        @if ($preference->score >= 4)
                            @php
                                $good_prefs[] = $preference;
                            @endphp
                            @if (++$counter <= $show_count)
                            <div class="properties__item--option">
                                <img src="{{$preference->icon_url ?? ''}}" alt="">
                            </div>
                            @endif
                        @endif
                    @endforeach
                    @if (count($good_prefs) - $show_count > 0)
                        <div class="properties__item--option">
                            +{{ count($good_prefs) - $show_count }}
                        </div>
                    @endif
                @endif
                <div class="properties__item--options-hidden">
                    <span class="title">Most known for</span>

                    <ul>
                        @if(!empty($good_prefs))
                            @foreach($good_prefs as $preference)
                                <li>
                                    <span class="icon">
                                        <img src="{{$preference->icon_url ?? ''}}" alt="">
                                    </span>
                                    {{$preference->preference}}
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <span class="properties__item--text">Within {{ $location->time_distance }} mins by {{ $location->transport }} from {{ $location->from_place }}</span>
            <?php /*<span class="properties__item--text">Rents starting from ${{number_format($location->avg_rent)}}</span>*/?>

            <div class="properties__item--bottom">
                <a href="{{route('location',['seo_name'=> $location->seo_name])}}" class="btn">Learn More</a>
            </div>
        </div>
    </div>
@endforeach
