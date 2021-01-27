@extends('layout.app')

@section('meta_title','Haulmate: Make the most of your move to Singapore')
@section('meta_description','Discover neighbourhoods to live in, book the relocation services you need and connect with a global community of expats. Make your move today')
@section('meta_keywords','Living in Singapore, Moving to Singapore, expats, relocation')

@section('content')
<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 d-flex align-items-end">
                <div class="promo">
                    <span class="promo__text">Moving house in Singapore?</span>

                    <h2>Manage your entire move from one place</h2>

                    <p>Book the relocation services you need, discover areas to live and make the most of your move.</p>

                </div>
            </div>
            <div class="col-md-5 d-none d-md-block">
                <div class="poster">
                    <img src="{{asset('assets/img/section1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
        <div class="form-block">
            <div class="container">
                <form id="stepsForm" method="POST" action="{{route('register_steps')}}">
                    @csrf
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
                                <a href="#" type="submit" class="personalise" data-type=""><img src="{{asset('assets/img/settings.svg')}}" alt=""> Personalise your move</a>
                                <a href="{{route('dashboard')}}" class="btn start_btn" data-type="">GO <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="container">
        <h2>Services Haulmate Offers</h2>
        <div class="row mb-md-5">
            @php
            $service_counter = 0;
            @endphp
            @foreach ($services as $service)
            @php
            $service_counter += 1;
            @endphp
            <div class="col-md-4 offer-item">
                <div class="left">
                    <img src="{{$service->default_icon_url}}" alt="">
                </div>
                <div class="right">
                    <span>{{$service->name}}</span>
                    <p>{{$service->description}}</p>
                </div>
            </div>
            @if ($service_counter < count($services) && ($service_counter % 3) === 0)
        </div>
        <div class="row mb-md-5">
            @endif
            @endforeach
        </div>
    </div>
</section>

<section class="move">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Simplify your entire moving experience</h2>
                <p>Your personalised relocation dashboard saves you time and effort by connecting you with the information and services you need to make the most of your move</p>
            </div>
        </div>
        <img src="{{asset('assets/img/move_bg.png')}}" alt="" class="d-none d-md-block">
        <img src="{{asset('assets/img/move_bg_m.png')}}" alt="" class="d-md-none">
    </div>
</section>

<section class="community">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Explore Singapore Neighbourhoods</h2>

                <p>If you're still not sure what area is right for you, our Singapore area guide provides personalised recommendations on which areas are most suited to you and your lifestyle</p>

                <div class="buttons">
                    <a href="{{route('community')}}" class="view">Explore areas</a>
                    <?php /*a href="{{route('community')}}" class="view">Visit Community</a>
                    <a href="{{route('community')}}" class="post" data-redirect="community">Post a question <img src="{{asset('assets/img/community_arrow.svg')}}" alt=""></a */?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="section-2">
    <div class="container">
        <h3>Book everything you need...</h3>
        <div class="row items">
            <div class="col-md-4 items__single">
                <div class="items__single--poster">
                    <img src="{{asset('assets/img/step1.png')}}" alt="">
                </div>

                <span class="items__single--title">Personalise</span>

                <span class="items__single--text">Tell us where you are going and what you need to organise your move</span>
            </div>
            <div class="col-md-4 items__single">
                <div class="items__single--poster">
                    <img src="{{asset('assets/img/step2.png')}}" alt="">
                </div>
                
                <span class="items__single--title">Review</span>

                <span class="items__single--text">Review personalised recommendations and begin planning your move</span>
            </div>
            <div class="col-md-4 items__single">
                <div class="items__single--poster">
                    <img src="{{asset('assets/img/step3.png')}}" alt="">
                </div>

                <span class="items__single--title">Book</span>

                <span class="items__single--text">Begin booking everything you need from virtual property inspections to relocation services at the click of a button</span>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="section-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <h3>Not sure which area will best suit your lifestyle?</h3>
                <h3>instantly match local neighbourhoods to your ideal lifestyle</h3>

                <p>Our LocaliseMe tool will provide you with personalised recommendations on best suited neighbourhoods in just 90 seconds</p>

                <img src="{{asset('assets/img/section3_m.png')}}" alt="" class="img-fluid d-none d-md-block d-lg-none">

                <a href="#" class="btn start_btn" data-type="recommend">Get Recommendations</a>
            </div>
        </div>
    </div>
</section>
<section class="section-3-m">
    <img src="{{asset('assets/img/section3_m.png')}}" alt="" class="img-fluid d-md-none">
</section> -->
<!-- 
<section class="section-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-5">
                <h3>Assign tasks to local experts even before you move</h3>

                <p>Our team of local experts are on standby to complete any task you want</p>

                <ul>
                    <li>Can you record a tour of two neighbourhoods so I get a sense of what it’s really like to live there?</li>
                    <li>Can you do a do inspection of a property this Tuesday?</li>
                    <li>I’ve just and would love a tour of the best local spots of Singapore. Can Haulmate help?</li>
                </ul>

                <img src="./img/section4_bg.png" alt="" class="img-fluid d-md-none">

                <a href="tasks.html" class="btn">Assign Tasks</a>
            </div>
        </div>
        
    </div>
