@extends('layout.app')
@section('content')

<section class="filter">
    <div class="container">
        {{-- <a href="#" class="close">Close <img src="{{asset('assets/img/close.svg')}}" alt="Close"></a> --}}
        <div class="row no-gutters">
            <div class="col-12">
                
                <div class="form-block no-bg">
                    <form id="regStepsForm" method="POST" action="{{route('save_steps')}}">
                        @csrf
                        <input type="hidden" id="page_from" name="page_from" value="{{ $page_from }}" />
                        <input type="hidden" id="services" name="services" value="" />
                        <input type="hidden" id="preferences" name="preferences" value="" />
                        <input type="hidden" id="remoteness" name="remoteness" value="" />
                        <input type="hidden" id="transport" name="transport" value="">
                        <input type="hidden" id="property_type" name="property_type" value="" />
                        <input type="hidden" id="moving_from" name="moving_from" value="{{empty($moving_from->code) ? '' : $moving_from->code}}" />
                        <input type="hidden" id="moving_to" name="moving_to" value="{{empty($moving_to->code) ? '' : $moving_to->code}}" />
                        <input type="hidden" id="moving_with" name="moving_with" value="" />
                        <input type="hidden" id="moving_on" name="moving_on" value="" />
                        <input type="hidden" id="live_close" name="live_close" value="" />
                        <div class="row align-items-center no-gutters">
                            <div class="col-lg-6">
                                <div class="dropdowns">
                                    <div>
                                        <select name="moving_from" id="movingFrom" class="select2-flags">
                                            <option value="" disabled selected>Moving from</option>
                                        </select>
                                    </div>
                                    <div>
                                        <select name="moving_to" id="movingTo" class="select2-flagss">
                                            <option value="" disabled selected>Moving To</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="buttons">
                                    <a href="#" class="btn start_btn submitter" data-type="start">GO <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="filter__content">
    <div class="container">
        <div class="filter__content--block">
            <div class="filter__content--title">
                <span class="icon">
                    <img src="{{asset('assets/img/options.svg')}}" alt="Options">
                </span>
                <span class="title">Get organised for your move</span>

                <span class="info"><span id="filters_info">0</span> Filters selected <a href="#" class="clearAll" style="display:none">Clear All</a></span>
            </div>

<!--            <div class="filter__content--buttons multiple_choice">
                <label for="">Choose Service(s)</label>
                <a href="#" class="btn">Movers</a>
                <a href="#" class="btn">Property</a>
                <a href="#" class="btn">Insurance</a>
                <a href="#" class="btn">Mobile Plans</a>
                <a href="#" class="btn">Bank Account</a>
                <a href="#" class="btn">Utlities <img src="{{asset('assets/img/info.svg')}}" alt=""></a>
            </div>-->
            @if(!empty($services))
            <div class="filter__content--buttons multiple_choice services_block">
                <label for="">Services required</label>
                @php
                    $selected = "";
                    if (isset($user_detail) && isset($user_detail->services)) {
                        $user_services = $user_detail->services->pluck('service.name')->toArray();
                    }
                @endphp
                @foreach($services as $service)
                    @php
                        if (isset($user_services)) {
                            $selected = in_array($service->name, $user_services) ? 'active' : '';
                        }
                    @endphp
                    <a href="#" class="btn service_item {{$selected}}" data-id="{{$service->id}}">
                        {{$service->name}}
