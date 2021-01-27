@extends('layout.app')
@section('content')

<div class="dashboard">
    <div class="container">
        <h1>
            Favorites
        </h1>

        <div class="row">
            <div class="col-12">
                <h3 class="dashboard__title">
                    <span class="title">Areas</span>
                </h3>
              
                <div class="properties mb-5">
                    @include('locations_block', ['locations' => $faves_location, 'show_properties' => false])
                </div>

                <h3 class="dashboard__title">
                    <span class="title">Properties</span>
                </h3>

                <div class="properties mb-5">
                    @include('properties_block', ['properties' => $faves_properties, 'faves' => $housing_faves_ids])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection