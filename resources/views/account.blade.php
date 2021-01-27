@extends('layout.app')
@section('content')

<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12 d-md-none">
                <div class="dashboard__sidebar--hello">
                    @if (Auth::user())
                        <div class="poster" style="background: url('{{asset('assets/img/poster_dashboard.png')}}') no-repeat center center; background-size: cover;">
                        </div>
                        <span>Hi, {{ Auth::user()->first_name }}! <a href="{{ route('profile') }}" class="url">Edit Profile</a></span>
                    @else
                        <span style="font-size:16px;">Save your progress, create your account <a class="register_link url" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Register</a></span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-lg-3 order-2 order-md-1">
                <div class="dashboard__sidebar">
                    
                    <div class="dashboard__sidebar--hello d-none d-md-block">
                        @if (Auth::user())
                            <div class="poster" style="background: url('{{asset('assets/img/poster_dashboard.png')}}') no-repeat center center; background-size: cover;">
                            </div>
                            <span>Hi, {{ Auth::user()->first_name }}! <a href="{{url('/profile')}}" class="url">Edit Profile</a></span>
                        @else
                         <span style="font-size:16px;">Save your progress, create your account <a class="register_link url" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Register</a></span>
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
                                
                                <div class="trending__items--item">
                                    <div class="trending__items--poster" style="background: url('{{asset('assets/img/trending1.png')}}') no-repeat center center; background-size: cover;">
                                     
                                    </div>
                                    <a href="{{url('community')}}">
                                    <span class="trending__items--title">Anyone knows good agent?</span>
                                    </a>
                                </div>
                               
                               
                                <div class="trending__items--item">
                                    <div class="trending__items--poster" style="background: url('{{asset('assets/img/trending2.png')}}') no-repeat center center; background-size: cover;">
                                    </div>
                                    <a href="{{url('community')}}">
                                    <span class="trending__items--title">My 30 days in Singapore</span>
                                    </a>
                                </div>
                               
                            </div>

                            <a href="{{url('community')}}?question=true" class="btn">Post a question</a>
                        </div>
                    </div>

                    <div class="block">
                        <span class="dashboard__sidebar--title">What you need to know before you move:</span>

                        <ul class="links">
                            <li class="links--item">
                                <a href="#">Visa & Immigration</a>
                            </li>
                            <li class="links--item">
                                <a href="#">How to get around</a>
                            </li>
                            <li class="links--item">
                                <a href="#">Typical expat lifestyle</a>
                            </li>
                            <li class="links--item">
                                <a href="#">Bank account</a>
                            </li>
                            <li class="links--item">
                                <a href="#">Tips for finding your perfect home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9 order-1 order-md-2">
                <div class="dashboard__content wide-m">
                    <h2>Organise Your New Life</h2>

                    <div class="block">
                        <span class="dashboard__content--title">Potential areas to live <a href="{{url('/locations')}}" class="add"><img src="{{asset('assets/img/plus.svg')}}" alt=""></a></span>

                        <div class="dashboard__content--areas">

                            @if(!empty($locations))
                                @foreach($locations as $location)
                                    @if(!empty($location->images))
                                        @php
                                        $images = $location->images;
                                        $main_image = array_shift($images);
                                        $pref_count = 0;
                                        @endphp
                                        <div>
                                            <a href="{{url('location/' . $location->seo_name)}}" class="search-block__item" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;" data-id="{{ $location->id }}">
                                                <span>{{$location->location}}</span>
                                                <div class="search-block__item--hover">
                                                    <div class="top">
                                                        <span class="like @if(isset($faves) && in_array($location->id, $faves)) active @endif" data-id="{{$location->id}}">
                                                            <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                                            <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                                        </span>
                                                        <span onclick="document.location.href='{{url('location/' . $location->seo_name)}}'">{{$location->location}}</span>
                                                        <span class="blacklist"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                                                    </div>

                                                    @if(!empty($location->prefs))
                                                    <table class="content">
                                                        <tbody>
                                                            @foreach($location->prefs as $preference)
                                                                @if($pref_count++ > 1)
                                                                    @php
                                                                    break
                                                                    @endphp
                                                                @endif
                                                                <tr>
                                                                    <td>
                                                                        <span class="title"><span>
                                                                            <img width="22" src="{{$preference->icon_url ?? ''}}"/></span> {{$preference->preference}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="progress">
                                                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$preference->score}}" aria-valuemin="0" aria-valuemax="5" style="width: {{$preference->score * 100 / 5}}%;"></div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        {{$preference->preference}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
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
                        <span class="dashboard__content--text">These services have been recommended based on your needs. Click <a href="#">Here</a> to update your required services</span>

                        <div class="tasks">
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task1.svg')}}" alt="">
                                    </div>

                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Attend a property inspection and film it</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    @if (Auth::user())
                                        <a href="{{url('/partner')}}" class="btn bottom">Learn More</a>
                                    @else
                                        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/partner'))}}">Learn More</a>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task2.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Conduct a video tour of areas I’m interested in</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    
                                    @if (Auth::user())
                                        <a href="{{url('/partner')}}" class="btn bottom">Learn More</a>
                                    @else
                                        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/partner'))}}">Learn More</a>
                                    @endif                                    
                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task3.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Shortlist the best 5 rentals in my top areas</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    
                                    @if (Auth::user())
                                        <a href="{{url('/partner')}}" class="btn bottom">Learn More</a>
                                    @else
                                        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/partner'))}}">Learn More</a>
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
                                        <a href="{{url('/partner')}}" class="btn bottom">Learn More</a>
                                    @else
                                        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/partner'))}}">Learn More</a>
                                    @endif                                    
                                    
                                </div>
                            </div>
                            <div>
                                <div class="tasks__item">
                                    <div class="tasks__item--poster">
                                        <img src="{{asset('assets/img/task1.svg')}}" alt="">
                                    </div>
                                    <span class="tasks__item--title">10% off international Relocation</span>
                                    <span class="tasks__item--price" style="font-size: 12px">Attend a property inspection and film it</span>
                                    <span class="tasks__item--location">Category</span>
                                    <br><br>
                                    
                                    @if (Auth::user())
                                        <a href="{{url('/partner')}}" class="btn bottom">Learn More</a>
                                    @else
                                        <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/partner'))}}">Learn More</a>
                                    @endif                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <span class="dashboard__content--title">Get an instant relocation quotes</span>

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
                                    <div>
                                        <div class="tasks__item">
                                            <div class="tasks__item--property">
                                                <div class="tasks__item--property-hover">
                                                    <div class="top">
                                                        <span class="like @if(isset($faves) && in_array($location->id, $faves)) active @endif" data-id="{{$location->id}}">
                                                            <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                                            <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                                        </span>
                                                        <span class="close">
                                                            <!--<img src="{{asset('assets/img/close_w.svg')}}" alt=""> -->
                                                        </span>
                                                    </div>
                                                </div>
                                                <img src="{{$main_image->image_url ?? ''}}" alt="">
                                            </div>

                                            <span class="tasks__item--title">Attend a property inspection and film it</span>
                                            <span class="tasks__item--price">${{number_format($property->rate)}}</span>
                                            <span class="tasks__item--location">{{$property->location->location}}</span>
                                            @if (Auth::user())
                                                <a href="{{url('/property-partner')}}" class="btn">View Property</a>
                                            @else
                                                <a class="register_link btn bottom" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(url('/property-partner'))}}">Learn More</a>
                                            @endif                                            
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- <div class="block">
                        <span class="dashboard__content--title">Recommended Properties</span>

                        <div class="dashboard__content--deals">
                            <div>
                                <a href="#" class="offers__item" style="background: url('{{asset('assets/img/offer1.png')}}') no-repeat center center; background-size: cover;">
                                    <span class="offers__item--label">Movers</span>
            
                                    <div class="offers__item--footer">
                                        <div class="offers__item--logo">
                                            <img src="{{asset('assets/img/crown.png')}}" alt="">
                                        </div>
                                        <span class="offers__item--discount">20%</span>
                                    </div>
                                </a>
                                <span class="offers__item__info"><b>20%</b> off international relocation with <b>Movers.sg</b></span>
                            </div>
                            <div>
                                <a href="#" class="offers__item" style="background: url('{{asset('assets/img/offer2.png')}}') no-repeat center center; background-size: cover;">
                                    <span class="offers__item--label">Pet Relocation</span>
            
                                    <div class="offers__item--footer">
                                        <div class="offers__item--logo">
                                            <img src="{{asset('assets/img/jason.png')}}" alt="">
                                        </div>
                                        <span class="offers__item--discount">10%</span>
                                    </div>
                                </a>
                                <span class="offers__item__info"><b>10%</b> off pet relocation from <b>Jason’s Pet Relocation</b></span>
                            </div>
                            <div>
                                <a href="#" class="offers__item" style="background: url('{{asset('assets/img/offer3.png')}}') no-repeat center center; background-size: cover;">
                                    <span class="offers__item--label">Property</span>
            
                                    <div class="offers__item--footer">
                                        <div class="offers__item--logo">
                                            <img src="{{asset('assets/img/property.png')}}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <span class="offers__item__info">Find a place to call home and room mates with <b>Hemlet</b></span>
                            </div>
                            <div>
                                <a href="#" class="offers__item" style="background: url('{{asset('assets/img/offer4.png')}}') no-repeat center center; background-size: cover;">
                                    <span class="offers__item--label">Bank Account</span>
            
                                    <div class="offers__item--footer">
                                        <div class="offers__item--logo">
                                            <img src="{{asset('assets/img/dbs.png')}}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <span class="offers__item__info">Instant sign-up for a bank account at <b>DBS</b></span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
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

    function formatCountry (country) {
        if (!country.id) { return country.text; }
        var $country = $(
        '<span><span class="flag-icon"><img src='+ country.url +' /></span>' +
        '<span class="flag-text">'+ country.text+"</span></span>"
        );
        return $country;
    };
//    console.log(country);

    function formatCountries (country) {
        if (!country.id) { return country.text; }
        if (country.text == "Singapore"){
        var $country = $(
        '<span><span class="flag-icon"><img src='+ country.url +' /></span>' +
        '<span class="flag-text">'+ country.text+"</span></span>"
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
//            templateResult: formatCountries,
//            templateSelection: formatCountries,
        templateResult: formatCountry,
        templateSelection: formatCountry
    });

    $('.select2-flags, .select2-flagss').on('select2:open', function (e) {
        $('.select2-container').css('z-index', '3')
    });

    <?php if (!empty($country_from)) { ?>
        $('.select2-flags').val('<?=$country_from->id?>').trigger('change');
    <?php } ?>

    <?php if (!empty($country_to)) { ?>
        $('.select2-flagss').val('<?=$country_to->id?>').trigger('change');
    <?php } ?>
});
</script>
@endsection