<!--                        <img src="{{asset('assets/img/info.svg')}}" alt="">
                        <img class="default" src="{{$service->default_icon_url}}" alt="">
                        <img class="active" src="{{$service->active_icon_url}}" alt="" style="display: none;">-->
                    </a>
                @endforeach
            </div>
            @endif

            <div class="filter__content--buttons multiple_choice">
                <label for="">Property type</label>
                @foreach ($property_types as $property_type)
                <a href="#" class="btn property_type {{!empty($selected_property_types) && in_array($property_type->id, $selected_property_types) ? 'active' : ''}}" data-id="{{$property_type->id}}">{{$property_type->type}}</a>
                @endforeach
            </div>
        </div>

        <div class="filter__content--block">
            <div class="filter__content--title">
                <span class="icon">
                    <img src="{{asset('assets/img/recommend.svg')}}" alt="Options">
                </span>
                <span class="title">Receive recommendations on areas to live</span>
            </div>
            @if(!empty($preferences))
            <div class="filter__content--buttons options multiple_choice">
                <label for="">Choose Lifestyle options</label>
                <div class="row">
                    @php
                        $selected = "";
                        if (isset($user_detail) && isset($user_detail->preferences)) {
                            $user_preferences = $user_detail->preferences;
                            $user_preferences_arr = array();
                            foreach ($user_preferences as $preference) {
                                $user_preferences_arr[] = $preference->preference;
                            }
                        }
                        $counter = 0;
                    @endphp
                    @foreach($preferences as $preference)
                    @if ($counter++ === 12)
                    </div>
                    <a href="#" class="btn--more">More</a>
                    <div class="filter__content--buttons-hidden multiple_choice">
                        <div class="row">
                        @php
                        $end = true;
                        @endphp
                    @endif
                    @php
                        if (isset($user_preferences_arr)) {
                            $selected = in_array($preference->preference, $user_preferences_arr) ? 'active' : '';
                        }
                    @endphp
                    <div class="col-6 col-md-3">
                        <a href="#" class="btn areas__item {{$selected}}" data-id="{{$preference->id}}">
                            <span class="btn--icon">
                                <img src="{{$preference->icon_url ?? ''}}" alt="">
                            </span>
                            <span class="btn--text">{{$preference->preference}}</span>
                        </a>
                    </div>
                    @endforeach
                    @if (!empty($end))
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <div id="landmark-block" class="filter__content--buttons">
                <label for="">Landmarks to live by</label>

                <div class="landmark">
                    <div class="landmark__input address">
                        <input id="live_close_input" type="text" placeholder="Enter friends, office or landmark" class="autoComplete" autocomplete="off" value="{{$user_detail->live_close ?? ''}}">
                    </div>
                    <div class="landmark__filters">
                        <div class="landmark__filters--block single_choice">
                            <label for="">Within:</label>
                            <a href="#" class="btn remoteness {{!empty($user_detail->remoteness) && $user_detail->remoteness == 5 ? 'active' : ''}}" data-value="5">5 mins</a>
                            <a href="#" class="btn remoteness {{!empty($user_detail->remoteness) && $user_detail->remoteness == 10 ? 'active' : ''}}" data-value="10">10 mins</a>
                            <a href="#" class="btn remoteness {{!empty($user_detail->remoteness) && $user_detail->remoteness == 20 ? 'active' : ''}}" data-value="20">20 mins</a>
                            <a href="#" class="btn remoteness {{!empty($user_detail->remoteness) && $user_detail->remoteness == 30 ? 'active' : ''}}" data-value="30">30 mins</a>
                            <a href="#" class="btn remoteness {{!empty($user_detail->remoteness) && $user_detail->remoteness == 40 ? 'active' : ''}}" data-value="40">40 mins</a>
                        </div>

                        <div class="landmark__filters--block single_choice">
                            <label for="">By:</label>
                            <a href="#" class="btn transport {{!empty($user_detail->transport) && $user_detail->transport === 'walking' ? 'active' : ''}}" data-value="walking">Walking</a>
                            <a href="#" class="btn transport {{!empty($user_detail->transport) && $user_detail->transport === 'drive' ? 'active' : ''}}" data-value="drive">Drive</a>
                            <a href="#" class="btn transport {{!empty($user_detail->transport) && $user_detail->transport === 'public' ? 'active' : ''}}" data-value="public">Public Transport</a>
                        </div>
                    </div>
                </div>
                <span id="landmark-error" class="alert alert-danger" style="display:none">Please select both 'Within' and 'By' fields</span>
            </div>


        </div>
        <div class="filter__content--block">
            <div class="filter__content--title">
                <span class="icon">
                    <img src="{{asset('assets/img/meet.svg')}}" alt="Meet">
                </span>
                <span class="title">Meet others like you</span>
            </div>

            <div class="filter__content--buttons no-margin">
                <label for="">Moving With</label>
                <div class="btn-scroll single_choice">
                    <a href="#" class="btn moving_with {{!empty($user_detail->moving_with) && $user_detail->moving_with === 'Myself' ? 'active' : ''}}" data-value="Myself">Myself</a>
                    <a href="#" class="btn moving_with {{!empty($user_detail->moving_with) && $user_detail->moving_with === 'My partner' ? 'active' : ''}}" data-value="My partner">My partner</a>
                    <a href="#" class="btn moving_with {{!empty($user_detail->moving_with) && $user_detail->moving_with === 'My family' ? 'active' : ''}}" data-value="My family">My family</a>
                </div>
            </div>

            <div class="filter__content--buttons no-margin">
                <label for="">When are you moving?</label>
                <div class="btn-scroll single_choice">
                    <a href="#" class="btn moving_on {{!empty($user_detail->moving_on) && $user_detail->moving_on === 'This month' ? 'active' : ''}}" data-value="This month">This month</a>
                    <a href="#" class="btn moving_on {{!empty($user_detail->moving_on) && $user_detail->moving_on === 'Next month' ? 'active' : ''}}" data-value="Next month">Next month</a>
                    <a href="#" class="btn moving_on {{!empty($user_detail->moving_on) && $user_detail->moving_on === 'In 6 months' ? 'active' : ''}}" data-value="In 6 months">In 6 months</a>
                    <a href="#" class="btn moving_on {{!empty($user_detail->moving_on) && $user_detail->moving_on === 'After 6 months' ? 'active' : ''}}" data-value="After 6 months">After 6 months</a>
                    <a href="#" class="btn moving_on {{!empty($user_detail->moving_on) && $user_detail->moving_on === 'Not sure yet' ? 'active' : ''}}" data-value="Not sure yet">Not sure yet</a>
                </div>
            </div>
        </div>

        
    </div>
    <div class="buttons">
        <a href="#" class=" start_btn submitter" data-type="bottom">GO <i class="fas fa-arrow-right"></i></a>
    </div>
