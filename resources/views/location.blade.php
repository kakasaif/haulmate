@extends('layout.app')
@section('content')

<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$location->location}}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="dashboard">
    
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
            <a href="{{$images[0]->image_url ?? '#'}}" class="view-photos" data-fancybox="gallery" >View Photos</a>
        </div>

        <div class="location-info d-none d-md-flex">
            <div class="location-slider">
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
                <a href="{{$images[0]->image_url ?? '#'}}" class="view-photos" data-fancybox="gallery" >View Photos</a>
            </div>
        </div>

        
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xl-9 order-2 order-md-1 scroll-container">
                <nav class="navigation">
                    <a href="#about" class="anchor active">About</a>
                    <a href="#relocation" class="anchor">Lifestyle</a>
                    <a href="#properties" class="anchor">Properties</a>
                    <a href="#mapBlock" class="anchor">Map</a>
                    <a href="#recommended" class="anchor">Similar Areas</a>
                </nav>
                <div class="block location-content">
                    <div class="d-none d-md-block" id="about">
                        @include('location_item')
                    </div>

                    <h3 class="dashboard__title" id="relocation">
                        <span class="title">Lifestyle in {{$location->title}}</span>
                    </h3>

                    <div class="short">{!! $location->short_description !!}</div>

                    <div class="long" style="display: none;">{!! $location->description !!}</div>

                    <a href="#" class="read-more">Read more</a>
                </div>

                <h3 class="dashboard__title" id="properties">
                    <span class="title">Properties in {{$location->location}}</span>
                    @if (Auth::user())
                    <a href="{{route('properties.list', $location->seo_name)}}" class="link">View all <span class="d-none d-md-inline">properties in {{$location->location}}</span></a>
                    @else
                    <a class="register_link link" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(route('properties.list', $location->seo_name))}}">View All <span class="d-none d-md-inline">Properties in {{$location->title}}</span></a>
                    @endif
                </h3>
                <div class="properties">
                    @if(!empty($properties))
                        @include('properties_block', ['properties' => $properties->slice(0, 4)])
                    @endif
                </div>

                <div class="map" id="mapBlock">
                    <h3 class="dashboard__title">
                        <span class="title">Map</span>
                        <!-- <span class="location"><img src="{{asset('assets/img/location.svg')}}" alt=""> 11/117 Anzac parade, Maroubra NSW 2035</span> -->
                    </h3>
                    <!--The div element for the map -->
                    <div id="map"></div>
                    <script>
           
                        // Initialize and add the map
                        function initMap() {
                            // The location of Uluru
                            var lat = <?= $location->latitude ?>;
                            var lng = <?= $location->longitude ?>;
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

                <h3 class="dashboard__title" id="recommended">
                    <span class="title">More Similar Areas</span>
                    @if (Auth::user())
                    <a href="{{route('location.list')}}" class="link">View All Areas</a>
                    @else
                    <a class="register_link link" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(route('location.list'))}}">View All Areas</a>
                    @endif
                </h3>
                <div class="properties">

                    @include('locations_block', ['locations' => $top_matched_locations, 'show_properties' => false])

                </div>
            </div>
            
            <div class="col-md-4 col-xl-3 order-1 order-md-2 scroll-container scroll-bottom">
                <div class="scroll-block">
                    <nav class="navigation d-md-none">
                        <a href="#about" class="anchor active">About</a>
                        <a href="#relocation" class="anchor">Lifestyle</a>
                        <a href="#properties" class="anchor">Properties</a>
                        <a href="#mapBlock" class="anchor">Map</a>
                        <a href="#recommended" class="anchor">Similar Areas</a>
                    </nav>
                    <div class="d-md-none location-content">
                        @include('location_item')
                    </div>
                    <a href="#" class="btn add-favourite-location" data-id="<?= $location->id ?>">
                        <i class="@if(isset($faves) && in_array($location->id, $faves)) fas @else far @endif fa-heart"></i>
                        <span> @if(isset($faves) && in_array($location->id, $faves)) Remove from favourites @else Add as favourite @endif</span>
                    </a>

                    <div class="dashboard__block">
                        <span class="dashboard__block--label">Share with others</span>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>

                    <div class="dashboard__block">
                        <span class="dashboard__block--label">Most known for:</span>
                        @if (count($user_pref_ids) > 0) 
                        <span class="dashboard__block--text">Matches <span id="matches_count">0</span> out of {{count($user_pref_ids)}} of your preferences.</span>
                        @endif
                        
                        <div class="areas">
                            @php
                                $matches = 0;
                            @endphp
                            @if (isset($location->prefs))
                            @foreach ($location->prefs as $item)
                                    @php
                                        if (in_array($item->id, $user_pref_ids)) {
                                            $matches++;
                                            $pref_style = 'active';
                                        } else {
                                            $pref_style = '';
                                        }
                                    @endphp
                                    <!-- remove active in class to make gray -->
                                    <div class="areas__item {{$pref_style}}">
                                        <div class="areas__item--icon">
                                            <img src="{{$item->icon_url ?? ''}}"/>
                                        </div>
                                        <div class="areas__item--text">{{$item->preference ?? ''}}</div>
                                    </div>
                            @endforeach
                            @endif
                        </div>

                        <div class="dashboard__block--info">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="value pop-tooltip" data-toggle="popover" data-content="Data as from <a href='https://www.onemap.sg/main/v2/essentialamenities'>OneMap</a> and based on a radius of 1km from the location">{{$location->supermarkets ?? ''}}</span>
                                            <span class="title">Supermarkets</span>
                                        </td>
                                        <td>
                                            <span class="value pop-tooltip" data-toggle="popover" data-content="Data as from <a href='https://www.onemap.sg/main/v2/essentialamenities'>OneMap</a> and based on a radius of 1km from the location">{{$location->restaurants ?? ''}}</span>
                                            <span class="title">Popular Hawkers</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="value pop-tooltip" data-toggle="popover" data-content="Data as from <a href='https://www.onemap.sg/main/v2/essentialamenities'>OneMap</a> and based on a radius of 1km from the location">{{$location->parks ?? ''}}</span>
                                            <span class="title">Parks</span>
                                        </td>
                                        <td>
                                            <span class="value">{{$location->properties_count ?? ''}}</span>
                                            <span class="title">Flats for rent</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function () {
    $('#matches_count').html('{{$matches}}');
});
</script>

@endsection

