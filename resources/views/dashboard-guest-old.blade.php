@extends('layout.app')
@section('content')

<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12 d-md-none">
                <div class="dashboard__sidebar--hello">
                    @if (Auth::user())
                    <div class="poster"
                        style="background: url('{{!empty(Auth::user()->photo_url) ? Auth::user()->photo_url : asset('/assets/img/default-circle.png')}}') no-repeat center center; background-size: cover;">
                    </div>
                    <span>Hi, {{ Auth::user()->first_name }}! <a href="{{ route('profile') }}" class="url">Edit Profile</a></span>
                    @else
                    <span class="pl-0 mb-2" style="font-size:16px;">Save your progress, create your account</span>
                    <a href="{{url('/register?ref=' . Request::url())}}" class="btn">Save search</a>
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-lg-3 order-2 order-md-1">
                <div class="dashboard__sidebar">

                    <div class="dashboard__sidebar--hello d-none d-md-block @if (!Auth::user()) guest @endif">
                        @if (Auth::user())
                        <div class="poster"
                            style="background: url('{{!empty(Auth::user()->photo_url) ? Auth::user()->photo_url : asset('/assets/img/default-circle.png')}}') no-repeat center center; background-size: cover;">
                        </div>
                        <span>Hi, {{ Auth::user()->first_name }}! <a href="{{url('/profile')}}" class="url">Edit Profile</a></span>
                        @else
                        <span class="mb-2" style="font-size:16px;">Save your progress, create your account</span>
                        <a href="{{url('/register?ref=' . Request::url())}}" class="btn">Save search</a>
                        @endif
                    </div>
                    <!-- <div class="block">
                        <span class="dashboard__sidebar--title-red">Live like a local - Today’s hot tip:</span>
                        <p>In Singapore, most expats live in condos which typically have facilities such as a pool, gyms and BBQ pits!</p>
                    </div> -->

                    <div class="block">
                        <span class="dashboard__sidebar--title-join">Join the conversation & start meeting others</span>

                        <div class="trending">
                            <span class="trending__title">Trending now:</span>
                          
                            <div class="trending__items">
                                @if(!empty($topics))
                                @foreach($topics as $value)
                                    <div class="trending__items--item">
                                        <div class="trending__items--poster"
                                            style="background: url('{{!empty($value->photo_url) ? $value->photo_url : asset('/assets/img/default-circle.png')}}') no-repeat center center; background-size: cover;">

                                        </div>
                                        @php
                                            $topic_url = url('/topic/'.$value->id.'/show');
                                            $topic_ref = Auth::user() ? $topic_url : 'register?ref=' . urlencode($topic_url);
                                        @endphp
                                        <a href="{{$topic_ref}}">
                                            <span class="trending__items--title">{{$value->topic}}</span>
                                        </a>
                                    </div>
                                @endforeach
                                @endif
                            </div>

                            <a href="{{Auth::user() ? route('community') : 'register?ref=' . urlencode(route('community'))}}" class="btn">Post a question</a>
                        </div>
                    </div>

                    <div class="block">
                        <span class="dashboard__sidebar--title">What you need to know before you move:</span>

                        <ul class="links">
                            @foreach ($dashboard_links as $link)
                                <li class="links--item">
                                    <a href="{{$link->url}}" {{get_href_target($link->target, $link->url)}}>{{$link->title}}</a>
                                </li> 
                            @endforeach
                        </ul>
                    </div>

                    <div class="block">
                        <span class="dashboard__sidebar--title mb-3">Jump back in</span>


                        <p>Your favorite searches are saved below</p>

                        <div class="block__list">
                            <span class="block__list--title"><span><img src="{{asset('assets/img/property_icon.svg')}}" alt=""></span> Property</span>

                            @if (isset($housing_faves) && count($housing_faves) > 0)
                            <ul>
                                @foreach ($housing_faves as $housing)
                                    @php
                                        $images = $housing->housing->images->all();
                                        $main_image = array_shift($images);

                                        $property_url = url('/property/'.$housing->housing_id);
                                        $property_ref = Auth::user() ? $property_url : 'register?ref=' . urlencode($property_url);
                                    @endphp
                                    <li>
                                        <a href="{{$property_ref}}">
                                            <div class="left">
                                                <div class="poster"
                                                    style="background: url('{{$main_image->image_url}}') no-repeat center center; background-size: cover;">

                                                </div>
                                            </div>
                                            <div class="right">
                                                <span class="title">{{$housing->housing->title}}</span>
                                                <span class="title-second">{{$housing->housing->location->location}}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @else
                            <p>Click on the Heart icon to add your favorite properties here</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 order-1 order-md-2">
                <div class="dashboard__content wide-m">
                    <h2>Organise Your New Life</h2>

                    <div class="block">
                        <span class="dashboard__content--title">Recommended areas to live <a href="{{url('/locations')}}" class="little_text"><span>Explore More Locations</span></a></span>

                        <div class="dashboard__content--areas">

                            @if(!empty($locations))
                            @foreach($locations as $location)
                            @if (!empty($location->images))
                            @php
                                $images = collect($location->images)->sortBy('order')->toArray();
                                $main_image = array_shift($images);
                                $pref_count = 0;
                            @endphp
                            <div>
                                @php
                                    $location_url = url('location/' . $location->seo_name);
                                    $url = Auth::user() ? $location_url : 'register?ref=' . urlencode($location_url);
                                @endphp
                                <a href="{{$url}}" class="search-block__item" data-id="{{ $location->id }}" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                                    <span>{{$location->location}}</span>
                                    <div class="search-block__item--hover">
                                        <div class="top">
                                            <span class="like @if(isset($faves) && in_array($location->id, $faves)) active @endif" data-id="{{$location->id}}">
                                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                            </span>
                                            <span onclick="document.location.href='{{$url}}'">{{$location->location}}</span>
                                            <span class="blacklist" data-id="{{$location->id}}">
                                                <img src="{{asset('assets/img/close_w.svg')}}" alt="">
                                            </span>
                                        </div>

                                        @php
                                        $low_rent_score = 0;
                                        @endphp
                                        @if(!empty($location->prefs))
                                            @foreach($location->prefs as $preference)
                                                @php
                                                    if ($preference->preference === "Cost of Rent") {
                                                        $low_rent_score = $preference->score;
                                                    }
                                                @endphp
                                            @endforeach
                                        @endif
                                       
                                        <table class="content">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="progress">
                                                            <div class="progress-bar bar-fill-{{$low_rent_score}}" role="progressbar"
                                                                aria-valuenow="{{$low_rent_score}}" aria-valuemin="0"
                                                                aria-valuemax="5"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <span class="title"> Cost of Rent</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="content">
                                            <tr>
                                                <td colspan="2">
                                                    <div class="progress">
                                                        <div class="progress-bar bar-fill-{{$location->distance_from_center}}" role="progressbar"
                                                            aria-valuenow="{{$location->distance_from_center}}" aria-valuemin="0" aria-valuemax="5"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <span class="title">Distance to Centre</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        {{-- @if(!empty($location->prefs))
                                       
                                        <table class="content">
                                            <tbody>
                                                @foreach($location->prefs as $preference)
                                                @if($pref_count++ > 1)
                                                @php
                                                break
                                                @endphp
                                                @endif
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="progress">
                                                            <div class="progress-bar bar-fill-{{$preference->score}}" role="progressbar"
                                                                aria-valuenow="{{$preference->score}}" aria-valuemin="0"
                                                                aria-valuemax="5"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <span class="title"><span>
                                                        <img width="22" src="{{$preference->icon_url ?? ''}}"/></span> {{$preference->preference}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif --}}
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>

                    </div>

                    <div class="block">
                        <span class="dashboard__content--title">Start organising your move from one place</span>
                        <span class="dashboard__content--text">These services have been recommended based on your needs. Click <a href="{{url('/profile#services')}}">here</a> to update your required services</span>

                        <div class="tasks">
                            @if (!empty($partners))
                                @include('partners', ['partners' => $partners])
                            @endif


<!--
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task2.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Conduct a video tour of
                                        areas I’m interested in</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    @if (Auth::user())
                                    <a href="{{url('/relocation/1')}}" class="btn bottom">Learn More</a>
                                    @else
                                    <a href="{{url('/register?ref=/'. urlencode(url('/relocation/1')))}}" class="btn bottom">Learn More</a>
                                    @endif


                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task3.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Shortlist the best 5
                                        rentals in my top areas</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    @if (Auth::user())
                                    <a href="{{url('/relocation/1')}}" class="btn bottom">Learn More</a>
                                    @else
                                    <a href="{{url('/register?ref=/'. urlencode(url('/relocation/1')))}}" class="btn bottom">Learn More</a>
                                    @endif


                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task4.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Create your own taks</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    @if (Auth::user())
                                    <a href="{{url('/relocation/1')}}" class="btn bottom">Learn More</a>
                                    @else
                                    <a href="{{url('/register?ref=/'. urlencode(url('/relocation/1')))}}" class="btn bottom">Learn More</a>
                                    @endif

                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task1.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Attend a property
                                        inspection and film it</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    @if (Auth::user())
                                    <a href="{{url('/relocation/1')}}" class="btn bottom">Learn More</a>
                                    @else
                                    <a href="{{url('/register?ref=/'. urlencode(url('/relocation/1')))}}" class="btn bottom">Learn More</a>
                                    @endif
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="block">
                        <span class="dashboard__content--title">Moving your things overseas? Get an instant quote from our trusted relocation partners</span>

                        <form id="stepsForm" method="POST" action="{{route('relocation.any')}}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="movingFrom">Moving from</label>
                                        <select name="moving_from" id="movingFrom" class="select2-flags">
                                            <option value="" disabled selected>Please select</option>
                                        </select>
                                        <span id="movingFromError" class="error" style="display:none">Please make your choice</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="movingTo">Moving to</label>
    
                                        <select name="moving_to" id="movingTo" class="select2-flagss">
                                            <option value="" disabled selected>Please select</option>
                                        </select>
        
                                        <span id="movingToError" class="error" style="display:none">Please make your choice</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="promo__footer">
                                <a href="#" type="submit" class="btn start_btn" data-type="start">Get Quote</a>
                            </div>
                        </form>
                    </div>

                    <div class="block">
                        <span class="dashboard__content--title">Recommended Properties</span>

                        <div class="tasks">
                            @if(!empty($properties))
                            @foreach($properties as $property)
                            @php
                            $images = $property->images->all();
                            $main_image = array_shift($images);
                            @endphp
                            @php
                                $property_url = url('/property/'.$property->id);
                                $property_ref = Auth::user() ? $property_url : 'register?ref=' . urlencode($property_url);
                            @endphp
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--property">
                                        <div class="tasks__item--property-hover">
                                            <div class="top">
                                                <span class="like @if(isset($housing_faves_ids) && in_array($property->id, $housing_faves_ids)) active @endif" data-id="{{$property->id}}" data-properties="true">
                                                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                                </span>
                                                 <span class="close">
                                                    <!-- <img src="{{asset('assets/img/close_w.svg')}}" alt=""> -->
                                                </span> 
                                            </div>
                                        </div>

                                        <img src="{{$main_image->image_url ?? '-'}}" alt="">
                                    </div>

                                    <span class="tasks__item--title">{{$property->title}}</span>
                                    <span class="tasks__item--price">${{number_format($property->rate,2)}}</span>
                                    <span class="tasks__item--location">{{$property->location->location}}</span>
                                    @if (Auth::user())
                                    <a href="{{$property_ref}}" class="btn">View Property</a>
                                    @else
                                    <a href="{{$property_ref}}" class="btn bottom">Learn More</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
        $('.partnerClick').on('click', function(e){
            e.preventDefault();
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            var partner_id = $(this).data('id');
            var redirect_to = $(this).data('action');
            $.ajax({
                url: '{{route("partner.increment_views")}}',
                type: 'POST',
                data: {_token: csrf_token, id: partner_id},
                dataType: "JSON",
            })
            .done(function (data) {
                window.location = redirect_to;
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('server not responding...');
            });

        });

        $(document).ready(function(){
        $('.start_btn').on('click', function(e){
            $('#movingFromError').hide();
            $('#movingToError').hide();
            e.preventDefault();
//            $(this). children("option:selected"). val();
            if ($(this).data('type') === 'start') {
                if ($('#movingFrom').children("option:selected").val() === '') {
                    $('#movingFromError').show();
                    return false;
                }
                if ($('#movingTo').children("option:selected").val() === '') {
                    $('#movingToError').show();
                    return false;
                }
            }
            $('#stepsForm').submit();
        });

        //select2 countries
        var country = [
            <?php
            if(!empty($countries)) {
                foreach($countries as $country) {
                    echo json_encode($country) . ',';
                    if (!empty($country_from) && $country_from === $country->code)
                        $country_from = $country;
                    else if (!empty($country_to) && $country_to === $country->code)
                        $country_to = $country;
                }
             }
            ?>
        ];
        
        country = country.map(function (obj, label) {
            return { id: obj.id, text: obj.country, url: obj.flag_url };
        })
//        console.log(country);

        function formatCountry (country) {
            if (!country.id) { return country.text; }
            var $country = $(
                '<span><span class="flag-icon"><img src=' + country.url +' /></span>' +
                '<span class="flag-text">' + country.text + "</span></span>"
            );
            return $country;
        };

        function formatCountries (country) {
            if (!country.id) { return country.text; }
            if (country.text == "Singapore"){
                var $country = $(
                    '<span><span class="flag-icon"><img src=' + country.url +' /></span>' +
                    '<span class="flag-text">' + country.text + "</span></span>"
                );
            }
           
            return $country;
        };

        $('.select2-flags').select2({
            data: country,
            templateResult: formatCountry,
            templateSelection: formatCountry
        });
        $('.select2-flagss').select2({
            data: country,
            templateResult: formatCountries,
            templateSelection: formatCountries,
//            templateResult: formatCountry,
//            templateSelection: formatCountry
        });

        $('.select2-flags, .select2-flagss').on('select2:open', function (e) {
            $('.select2-container').css('z-index', '3')
        });

        <?php if (!empty($country_from->id)) { ?>
            $('.select2-flags').val('<?=$country_from->id?>').trigger('change');
        <?php } ?>

        <?php if (!empty($country_to->code) && $country_to->code === 'SG') { ?>
            $('.select2-flagss').val('<?=$country_to->id?>').trigger('change');
        <?php } ?>
    });
</script>
@endsection
