@extends('layout.app')
@section('content')

<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Areas</li>
            </ol>
        </nav>
    </div>
</div>

<section class="property location-list">
    <div class="property__switch d-md-none">
        <div class="property__switch--inner">
            <a href="#" class="mapView">Map View</a>
            <a href="#" class="listView active">List View</a>
        </div>
        <a href="{{route('register_steps')}}" class="property__switch--options">
            @if (count($user_pref_ids) > 0)
                <span><?php echo count($user_pref_ids); ?></span>
            @endif
        </a>
    </div>
    {{-- <div class="property__switch--filter d-md-none">
        <a href="#" class="active">Rental</a>
        <a href="#">Co living</a>
        <a href="#" class="active">Service Appartment</a>
    </div> --}}
    <div class="property__right">

        <div class="map">
            <div class="acf-map" data-zoom="7" id="mapSize">
                {{-- @if(!empty($location->properties))
                    @foreach($location->properties as $property)
                        @php
                        $images = $property->images->all();
                        $main_image = array_shift($images);
                        @endphp
                        <div class="marker" data-lat="{{$property->latitude ?? 1.3119708 }}" data-lng="{{$property->longitude ?? 103.8603588 }}">
                            <div class="marker__item">
                                <div class="marker__item--left">
                                    <div class="poster"  style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">

                                    </div>
                                </div>
                                <div class="marker__item--right">
                                    <span class="title">{{$property->title}}</span>
                                    <span class="price">${{number_format($property->rate)}}</span>

                                    <div class="bottom">
                                        <a href="{{route('property', $property->id)}}" class="btn">View Property</a>

                                        <a href="#" class="like @if(in_array($property->id, $housing_faves))fill @endif" data-id="{{$property->id}}" data-properties="true"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif --}}
                @foreach ($locations as $location)        
                    <div class="marker" data-lat="{{$location->latitude}}" data-lng="{{$location->longitude}}" data-id="{{$location->id}}" data-favourite="<?php if (in_array($location->id, $faves)) { echo asset('assets/img/map_icon_marked.svg'); } else { echo asset('assets/img/map_icon.svg'); }?>"></div>
                @endforeach
                @foreach ($search_locations as $location)        
                    <div class="marker" data-lat="{{$location->latitude}}" data-lng="{{$location->longitude}}" data-id="{{$location->id}}" data-favourite="<?php if (in_array($location->id, $faves)) { echo asset('assets/img/map_icon_marked.svg'); } else { echo asset('assets/img/map_icon.svg'); }?>"></div>
                @endforeach
            </div>
            
        </div>
    </div>
    <div class="property__left">

        <div class="property__left--selection">
            <label for="">
                <span>Your selection<a href="{{route('register_steps')}}" class="edit">Edit</a></span> 

                <div class="property__left--search">
                    <form action="{{route('locations.find')}}" method="POST">
                        @csrf
                        <input type="text" class="form-control autoComplete" id="find" name="search" placeholder="Search Area" autocomplete="off" value="{{ $search ?? ''}}" >
                        <button type="submit"><img src="{{asset('assets/img/search.svg')}}" alt="Search Area"></button>
                    </form>
                </div>
            </label>

            <div class="property__left--options">
                <div>
                    <label for="">Relocation</label>

                    <div class="relocation">
                        <span><img src="{{$country_from->flag_url ?? ''}}" alt="" width="21"></span>
                        <span><img src="{{asset('assets/img/relocation-arrow.svg')}}" alt=""></span>
                        <span><img src="{{$country_to->flag_url ?? ''}}" alt="" width="21"></span>
                    </div>
                </div>
                <div>
                    <label for="">Lifestyle options</label>
                    <div class="properties__item--options">
                        @if(!empty($user_detail->preferences))
                            @php
                                $good_prefs = [];
                                $show_count = 50;
                                $counter = 0;
                            @endphp
                            @foreach($user_detail->preferences as $preference)
                                @php
                                    $good_prefs[] = $preference;
                                @endphp
                                @if (++$counter <= $show_count)
                                    <div class="properties__item--option">
                                        <img src="{{$preference->icon_url ?? ''}}" alt="">
                                    </div>
                                @endif
                            @endforeach
                            @if (count($good_prefs) - $show_count > 0)
                                <div class="properties__item--option">
                                    +{{ count($good_prefs) - $show_count }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div>
                    <label for="">Live close to</label>
                    <span class="address"><b>{{$user->live_close ?? 'City Centre'}}</b> within {{$user->remoteness ?? 10}} mins by {{empty($user->transport) || $user->transport === 'public' ? 'public transport' : $user->transport}}</span>
                </div>
                <div>

                </div>
            </div>
        </div>

        @if (count($locations))
        <h3 class="dashboard__title">
            <span class="title">Top {{count($locations)}} Area{{count($locations)>1?'s':''}}</span>
        </h3>
      
        <div class="properties">
            @include('location_areas', ['locations' => $locations])
        </div>
        @endif

        @if (count($search_locations))
        <h3 class="dashboard__title">
            <span class="title">Found {{count($search_locations)}} Area{{count($search_locations)>1?'s':''}} for '{{$search}}'</span>
        </h3>
      
        <div class="properties">
            @include('location_areas', ['locations' => $search_locations])
        </div>
        @endif

        {{-- <form action="">
            <div class="form-group">
              <input type="text" class="form-control" name="search_area" id="search_area" placeholder="Search Area">
            </div>
        </form>

        <div class="properties" id="search_result">
        </div> --}}

    </div>
</section>

@endsection

@section('scripts')
<style>.ui-autocomplete{z-index:1000 !important;}</style>
<script>
    function close_button(){
        $('.close-pref').on('click',function(){
            var id = $(this).data("id");
            $('.id-'+id).remove();
            $('#pref-'+id).prop('checked',false);
        });
    }

    function update_results(clicked){
        var preferences = [];
        $(".prefs:checked").each(function(index, obj){
            preferences.push(obj.value);
        });
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var remoteness = $('#remoteness option:selected').val();
        var live_close = $('#live_close').val();
        if (live_close === '')
            live_close === 'City Hall';
        var transport = $('#transport').val();
        $.ajax({
            url: '{{route("locations.search")}}',
            data: {preferences: preferences, remoteness: remoteness, live_close: live_close, transport: transport, _token: csrf_token},
            method: 'POST',
            success: function(result) {
                $('#locations_result').html(result.html);
                if (clicked) {
                    $('.overlay').hide();
                    $('.filterModal').hide();
                }
            }
        });
    }

    $(document).ready(function(){
        close_button()
        $(".prefs").on('click',function(){
            var called = true;
            if($(this).prop("checked") == true){
                var value = $(this).val(),
                    name = $(this).data('name');
                // var html = `<a href="#" class="btn id-${value} filter">${name} <span><img class="close-pref" data-id="${value}" src="{{asset('assets/img/close.svg')}}" alt=""></span></a>`
                // $('.search-block__filter--right').append(html);
               
            }
            else if($(this).prop("checked") == false){
                var value = $(this).val(),
                    name = $(this).data('name');
                    $('.id-'+value).remove();
            }
            close_button();
            // $('#updateBtn').click();
            update_results(false);
        });

        $('.min-input').on('input',function(){
            $('.min').html($(this).val())
            $('.money').show();
        });

        $('.max-input').on('input',function(){
            $('.max').html($(this).val())
            $('.money').show();
        });

        $('.close-button').on('click',function(){
            $('.money').hide();
            $('.max').html(0)
            $('.min').html(0)
            $('.max-input').val('');
            $('.min-input').val('');
        });

        $('#updateBtn').on('click', function(e){
            e.preventDefault();
            update_results(true);
        });

        $('#remoteness, #transport, #live_close').on('change',function(){
            // $('#updateBtn').click();
            update_results(false);
        });

        // autocomplete
        var autocomplete = '';
        $('#live_close').on('input', function () {
            var location = $('#live_close').val();
            if (location.length >= 3) {
                if (autocomplete !== '')
                    autocomplete.abort();
                autocomplete = $.get(
                    `https://developers.onemap.sg/commonapi/search?searchVal=${location}&returnGeom=Y&getAddrDetails=Y&pageNum=1`,
                    function (data, status) {
                        var curr_location = $('#live_close').val();
                        if (curr_location !== location)
                            return false;
                        if (data.results.length > 0) {
                            var address = data.results.map((e) => {
                                return e.ADDRESS;
                            });

                            $('.autoComplete').autocomplete({
                                source: address,
                                select: function( event, ui ) {
                                    $('#live_close').val(ui.item.value);
                                    // $('#updateBtn').click();
                                    update_results(false);
                                }
                            });
                            $('.autoComplete').autocomplete('search', location);
                        }
                    }
                );
            }
        });

        $("#search_area").on('keyup', function() {
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            var search = $('#search_area').val();
            $.ajax({
                url: '{{route("locations.search_area")}}',
                type: 'POST',
                data: {search: search, _token: csrf_token},
                dataType: "JSON",
            })
            .done(function (data) {
                $('#search_result').html('');
                $('#search_result').html(data.locations);
                if (data.search !== '') {
                    $('#search-title').remove();
                    $('#search_result').before(data.search);
                }
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('server not responding...');
            });
        });

        var autocomplete2 = '';
        $('#find').on('input', function () {
            var search = $(this).val();
            if (search.length > 1) {
                if (autocomplete2 !== '')
                    autocomplete2.abort();
                var csrf_token = $('meta[name=csrf-token]').attr('content');
                autocomplete2 = $.post(
                    "{{route('locations.autocomplete')}}",
                    {search: search, _token: csrf_token},
                    function (data, status) {
                        console.log(data);
                        if (data.results.length > 0) {
                            var links = data.results.map((e) => {
                                return { label: e.location, value: e.seo_name };
                            });

                            $('.autoComplete').autocomplete({
                                source: links,
                                select: function( event, ui ) {
                                    window.location = '{{url("location")}}/' + ui.item.value;
                                }
                            });
                            $('.autoComplete').autocomplete('search', search);
                        }
                    }
                );
            }
        });
    });
</script>

@endsection