@extends('layout.app')
@section('content')
<div class="pagination">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/account')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Get a relocation quote</li>
            </ol>
        </nav>
    </div>
</div>
<section class="relocation">
    <div class="container">

        <!-- <ul class="nav nav-tabs" id="steps" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Step 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Step 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="step3-tab" data-toggle="tab" href="#step3" role="tab" aria-controls="step3" aria-selected="false">Step 3</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="step4-tab" data-toggle="tab" href="#step4" role="tab" aria-controls="step4" aria-selected="false">Step 4</a>
          </li>
        </ul> -->
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-7">
                <div class="tab-content" id="stepsContent">
                    <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                        <h2>Get a relocation quote</h2>
                        <div class="filter__content--buttons no-margin">
                            <label for="">What is your estimated move size?</label>
                            <div class="btn-scroll single_choice">
                                <a href="#" class="btn move_size" data-value="1">1 Bedroom</a>
                                <a href="#" class="btn move_size" data-value="2">2 Bedrooms</a>
                                <a href="#" class="btn move_size" data-value="3">3 Bedrooms</a>
                                <a href="#" class="btn move_size" data-value="4">4+ Bedrooms</a>
                                <a href="#" class="btn move_size" data-value="0">Landed House</a>
                            </div>
                        </div>
        
                        <div class="filter__content--buttons no-margin">
                            <label for="">How many items are you moving?</label>
                            <div class="btn-scroll single_choice">
                                <a href="#" class="btn move_items" data-value="full">Full Contents of Home</a>
                                <a href="#" class="btn move_items" data-value="furniture">Some Boxes and some furniture</a>
                                <a href="#" class="btn move_items" data-value="box">10 boxes or less</a>
                            </div>
                        </div>
        
                        <h3>Confirm your details</h3>
        
                        <form id="relocationRequestForm" action="#" class="form-border">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ empty($user->id) ? '' : $user->id }}"/>
                                <input type="hidden" name="partner_id" value="{{ empty($partner_id) ? '' : $partner_id }}"/>
                                <input type="hidden" name="property_id" value="{{ empty($property_id) ? '' : $property_id }}"/>
                                <input type="hidden" name="street" id="street2" value=""/>
                                <input type="hidden" name="move_size" id="move_size2" value=""/>
                                <input type="hidden" name="items" id="items2" value=""/>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" class="form-control" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Mobile Number</label>
                                        <input id="phone" name="mobile_phone" type="text" class="form-control" placeholder="Enter mobile number">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="postcode">Postcode</label>
                                        <input id="postcode" name="postal_code" type="text" class="form-control" placeholder="Enter postcode">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="moving_on">When are you moving?</label>
                                        @php
                                        $date1 = \Carbon\Carbon::now()->addDays(5)->format('Y-m-d');
                                        $date2 = \Carbon\Carbon::now()->addDays(10)->format('Y-m-d');
                                        @endphp
                                        <select name="moving_on" class="select2-main">
                                            <option value="">Not Sure Yet</option>
                                            <option value="{{$date1}}">in 5 days</option>
                                            <option value="{{$date2}}">in 10 days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
        {{-- 
                        <span class="register-steps--step">
                            <span>Step 1 of 3</span>
                        </span>
        
                        <h2 style="font-size:16px !important;">Receive personalised quotes in 3 steps</h2>
        
                        <p>Tell us a little more about your move to ensure you get a more accurate quote</p>
        
                        <form action="#" class="form-border">
                            <span class="title">Where are you moving from {{ $moving_from }}?</span>
                            <div class="form-group">
                                <label for="address">Street</label>
                                <input id="address" type="text" class="form-control" placeholder="Your address goes here">
                            </div>
                            <div class="form-group">
                                <label for="code">Postal code</label>
                                <input id="code" type="text" class="form-control" placeholder="Your postal code goes here">
                            </div> --}}
        
                            <a class="btn stepNext mt-4" href="#step2">Get Quote</a>
                        </form>
                    </div>
                    {{-- <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
        
                        <span class="register-steps--step">
                            <span>Step 2 of 3</span>
                        </span>
        
                        @include('relocation-flow.step2')
        
                        <!--  -->
                        <a class="btn stepNext" href="#step3">Next step</a>
        
                        <div class="buttons">
                            <a class="btn-skip stepNext" href="#step1">Back</a>
                            <a class="btn-skip stepNext" href="#step3">Skip</a>
                        </div>
        
        
        
                    </div>
                    <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                        <span class="register-steps--step">
                            <span>Step 3 of 3</span>
                        </span>
        
                        @include('relocation-flow.step3')
        
                        <a class="btn stepNext" href="#step4">Get Quote</a>
        
                        <div class="buttons">
                            <a class="btn-skip stepNext" href="#step2">Back</a>
                            <a class="btn-skip stepNext" href="#step4">Skip</a>
                        </div>
                    </div> --}}
                    <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step4-tab">
        
                        @include('relocation-flow.step4')
        
                        <div class="buttons">
                            <a href="{{ route('account') }}" class="btn btn-go">Go to Dashboard</a>
                        </div>
        
                        {{-- <a href="{{url('/landing')}}" class="btn">Let's go</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

@endsection

@section('scripts')
<script>
    function goNextStep(href) {
        $('.relocation .tab-pane').hide();
        $(href).tab('show').show();
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();

        window.location.hash = href;
        $('html,body').scrollTop(scrollmem);
        //scroll top mobile
        if ($(window).width() < 767) {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        }
    }

    $(document).ready(function () {
        $('.relocation .stepNext').on('click', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            if (href === '#step2') {
                $('#street2').val($('#address').val());
//                $('#postal_code').val($('#code').val());
            //     goNextStep(href);
            // } else if (href === '#step3') {
//                $('#postal_code').val($('#code').val());
            //     goNextStep(href);
            // } else if (href === '#step4') {
//                var mobile_phone = $('#mobile_phone').val();
//                if (mobile_phone === '' || mobile_phone.length < 7) {
//                    $('#mobile_error').show();
//                    return false;
//                }
                var size = $('.move_size.active').data('value');
                if (size !== undefined) {
                    $('#move_size2').val(size);
                }
                var items = $('.move_items.active').data('value');
                if (items !== undefined) {
                    $('#items2').val(items);
                }
                var data = $('#relocationRequestForm').serialize();
                $.ajax({
                    url: '{{route("relocation.save")}}',
                    type: 'POST',
                    data: data,
                    dataType: "JSON",
                }).done(function (response) {
                    if (response.status === 'success') {
                        goNextStep(href);
                    }
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('server not responding...');
                });
                goNextStep(href);
            } else {
                goNextStep(href);
            }
        });
        
        $('#mobile_phone').on('change', function(){
            $('#mobile_error').hide();
        });
    });
</script>
@endsection
