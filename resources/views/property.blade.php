@extends('layout.app')
@section('content')

<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('properties.list', $property->location->seo_name)}}">All Properties in {{$property->location->location}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$property->title}}</li>
            </ol>
        </nav>
    </div>
</div>

@php
    $images = $property->images->all();
    $main_image = array_shift($images);
@endphp
<div class="location-info__mob d-md-none">
    <div class="location-info__mob--slider">
        
    @if(!empty($images))
        <a href="{{$main_image->image_url}}" data-fancybox="gallery" class="location-info__mob--item" @if(!empty($main_image->image_url)) style="background: url('{{$main_image->image_url}}') no-repeat center center; background-size: cover;" @endif>
            
        </a>
        @foreach($images as $image)
            <a href="{{$image->image_url}}" data-fancybox="gallery" style="background: url('{{$image->image_url}}') no-repeat center center; background-size: cover;" class="location-info__mob--item">

            </a>
        @endforeach
    @endif
    </div>
    <a href="{{$images[0]->image_url}}" class="view-photos" data-fancybox="gallery" >View Photos</a>
</div>

<div class="location-slider d-none d-md-block">
    @if(!empty($images))
        @if (count($images) > 4)
            <a href="#" class="prev"><i class="fas fa-chevron-circle-left"></i></a>
            <a href="#" class="next"><i class="fas fa-chevron-circle-right"></i></a>
        @endif
    @endif
    <div class="scrollbar-outer">
        <div class="location-info__scroll">
            <div class="location-info__main-image">
                @if(!empty($main_image->image_url))
                    <a href="{{$main_image->image_url}}" data-fancybox="gallery" class="location-info__item" style="background: url('{{$main_image->image_url}}') no-repeat center center; background-size: cover;"></a>
                @endif
            </div>
            <div class="location-info__images">
                @if(!empty($images))
                    @foreach($images as $image)
                        <div class="location-info__images--grid-item">
                            <a href="{{$image->image_url}}" data-fancybox="gallery" class="location-info__item" style="background: url('{{$image->image_url}}') no-repeat center center; background-size: cover;"></a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <a href="{{$images[0]->image_url}}" class="view-photos" data-fancybox="gallery" >View Photos</a>
</div>

