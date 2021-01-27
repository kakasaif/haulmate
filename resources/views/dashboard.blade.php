@extends('layout.app')
@section('content')

<div class="dashboard">
    <div class="container">
        <h1 class="with-options">
            Make your move
            <a href="{{route('register_steps')}}" class="property__switch--options"><span class="empty"><?php echo count($user_prefs); ?></span></a>
        </h1>
        <div class="row">
            <div class="col-md-8 col-xl-9 order-2 order-md-1 scroll-container">
                <nav class="navigation">
                    <a href="#areas" class="anchor active">Areas</a>
                    <a href="#relocation" class="anchor">Relocation</a>
                    @foreach ($product_type as $type)
                        <a href="#{{Str::slug($type->name)}}" class="anchor">{{$type->name}}</a>
                        @if ($loop->first)
                            <a href="#community" class="anchor">Community</a>
                        @endif
                    @endforeach
                    {{-- <a href="#" class="anchor">Option</a> --}}
                </nav>
                <h3 class="dashboard__title" id="areas">
                    @if (!count($user_prefs))
                    <span class="title">Popular Areas</span>
                    @else
                    <span class="title">Recommended areas for you</span>
                    @endif
                    @if (Auth::user())
                    <a href="{{route('location.list')}}" class="link">View All Areas</a>
                    @else
                    <a class="register_link link" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(route('location.list'))}}">View All Areas</a>
                    @endif
                </h3>

                <div class="properties mb-5">
                    
                    @include('locations_block', ['locations' => $locations, 'show_properties' => true])
                    
                    @if (!count($user_prefs))
                    <div>
                        <a href="{{route('register_steps')}}" class="properties__item--personalise">
                            <div class="inner">
                                <img src="{{asset('assets/img/personalise-settings.svg')}}" alt="">
                                <span>Personalise your move</span>
                                <p>Tell us what’s important to you to receive personalised area recommendations</p>

                                <img src="{{asset('assets/img/personalise.svg')}}" alt="">
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
                <div id="properties-location"></div>
                
                <h3 class="dashboard__title" id="relocation">
                    <span class="title">International Movers</span>
                </h3>

                @if (!empty($country_from) && !empty($country_to))
                <div class="dashboard__block mb-5">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-7">
                            <p class="mb-0">Get a personalised quote for your move from <b>{{$country_from->country}} to {{$country_to->country}}</b> from our trusted and certified 
                                relocation partners</p>
                        </div>
                        <div class="col-md-5 text-md-right">
                            <form action="{{route('relocation.any')}}" method="POST">
                                @csrf
                                <input type="hidden" name="moving_from" value="{{$country_from->id}}">
                                <input type="hidden" name="moving_to" value="{{$country_to->id}}">
                                @if (Auth::user())
                                <button type="submit" class="btn">Get a quote</button>
                                @else
                                <a class="register_link btn" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(route('relocation.any'))}}">Get a quote</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endif

              @foreach ($product_type as $type)
                <h3 class="dashboard__title" id="{{Str::slug($type->name)}}">
                    <span class="title">{{$type->name}}</span>
                    @if (Auth::user())
                    <a href="{{route('comparison',['id'=>$type->id])}}" class="link">View Comparisons</a>
                    @else
                    <a class="register_link link" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(route('account'))}}">View Comparisons</a>
                    @endif
                </h3>

                @if (isset($product_category[$type->id]) && count($product_category[$type->id]) > 0)
                    <div class="row mb-5 mobile-scroll">
                        @foreach ($product_category[$type->id] as $product)
                            @php
                                $col = round(12 / count($product_category[$type->id]));
                            @endphp
                            <div class="col-lg-{{$col}}">
                                <a href="{{route('comparison',['id'=>$type->id]) . "?product=" . Str::slug($product->name)}}" style="text-decoration: none;">
                                    <div class="dashboard__block inner">
                                        @if (!empty($product->image) && !empty($product->name) && !empty($product->title))
                                            <div class="dashboard__block--icon">
                                                <div class="icon">
                                                    <img src="{{$product->image}}" alt="">
                                                </div>
                                                <div class="right">
                                                    <span class="title">{{$product->name}}</span>
                                                    <span class="text">{{$product->title}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        <span class="dashboard__block--price">{!!$product->subtitle!!}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($loop->first)
                    <div class="marked-block mb-5" id="community">
                        <div class="marked-block__left">
                            <h2>Relocators Community</h2>
                            <p>Learn from those who have moved before you and begin connecting with others moving around the same time as you</p>

                            <div class="buttons">
                                <a href="{{route('community')}}" class="btn">Visit Community</a>
                                <a href="{{route('community')}}?question=true" class="post">Post a Question</a>
                            </div>
                        </div>
                        <div class="marked-block__right">
                            <h2>Trending Posts</h2>
                            @if(!empty($dashboard_links))
                            <ul>
                                @foreach($dashboard_links as $link)
                                <li>
                                    @if (Auth::user())
                                    <a href="{{$link->url}}" target="{{$link->target === 'New Tab' || $link->target === 'New Window' ? '_blank' : '' }}">
                                    @else
                                    <a class="register_link" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode($link->url)}}">
                                    @endif
                                        <span class="trending__items--title text-white">{{$link->title}}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                @endif
              @endforeach
            </div>
            <div class="d-none d-md-block col-md-4 col-xl-3 order-1 order-md-2 scroll-container scroll-bottom">
                <div class="inner scroll-block">
                    @if (!count($user_prefs))
                    <div class="personalise-move">
                        <span class="title">Your selection</span>
                        <p>You have not selected any personalisation filters yet. Tell us more about your move to see a personalised view.</p>

                        <a href="{{route('register_steps')}}" class="btn">Personalise Your Move</a>
                    </div>
                    @else
                    <div class="selection-filter">
                        <div class="selection-filter__title">
                            <span>Your selection</span>

                            <a href="{{route('register_steps')}}" class="edit">Edit</a>
                        </div>
                        <div class="selection-filter__block">
                            <label for="">Relocation</label>
        
                            <div class="relocation">
                                <span><img src="{{$country_from->flag_url}}" alt="" width="23" height="17"></span>
                                <span><img src="{{asset('assets/img/relocation-arrow.svg')}}" alt=""></span>
                                <span><img src="{{$country_to->flag_url}}" alt="" width="23" height="17"></span>
                            </div>
                        </div>
                        <div class="selection-filter__block">
                            <label for="">Lifestyle options</label>
                            <div class="properties__item--options">
                                @if (empty($user_prefs))
                                @else
                                @foreach (collect($user_prefs)->unique('id') as $preference)
                                <div class="properties__item--option">
                                    <img src="{{$preference->icon_url}}" alt="">
                                </div>
                                @endforeach
                                @endif
                            </div>

                            <div>
                                <label for="">Live close to</label>
                                <span class="address"><b>{{$user->live_close ?? 'City Centre'}}</b> within {{$user->remoteness ?? 10}} mins by {{empty($user->transport) || $user->transport === 'public' ? 'public transport' : $user->transport}}</span>
                            </div>
                        </div>
                        @if (!empty($user->moving_with) || !empty($user->moving_on))
                        <div class="selection-filter__block">
                            @if (!empty($user->moving_with))
                            <span class="info">
                                <label for="">Moving with</label>
                                <span>{{$user->moving_with}}</span>
                            </span>
                            @endif
                            @if (!empty($user->moving_on))
                            <span class="info">
                                <label for="">Moving in</label>
                                <span>{{$user->moving_on}}</span>
                            </span>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
        // show hidden properties
        $('.dropdown .dropdown-toggle').on('click', function (e) {
            e.preventDefault();
            var seo_name = $(this).data('seo_name');
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            
            
            $(this).toggleClass('active');
            $('.dropdown .dropdown-toggle').not(this).removeClass('active');

            if ($(this).hasClass('active')) {
                
                $.ajax({
                    url: $("#base_url").val() + '/properties/' + seo_name,
                    type: 'POST',
                    data: {_token: csrf_token},
                })
                .done(function (data) {
                    $("#properties-location").html(data);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('server not responding...');
                });
            } else {
                $('.properties--hidden').removeClass('active');
                $('.properties__item--bottom .btn.dropdown-toggle').removeClass('active');
            }
            
            
        })
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
