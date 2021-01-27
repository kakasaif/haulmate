@extends('layout.app')
@section('content')

<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('location', $location->seo_name)}}">{{$location->location}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Properties</li>
            </ol>
        </nav>
    </div>
</div>

<section class="property">
    <div class="property__switch d-md-none">
        <div class="property__switch--inner">
            <a href="#" class="mapView active">Map View</a>
            <a href="#" class="listView">List View</a>
            
        </div>

        <a href="{{route('register_steps')}}" class="property__switch--options">
            @if (count($user_pref_ids) > 0)
                <span><?php echo count($user_pref_ids); ?></span>
            @endif
        </a>
        {{-- <a href="#" class="property__switch--options"> --}}
            <!-- <span></span> -->
        {{-- </a> --}}
    </div>
    <div class="property__switch--filter d-md-none">
        <a href="#" class="type_selector active" data-type="All">All</a>
        @foreach ($types as $type)
        <a href="#" class="type_selector" data-type="{{$type['type']}}">{{$type['type']}}</a>
        @endforeach
    </div>
    <div class="property__right">

        <!-- <div class="property__right--filter">
            <span class="property__right--title">
                <span>{{$location->location}}</span>

                <a href="{{route('location', $location->seo_name)}}" class="btn">Area Details</a>
            </span>
            <div class="property__right--input">
                <input type="text" class="form-control" placeholder="Enter address">
            </div>
        </div> -->

        <div class="map">
            <div class="acf-map" data-zoom="7" id="mapSize">
                @if(!empty($location->properties))
                    @foreach($location->properties as $property)
                        @php
                        $images = $property->images->all();
                        $main_image = array_shift($images);
                        @endphp
                        <div class="marker" data-lat="{{$property->latitude ?? 1.3119708 }}" data-lng="{{$property->longitude ?? 103.8603588 }}">
                            <div class="marker__item">
                                <div class="marker__item--left">
                                    <div class="poster" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">

                                    </div>
                                </div>
                                <div class="marker__item--right">
                                    <span class="title">{{$property->title}}</span>
                                    <span class="price">${{number_format($property->rate)}}</span>

                                    <div class="bottom">
                                        <a href="{{route('property', $property->id)}}" class="btn">View Property</a>

                                        <a href="#" class="like {{in_array($property->id, $housing_faves) ? 'fill' : ''}}" data-id="{{$property->id}}" data-properties="true"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
        </div>
    </div>
    <div class="property__left">
        <!-- <div class="property__left--top">
            <span class="property__left--title">Our recommendations ({{count($location->properties->all() ?? [])}})</span>

            <a href="#" class="property__left--filter"><img src="{{asset('assets/img/filter.svg')}}" alt="">  View Filters</a>
        </div> -->

        <div class="property__left--type">
            <label for="">Property type:</label>

            <select name="" id="propertyType" multiple="multiple">
                <!--<option value="" selected="">All</option>-->
                @foreach ($types as $type)
                <option value="{{$type['id']}}">{{$type['type']}}</option>
                @endforeach
            </select>
        </div>

        <h3 class="dashboard__title">
            <span class="title">All properties in {{$location->location}}<span id="prop_count"> ({{count($location->properties->all() ?? [])}})</span></span>
        </h3>
        <div class="properties">
            @if(!empty($location->properties))
            @foreach($location->properties as $property)
                @php
                $images = $property->images->all();
                $main_image = array_shift($images);
                @endphp
                <div class="col-md-6 col-lg-4 prop-item type-{{$property->type_id}} visible">
                    <div class="properties__item">
                        <div class="properties__item--poster" style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                        </div>
                        <a href="{{route('property', $property->id)}}" class="properties__item--title">{{$property->title}}</a>
                        <span class="properties__item--price">${{number_format($property->rate)}} per month</span>

                        <div class="properties__item--bottom">
                            <span><img src="{{asset('assets/img/bed.svg')}}" alt=""> {{$property->bedrooms}}</span>
                            <span><img src="{{asset('assets/img/bath.svg')}}" alt=""> {{$property->showers}}</span>
                            <span class="type">{{$types[$property->type_id]['type'] ?? ''}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

        <!-- @if(!empty($location->properties))
            @foreach($location->properties as $property)
                @php
                $images = $property->images->all();
                $main_image = array_shift($images);
                @endphp
                <div class="property__left--item">
                    <div class="property__left--left">
                        <div class="poster"  style="background: url('{{$main_image->image_url ?? ''}}') no-repeat center center; background-size: cover;">
                            <span class="poster__price d-md-none">${{number_format($property->rate)}}</span>
                        </div>
                    </div>
                    <div class="property__left--right">
                        <span class="title">
                            <span>{{$property->title}}</span>

                            <span class="price">${{number_format($property->rate)}}</span>
                        </span>

                        <div class="info">
                            <span class="info--item">
                                {{$property->bedrooms}} rooms
                            </span>
                            <span class="info--item">
                                {{$property->persons}} beds
                            </span>
                            <span class="info--item">
                                {{$property->showers}} bathroom
                            </span>
                        </div>

                        {{$property->description}}

                        <div class="property__left--bottom">
                            <a href="{{route('property', $property->id)}}" class="btn">View Property</a>

                            <a href="#" class="like @if(in_array($property->id, $housing_faves))fill @endif" data-id="{{$property->id}}" data-properties="true"></a>

                            <span class="place"><img src="{{asset('assets/img/place.svg')}}" alt=""> {{$property->location->location}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif -->
    </div>
    
</section>


@endsection