<div class="property-partner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xl-9 order-2 order-md-1">
                <div class="d-none d-md-block">
                    <h2 class="dashboard__title-main">
                        {{$property->title}}
                        <span class="price">
                            ${{number_format($property->rate)}} per month
                        </span>
                    </h2> 
    
                    <div class="info-options">
                        <div class="info-options__item main">
                            <span class="info-options__item--icon">
                                <img src="{{asset('assets/img/location.svg')}}" alt="">
                            </span>
                            <!--<span class="info-options__item--value">11/117 Anzac parade, Maroubra NSW 2035</span>-->
                            @php
                            $address = get_lat_long($property->postal_code);
                            @endphp
                            <span class="info-options__item--value">{{$address['address']}}</span>
                        </div>
                        
                        <div class="info-options__item">
                            <span class="info-options__item--icon">
                                <img src="{{asset('assets/img/bed.svg')}}" alt="">
                            </span>
                            <span class="info-options__item--value">{{$property->bedrooms}}</span>
                        </div>
                        {{-- <div class="info-options__item">
                            <span class="info-options__item--icon">
                                <img src="{{asset('assets/img/options/person.svg')}}" alt="">
                            </span>
                            <span class="info-options__item--value">{{$property->persons}}</span>
                        </div> --}}
                        <div class="info-options__item">
                            <span class="info-options__item--icon">
                                <img src="{{asset('assets/img/bath.svg')}}" alt="">
                            </span>
                            <span class="info-options__item--value">{{$property->showers}}</span>
                        </div>
                        {{-- <div class="info-options__item">
                            <span class="info-options__item--icon">
                                <img src="{{asset('assets/img/options/square.svg')}}" alt="">
                            </span>
                            <span class="info-options__item--value">{{$property->area}}</span>
                        </div> --}}
                        <div class="info-options__item">
                            <span class="info-options__item--value">Type: {{$property->type->type}}</span>
                        </div>
                        <div class="info-options__item">
                            <span class="info-options__item--value">Area: {{$property->location->location}}</span>
                        </div>
                    </div>
                </div>

                <h3 class="dashboard__title">
                    <span class="title">About</span>
                </h3>

                <div class="truncated-property-about">{!! $property->description !!}</div>

                <a href="#" class="read-more">Read more</a>

                <h3 class="dashboard__title">
                    <span class="title">More Properties in {{$property->location->location}}</span>
                    <a href="{{route('properties.list',['location_seo_name'=> $property->location->seo_name])}}" class="link">View All <span class="d-none d-md-inline">Properties in {{$property->location->location}}</span></a>
                </h3>

                <div class="properties mb-5">
                    @if(!empty($properties))
                        @include('properties_block')
                    @endif
                </div>

                <h3 class="dashboard__title">
                    <span class="title">Similar Properties in Singapore</span>
                    <a href="{{route('properties.list',['location_seo_name'=> $property->location->seo_name])}}" class="link">View All</a>
                </h3>
                <div class="properties">
                    @if(!empty($properties))
                        @include('properties_block', ['properties' => $similar_properties])
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-xl-3 order-1 order-md-2 scroll-container scroll-bottom">
                <div class="scroll-block">
                    <div class="d-md-none">
                        <h2 class="dashboard__title-main">
                            {{$property->title}}
                            <span class="price">
                                ${{number_format($property->rate)}} per month
                            </span>
                        </h2> 
        
                        <div class="info-options">
                            <div class="info-options__item main">
                                <span class="info-options__item--icon">
                                    <img src="{{asset('assets/img/location.svg')}}" alt="">
                                </span>
                                <span class="info-options__item--value">11/117 Anzac parade, Maroubra NSW 2035</span>
                            </div>
                            
                            <div class="info-options__item">
                                <span class="info-options__item--icon">
                                    <img src="{{asset('assets/img/bed.svg')}}" alt="">
                                </span>
                                <span class="info-options__item--value">{{$property->bedrooms}}</span>
                            </div>
                            {{-- <div class="info-options__item">
                                <span class="info-options__item--icon">
                                    <img src="{{asset('assets/img/options/person.svg')}}" alt="">
                                </span>
                                <span class="info-options__item--value">{{$property->persons}}</span>
                            </div> --}}
                            <div class="info-options__item">
                                <span class="info-options__item--icon">
                                    <img src="{{asset('assets/img/bath.svg')}}" alt="">
                                </span>
                                <span class="info-options__item--value">{{$property->showers}}</span>
                            </div>
                            {{-- <div class="info-options__item">
                                <span class="info-options__item--icon">
                                    <img src="{{asset('assets/img/options/square.svg')}}" alt="">
                                </span>
                                <span class="info-options__item--value">{{$property->area}}</span>
                            </div> --}}
                            <div class="info-options__item">
                                <span class="info-options__item--value">Type: Rental</span>
                            </div>
                            <div class="info-options__item">
                                <span class="info-options__item--value">Area: {{$property->location->location}}</span>
                            </div>
                        </div>
                    </div>
                    {{-- map --}}
                    <div class="map-sidebar">
                        <!--The div element for the map -->
                        <div id="map"></div>
                        <script>
               
                            // Initialize and add the map
                            function initMap() {
                                // The location of Uluru
                                var lat = 1.290270;
                                var lng = 103.851959;
                                var uluru = {lat: lat, lng: lng};
                                // The map, centered at Uluru
                                var map = new google.maps.Map(
                                    document.getElementById('map'), {
                                        zoom: 14, 
                                        center: uluru,
                                        disableDefaultUI: true,
                                    });
                                // The marker, positioned at Uluru
                                var marker = new google.maps.Marker({position: uluru, map: map});
                            }
                        </script>
                        <!--Load the API from the specified URL
                        * The async attribute allows the browser to render the page while the API loads
                        * The key parameter will contain your own API key (which is not needed for this tutorial)
                        * The callback parameter executes the initMap() function
                        -->
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV7sTGhOtqXVGY6NhdiIwcXhNUcJmSnOk&callback=initMap"></script>
                    </div>
                    {{-- map end --}}
                    <a href="{{ route('property.book', [$property->id]) }}" class="btn">Book now</a>
    
                    <a href="#" class="btn add-favourite-property" data-id="<?= $property->id ?>">
                        <i class="@if(isset($faves) && in_array($property->id, $faves)) fas @else far @endif fa-heart"></i>
                        <span> @if(isset($faves) && in_array($property->id, $faves)) Remove from favourites @else Add as favourite @endif</span>
                    </a>
    
                    <div class="dashboard__block">
                        <span class="dashboard__block--label">Share with others</span>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
            </div>
        </div>



    {{-- <div class="container">
        <div class="row align-items-xl-center">
            <div class="col-lg-7">
                {{-- gallery --}}
                {{-- @php
                $images = $property->images->all();
                @endphp
                <div class="slider-for">
                    @if(!empty($images))
                        @foreach($images as $image)
                            <a href="{{$image->image_url ?? ''}}" data-fancybox="gallery" >
                                <img src="{{$image->image_url ?? ''}}" alt="">
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="slider-nav">
                    @if(!empty($images))
                        @foreach($images as $image)
                            <div class="item">
                                <img src="{{$image->image_url ?? ''}}" alt="">
                            </div>
                        @endforeach
                    @endif
                </div> 
            </div>
            <div class="col-lg-5">
                <h2>{{$property->title}}</h2>
    
                <span class="price">
                    ${{number_format($property->rate)}}
                    <span class="period">/month</span>
                </span>
    
                {{$property->description}}
    
                <div class="info-options">
                    <div class="info-options__item">
                        <span class="info-options__item--icon">
                            @php
                            $loc_images = $property->location->images->all();
                            $main_loc_image = array_shift($loc_images);
                            @endphp
                            <img src="{{$main_loc_image->image_url ?? ''}}" alt="">
                        </span>
                        <span class="info-options__item--value">{{$property->location->location}}</span>
                    </div>
                    <div class="info-options__item">
                        <span class="info-options__item--icon">
                            <img src="{{asset('assets/img/options/bed.svg')}}" alt="">
                        </span>
                        <span class="info-options__item--value">{{$property->bedrooms}}</span>
                    </div>
                    <div class="info-options__item">
                        <span class="info-options__item--icon">
                            <img src="{{asset('assets/img/options/person.svg')}}" alt="">
                        </span>
                        <span class="info-options__item--value">{{$property->persons}}</span>
                    </div>
                    <div class="info-options__item">
                        <span class="info-options__item--icon">
                            <img src="{{asset('assets/img/options/bath.svg')}}" alt="">
                        </span>
                        <span class="info-options__item--value">{{$property->showers}}</span>
                    </div>
                    <div class="info-options__item">
                        <span class="info-options__item--icon">
                            <img src="{{asset('assets/img/options/square.svg')}}" alt="">
                        </span>
                        <span class="info-options__item--value">{{$property->area}}</span>
                    </div>
                </div>
    
                <a href="{{ route('property.book', [$property->id]) }}" class="btn">Book now</a>
            </div>
        </div>
    </div> --}}
</div>

{{-- <div class="property-similar">
    <div class="container">
        <h2>Similar Property</h2>
        <div class="dashboard__content--areas">
            @if(!empty($properties))
                @foreach($properties as $property)
                    @php
                    $loc_images = $property->images->all();
                    $main_loc_image = array_shift($loc_images);
                    @endphp
                    <div>
                        <a href="{{route('property', $property->id)}}" class="search-block__item" style="background: url('{{$main_loc_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                            <span>{{$property->title}}</span>
                            <div class="search-block__item--hover">
                                <div class="top">
                                    <span class="like @if(in_array($property->id, $faves)) active @endif" data-id="{{$property->id}}" data-properties="true">
                                        <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                        <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                    </span>
                                    <span onclick="document.location.href='{{url('location-inner')}}'">{{$property->title}}</span>
                                    <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                                </div>

                                {{-- <table class="content">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span>💰</span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>⌛️</span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>🛩</span> 
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>👨‍👩‍👧‍👧</span> 
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div> --}}

@endsection