<div class="properties--hidden active">
    <h3 class="dashboard__title">
        <span class="title">Properties in {{$location->location}}</span>
        <a href="{{route('properties.list',['location_seo_name'=>$location->seo_name])}}" class="link">View All Properties</a>
    </h3>

    <div class="properties mb-5">
        @include('properties_block', ['properties' => $location->properties->slice(0, 4), 'faves' => $housing_faves])
    </div>

</div>