</section> -->

<!-- <section class="services">
    <div class="container">
        <h3>WHAT SERVICES HAULMATE CAN CONNECT YOU WITH</h3>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-6 col-md-4">
                         <a href="property.html"> 
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/services1.png')}}" alt="">
                            </div>
                            
                            <span class="services__item--title">PROPERTY</span>
                            <span class="services__item--text">Help me find a place to live</span>
                        </div>
                     </a> 
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/services2.png')}}" alt="">
                            </div>

                            <span class="services__item--title">Movers</span>
                            <span class="services__item--text">I need someone to move my things</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/organise/insurance.png')}}" alt="">
                            </div>

                            <span class="services__item--title">Insurance</span>
                            <span class="services__item--text">Protect the things and people I love during and after my move</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                         <a href="finance.html"> 
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/services4.png')}}" alt="">
                            </div>

                            <span class="services__item--title">BANK ACCOUNT</span>
                            <span class="services__item--text">I will need a local bank account</span>
                        </div>
                         </a> 
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/organise/mobile.png')}}" alt="">
                            </div>

                            <span class="services__item--title">Mobile Plan</span>
                            <span class="services__item--text">Make sure I’m connected from the moment I land</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="services__item">
                            <div class="services__item--poster">
                                <img src="{{asset('assets/img/services5.png')}}" alt="">
                            </div>

                            <span class="services__item--title">Post Move</span>
                            <span class="services__item--text">Help me set-up my life once I arrive and beyond</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  -->

<section class="section-5">
    <div class="container">
        <h3>What our customers say about us</h3>
        <span class="text">Trusted by expats all around the world</span>

        <div class="say storiesSlider">
            @foreach ($testimonials as $testimonial)
            <div class="say__item">
                <p>{{$testimonial->testimonial}}</p>

                <div class="say__item--block">
                    <div class="left">
                        <div class="say__item--poster" style="background: url('{{$testimonial->image_url}}') no-repeat center center; background-size: cover;">
                        </div>
                    </div>
                    <div class="right">
                        <span class="say__item--name">{{$testimonial->name}}</span>
                        
                        <span class="say__item--country">{{$testimonial->country->country}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="moving">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Make your move</h2>
                <p>Tell us where you're going and instantly access your dashboard</p>
            </div>
        </div>
        <div class="form-block no-bg">
            <form id="stepsForm2" method="POST" action="{{route('register_steps')}}">
                @csrf
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-6">
                        <div class="dropdowns">
                            <div>
                                <select name="moving_from" id="movingFrom2" class="select2-flags2">
                                    <option value="" disabled selected>Moving from</option>
                                </select>
                            </div>
                            <div>
                                <select name="moving_to" id="movingTo2" class="select2-flagss2">
                                    <option value="" disabled selected>Moving To</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="buttons">
                            <a href="#" type="submit" class="personalise" data-type="2"><img src="{{asset('assets/img/settings.svg')}}" alt=""> Personalise your move</a>
                            <a href="{{route('dashboard')}}" class="btn start_btn" data-type="2">GO <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<style>
    .slick-prev{z-index:1;}
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.personalise').on('click', function(e){
            e.preventDefault();
            if ($('#movingFrom' + $(this).data('type')).children("option:selected").val() === '') {
                $('#movingFrom' + $(this).data('type')).select2('open');
                return false;
            }
            if ($('#movingTo' + $(this).data('type')).children("option:selected").val() === '') {
                $('#movingTo' + $(this).data('type')).select2('open');
                return false;
            }
            $('#stepsForm' + $(this).data('type')).submit();
        });

        $('.start_btn').on('click', function(e){
            e.preventDefault();
            if ($('#movingFrom' + $(this).data('type')).children("option:selected").val() === '') {
                $('#movingFrom' + $(this).data('type')).select2('open');
                return false;
            }
            if ($('#movingTo' + $(this).data('type')).children("option:selected").val() === '') {
                $('#movingTo' + $(this).data('type')).select2('open');
                return false;
            }
            $('#stepsForm' + $(this).data('type')).attr('action', "{{route('save_steps')}}").submit();
        });

        //select2 countries
        var country = [
            <?php
            $singapore = [];
            if(!empty($countries)) {
                foreach($countries as $country) {
                    echo json_encode($country) . ',';
                    if ($country->code === 'SG')
                        $singapore = $country;
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

        $('.select2-flags, .select2-flagss').select2({
            data: country_from,
            templateResult: formatCountry,
            templateSelection: formatCountry
        });
        $('.select2-flags2, .select2-flagss2').select2({
            data: country,
            templateResult: formatCountry,
            templateSelection: formatCountry
        });
        $('.select2-flags, .select2-flagss, .select2-flags2, .select2-flagss2').on('select2:open', function (e) {
            $('.select2-container').css('z-index', '3')
        });
        @if (!empty($singapore->id))
            $('.select2-flagss, .select2-flagss2').val('{{$singapore->id}}').trigger('change');
        @endif
    });
</script>

@endsection
