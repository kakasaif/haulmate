@extends('layout.app')
@section('content')

<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="dashboard__sidebar">
                    @if (!Auth::user())
                    <div class="dashboard__sidebar--hello">
                            <span class="mb-2 pl-0" style="font-size:16px;">Save your progress, create your account</span>
                            <a href="{{url('/register?ref=' . Request::url())}}" class="btn">Save search</a>
                        </div>
                    @endif
                    <a href="#" class="show-filter d-md-none">Show filter</a>
                    <div class="block filterModal">
                        <span class="dashboard__sidebar--title">Filter Criteria
                            <a href="#" class="close"><img src="{{asset('assets/img/close_b.svg')}}" alt=""></a>
                        </span>

                        <div class="filter-block show">
                            <span class="filter-block__title">Travel Time</span>

                            <div class="filter-block__content">
                                <div class="main-filter">
                                    <div class="main-filter__item">
                                        <span>I would like to live</span>
                                    </div>
                                    <div class="main-filter__item">
                                        <div class="row no-gutters">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <select id="remoteness">
                                                        <option value="5" {{empty($user->remoteness) || $user->remoteness == 5 ? 'selected' : ''}}>5 min</option>
                                                        <option value="10" {{!empty($user->remoteness) && $user->remoteness == 10 ? 'selected' : ''}}>10 min</option>
                                                        <option value="20" {{!empty($user->remoteness) && $user->remoteness == 20 ? 'selected' : ''}}>20 min</option>
                                                        <option value="30" {{!empty($user->remoteness) && $user->remoteness == 30 ? 'selected' : ''}}>30 min</option>
                                                        <option value="40" {{!empty($user->remoteness) && $user->remoteness == 40 ? 'selected' : ''}}>40 min</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span>from</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-filter__item">
                                        <div class="input-group">
                                            <input type="text" id="live_close" class="autoComplete" value="{{$user->live_close ?? 'City Hall'}}" placeholder="City Hall">
                                        </div>
                                    </div>
                                    <div class="main-filter__item">
                                        <span>travelling by</span>
                                        <div class="input-group">
                                            <select id="transport">
                                                <option value="walking" {{empty($user->transport) || $user->transport == 'walking' ? 'selected' : ''}}>Walk</option>
                                                <option value="public" {{!empty($user->transport) && $user->transport == 'public' ? 'selected' : ''}}>Public Transport</option>
                                                <option value="taxi" {{!empty($user->transport) && $user->transport == 'taxi' ? 'selected' : ''}}>Drive</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="filter-block show">
                            {{-- <span class="filter-block__title">Affordability <span>(Rent per Month)</span></span> --}}

                            <div class="filter-block__content">
                                {{-- <div class="row no-gutters">
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control min-input" placeholder="Min">
                                        </div>
                                    </div>
                                    <div class="col col-m-auto text-center span-block">
                                        <span>-</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control max-input" placeholder="Max">
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="affordability10_100">
                                <label class="custom-control-label" for="affordability10_100">${{number_format(10,2, '.', ' ')}} - ${{number_format(100,2, '.', ' ')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="affordability100_1000">
                                    <label class="custom-control-label" for="affordability100_1000">${{number_format(100,2, '.', ' ')}} - ${{number_format(1000,2, '.', ' ')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="affordability1000_5000">
                                    <label class="custom-control-label" for="affordability1000_5000">${{number_format(1000,2, '.', ' ')}} - ${{number_format(5000,2, '.', ' ')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="affordability5000_10000">
                                    <label class="custom-control-label" for="affordability5000_10000">${{number_format(5000,2, '.', ' ')}} - ${{number_format(10000,2, '.', ' ')}}</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="affordability10000">
                                    <label class="custom-control-label" for="affordability10000">${{number_format(10000,2, '.', '')}}+</label>
                                </div> --}}
                            </div>
                        </div>

                        <!-- <div class="filter-block">
                            <span class="filter-block__title">Landmark</span>

                            <div class="filter-block__content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="landmark1">
                                    <label class="custom-control-label" for="landmark1">Option 1</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="landmark2">
                                    <label class="custom-control-label" for="landmark2">Option 2</label>
                                </div>
                            </div>
                        </div> -->

                        {{-- <div class="filter-block">
                            <span class="filter-block__title">Area</span>

                            <div class="filter-block__content">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="area1">
                                    <label class="custom-control-label" for="area1">Option 1</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="area2">
                                    <label class="custom-control-label" for="area2">Option 2</label>
                                </div>
                            </div>
                        </div> --}}

                        @if(!empty($all_preferences))
                        <form method="post" id="filterPrefForm">
                            <div class="filter-block show">
                                <span class="filter-block__title">Preferences</span>
                                <div class="filter-block__content">
                                    @foreach($all_preferences as $preference)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="pref-{{$preference->id}}" class="custom-control-input prefs" data-name="{{$preference->preference}}" value="{{$preference->id}}" @if(in_array($preference->id, $user_pref_ids)) checked="" @endif>
                                        <label class="custom-control-label" for="pref-{{$preference->id}}">{{$preference->preference}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                        @endif

                        <a id="updateBtn" href="#" class="btn update mt-3">Update search</a>
                    </div>

                    
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="dashboard__content">
                    <!-- search filter -->
                    <div class="search-block__filter">
                        <div class="search-block__filter--left">
                            <h2>Search Results</h2>
                        </div>
        
                        <div class="search-block__filter--right">
                            {{-- <a href="#" class="btn filter money" style="display:none">$<span style="margin-left:0px" class="min">0</span>-$<span style="margin-left:0px" class="max">0</span> <span><img class="close-button" src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                            @foreach($all_preferences as $preference)
                            @if(in_array($preference->id, $user_pref_ids)) 
                                <a href="#" class="btn id-{{$preference->id}} filter">{{$preference->preference}} <span><img class="close-pref" data-id="{{$preference->id}}" src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                             @endif
                            @endforeach --}}
                        </div>
                    </div>
                    <!-- results -->
                    <div class="search-block__result">
                        <div id="locations_result" class="row">
                            @include('locations_list', ['locations' => $locations, 'faves' => $faves])
                        </div>

                        <div class="row">
                            <div class="col-12 d-md-none">
                                <a href="#" class="btn btn-more">Load More</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
    });
</script>

@endsection