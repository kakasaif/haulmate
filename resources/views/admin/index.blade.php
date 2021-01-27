@extends('admin.layouts.master')

@section('title','Dashboard')

@php
$role = Auth::user()->role;
@endphp

@section('content')
<section class="dashboard">

    @if (in_array($role, ['Super', 'Admin']))
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="filter">
            <form id="filterForm" method="POST" action="{{url('portal/ajax/dashboard/filter')}}">
                @csrf
                <div class="form-inline">
                    <div class="form-group">
                        <label for="dateFrom" class="sr-only">Date from</label>
                        <input type="text" class="form-control" id="dateFrom" name="start_date" placeholder="Date from">
                    </div>
                    <div class="form-group mx-sm-3">
                        <label for="dateTo" class="sr-only">Date to</label>
                        <input type="text" class="form-control" id="dateTo" name="end_date" placeholder="Date to">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="sr-only">Or choose here:</label>
                        <select name="date_range" id="dateRange" class="form-control customSelect">
                            <option value="this_year" selected="">This Year</option>
                            <option value="last_year">Last Year</option>
                            <option value="this_month">Current Month</option>
                            <option value="last_month">Last Month</option>
                            <option value="this_week">This Week</option>
                            <option value="last_week">Last Week</option>
                            <option value="last_3_days">Last 3 Days</option>
                            <option value="today">Today</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                    <button id="filterButton" type="submit" class="btn btn-primary mx-sm-3">Filter</button>
                </div>
            </form>
        </div>

        <h2>Number of New Sign-ups</h2>
        <div class="block mb-5">
            <div class="row">
                <div class="col-12">
                    <canvas id="graphSignup" width="600" height="200"></canvas>
                </div>
            </div>
        </div>

        <h2>Most Popular Locations</h2>
        <div class="block mb-5">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <canvas id="topLocations" width="600" height="350">></canvas>
                </div>
                <div class="col-md-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Location Name</th>
                                <th scope="col">Search Result Count</th>
                                <th scope="col">Number of Clicks</th>
                                <th scope="col">Number of Fav</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$location->location}}</td>
                                <td>{{$location->impression}}</td>
                                <td>{{$location->views}}</td>
                                <td>{{$location->user_fave_count}}</td>
                            </tr>        
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <a href="{{ route('admin.chart', ['type' => 'locations']) }}" class="btn btn-primary mx-sm-3">View All</a>
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if (in_array($role, ['Super', 'Admin', 'Partner', 'Both']))
        <h2>Most Popular Partners</h2>
        <div class="block mb-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <canvas id="topPartners" width="600" height="350"></canvas>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Partner Name</th>
                                <th scope="col">Number of Clicks</th>
                                <th scope="col">Number of Leads</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$partner->title}}</td>
                                <td>{{$partner->views}}</td>
                                <td>{{$partner->leads_count}}</td>
                            </tr>        
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <a href="{{ route('admin.chart', ['type' => 'partners']) }}" class="btn btn-primary mx-sm-3">View All</a>
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if (in_array($role, ['Super', 'Admin', 'Housing', 'Both']))
        <h2>Most Popular Housing</h2>
        <div class="block mb-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <canvas id="topHousing" width="600" height="350"></canvas>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Housing Name</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($housing as $housing_row)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$housing_row->title}}</td>
                                <td>{{$housing_row->rate}}</td>
                                <td>{{$housing_row->location->location}}</td>
                            </tr>        
                            @endforeach
                            <tr>
                                <td colspan="5">
                                    <a href="{{ route('admin.chart', ['type' => 'housing']) }}" class="btn btn-primary mx-sm-3">View All</a>
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if (in_array($role, ['Super', 'Admin']))
        <h2>
            Moving From
        </h2>
        <div class="block mb-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div id="mapid"></div>
                </div>
                <div class="col-md-6">
                    <form id="movingToFilterForm" method="POST" action="{{url('portal/ajax/dashboard/moving_to_filter')}}" data-limit="5">
                        @csrf
                        <select name="moving_filter" class="form-control mb-3" id="movingToFilter">
                            @foreach ($moving_to_countries as $country)
                                <option value="{{$country->id}}" {{$country->country == "Singapore" ? 'selected' : ''}}>{{$country->country}}</option>
                            @endforeach
                        </select>
                    </form>
                    <table class="table table-bordered" id="movingTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Country Name</th>
                                <th scope="col">Moving From</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$country->country}}</td>
                                <td>{{$country->moving_from_count}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <a href="{{ route('admin.chart', ['type' => 'movings']) }}" class="btn btn-primary mx-sm-3">View All</a>
                                </td>
                            </tr>  
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <h2>
            Preferences
        </h2>
        <div class="block mb-5">
            <div class="row">
                <div class="col-md-6">
                    <canvas id="preferences" width="600" height="250"></canvas>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Preference Name</th>
                                <th scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preferences->take(5) as $preference)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$preference->preference}}</td>
                                <td>{{$preference->location_pref_count}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <a href="{{ route('admin.chart', ['type' => 'preferences']) }}" class="btn btn-primary mx-sm-3">View All</a>
                                </td>
                            </tr>        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endif

</section>
{{-- <div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>

        <p class="card-text">
          Some quick example text to build on the card title and make up the bulk of the card's
          content.
        </p>

        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>

    <div class="card card-primary card-outline">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>

        <p class="card-text">
          Some quick example text to build on the card title and make up the bulk of the card's
          content.
        </p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-6 -->
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <h5 class="m-0">Featured</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Special title treatment</h6>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Featured</h5>
      </div>
      <div class="card-body">
        <h6 class="card-title">Special title treatment</h6>

        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <!-- /.col-md-6 -->
</div> --}}
@endsection

@section('script')
    @parent

    @if (in_array($role, ['Super', 'Admin']))
        <script>
            var topLocationsData = {!!json_encode($locations_datasets)!!};
            var topPreferencesData = {!!json_encode($preferences_datasets)!!};
            var plots = {!!json_encode($plots_reports)!!};
        </script>
        <script src="{{asset('assets/admin/js/pages/dashboard.js')}}"></script>
        <script src="{{asset('assets/admin/js/pages/map.js')}}"></script>
        <script src="{{asset('assets/admin/js/pages/moving_filter.js')}}"></script>
    @endif

    @if (in_array($role, ['Super', 'Admin', 'Partner', 'Both']))
        <script>
            var topPartnersData = {!!json_encode($partners_datasets)!!};
        </script>
        <script src="{{asset('assets/admin/js/pages/partner.js')}}"></script>
    @endif
    @if (in_array($role, ['Super', 'Admin', 'Housing', 'Both']))
        <script>
            var topHousingData = {!!json_encode($housing_datasets)!!};
        </script>
        <script src="{{asset('assets/admin/js/pages/housing.js')}}"></script>
    @endif
@endsection
