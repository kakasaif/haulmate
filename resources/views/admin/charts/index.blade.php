@extends('admin.layouts.master')

@section('title','Dashboard Table View')

@section('content')
<section class="dashboard">
    @if ($filter)
    <div class="filter">
        <form id="filterForm" method="POST" action="{{url('portal/ajax/dashboard/filter_chart')}}">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}"/>
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
    @endif

    @if ($plots)
    <h2>All {{ ucfirst($type) }} Map</h2>
    <form id="movingToFilterForm" method="POST" action="{{url('portal/ajax/dashboard/moving_to_filter')}}">
        @csrf
        <select name="moving_filter" class="form-control mb-3" id="movingToFilter">
            @foreach ($moving_to_countries as $country)
                <option value="{{$country->id}}" {{$country->country == "Singapore" ? 'selected' : ''}}>{{$country->country}}</option>
            @endforeach
        </select>
     </form>
    <div class="block mb-5">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div id="mapid"></div>
            </div>
        </div>
    </div>
    @endif

    @if ($chart_datasets)
    <h2>All {{ ucfirst($type) }} Chart</h2>
    <div class="block mb-5">
        <div class="row align-items-center">
            <div class="col-md-12">
                <canvas id="chartCanvas" width="600" height="200">></canvas>
            </div>
        </div>
    </div>
    @endif

    @if ($headers && $table_values)
    <h2>All {{ ucfirst($type) }} Table</h2>
    <div class="block mb-5">
        <div class="row align-items-center">
            <div class="col-md-12">
                <table class="table table-bordered" data-type="{{$type}}">
                    <thead>
                        <tr>
                            @foreach ($headers as $header)
                            <th scope="col">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if ($type === 'locations')
                            @foreach ($table_values as $location)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$location->location}}</td>
                                <td>{{$location->impression}}</td>
                                <td>{{$location->views}}</td>
                                <td>{{$location->user_fave_count}}</td>
                            </tr>        
                            @endforeach
                        @elseif ($type === 'movings')
                            @foreach ($table_values as $country)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$country->country}}</td>
                                <td>{{$country->moving_from_count}}</td>
                            </tr>        
                            @endforeach
                        @elseif ($type === 'preferences')
                            @foreach ($table_values as $preference)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$preference->preference}}</td>
                                <td>{{$preference->location_pref_count}}</td>
                            </tr>        
                            @endforeach
                        @elseif ($type === 'partners')
                            @foreach ($table_values as $partner)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$partner->title}}</td>
                                <td>{{$partner->views}}</td>
                                <td>{{$partner->leads_count}}</td>
                            </tr>        
                            @endforeach
                        @elseif ($type === 'housing')
                            @foreach ($table_values as $housing)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$housing->title}}</td>
                                <td>{{$housing->rate}}</td>
                                <td>{{$housing->location->location}}</td>
                            </tr>        
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

</section>
@endsection

@section('script')
    @parent
    <script>
        @if($chart_datasets)
            var chartLabels = {!!json_encode($chart_datasets['labels']) !!};
            var chartDatasets = {!!json_encode($chart_datasets['datasets'])!!};
        @elseif($plots)
            var plots = {!!json_encode($plots)!!};
        @endif
    </script>
    @if($chart_type === 'stacked')
        <script src="{{asset('assets/admin/js/pages/stacked_bar_chart.js')}}"></script>
    @elseif($plots)
        <script src="{{asset('assets/admin/js/pages/map.js')}}"></script>
        <script src="{{asset('assets/admin/js/pages/moving_filter.js')}}"></script>
    @else
        <script src="{{asset('assets/admin/js/pages/charts.js')}}"></script>
    @endif
    @if($filter)
    <script>
        $(document).ready(function () {
            $('#filterForm').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    data: data,
                    method: 'POST',
                    success: function (result) {
                        chartData.labels = result.labels;
                        chartData.datasets[0].data = result.values;
                        chartData.datasets[0].backgroundColor = result.colors;
                        chart.update();
                    }
                });
            });

            $('#filterForm').submit();
        });
    </script>
    @endif
@endsection