</div>


@if (isset($render))
    @section('css')
        <style>
            header, .copyright{
                display: none;
            }
        </style>
    @endsection
@endif

@endsection

@section('scripts')
<script src="{{asset('assets/js/pages/register-step.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
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

        var country_from = [
            <?php
            if(!empty($countries_from)) {
                foreach($countries_from as $country) {
                    echo json_encode($country) . ',';
                }
             }
            ?>
        ];
        
        country = country.map(function (obj, label) {
            return { id: obj.id, text: obj.country, url: obj.flag_url };
        })

        country_from = country_from.map(function (obj, label) {
            return { id: obj.id, text: obj.country, url: obj.flag_url };
        })

        function formatCountry (country) {
            if (!country.id) { return country.text; }
            var $country = $(
            '<span><span class="flag-icon"><img src='+ country.url +' /></span>' +
            '<span class="flag-text">'+ country.text+"</span></span>"
            );
            return $country;
        };

        $('.select2-flags').select2({
            data: country_from,
            templateResult: formatCountry,
            templateSelection: formatCountry
        });
        $('.select2-flagss').select2({
            data: country,
            templateResult: formatCountry,
            templateSelection: formatCountry
        });
        $('.select2-flags, .select2-flagss').on('select2:open', function (e) {
            $('.select2-container').css('z-index', '3')
        });

        <?php if (!empty($country_from)) { ?>
            $('.select2-flags').val('<?=$country_from->id?>').trigger('change');
        <?php } ?>

        <?php if (!empty($country_to)) { ?>
            $('.select2-flagss').val('<?=$country_to->id?>').trigger('change');
        <?php } else { ?>
            @php
                $country = [];
                foreach ($countries as $country) {
                    if ($country->country === 'Singapore') {
                        echo "$('.select2-flagss').val('{$country->id}').trigger('change')";
                        break;
                    }
                }
            @endphp
        <?php } ?>
    });
</script>
@endsection
