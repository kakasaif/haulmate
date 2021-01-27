<!DOCTYPE html>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

    <title>{{View::getSection('meta_title') ?? $meta_title ?? 'Haulmate'}}</title>

	<meta name="description" content="{{View::getSection('meta_description') ?? $meta_description ?? ''}}">
    <meta name="keywords" content="{{View::getSection('meta_keywords') ?? $meta_keyword ?? ''}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Template Basic Images Start -->
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{View::getSection('meta_title') ?? $meta_title ?? 'Haulmate'}}" />
    <meta property="og:description" content="{{View::getSection('meta_description') ?? $meta_description ?? ''}}" />
    <meta property="og:image" content="{{$meta_image ?? asset('assets/img/og-image.jpg')}}" />

	<link rel="icon" href="{{asset('assets/img/favicon/favicon.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon/apple-touch-icon-180x180.png')}}">
	<!-- Template Basic Images End -->
	
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
	<!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/fancybox/dist/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/jquery.scrollbar-master/jquery.scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/fontawesome/css/all.min.css')}}">
    <script src="{{ asset('assets/libs/jquery/dist/jquery-3.5.1.min.js') }}"></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ed210c80ea83f0012d818ad&product=inline-share-buttons&cms=sop' async='async'></script>

    @yield('css')

    <!-- Hotjar Tracking Code for www.haulmate.co -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1819999,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<body>
    <input type="hidden" id="base_url" value="{{url('/')}}">
    <input type="hidden" id="locations_fave" value="{{route("locations.fave")}}">
    <input type="hidden" id="locations_blacklist" value="{{route("locations.blacklist")}}">
    <input type="hidden" id="properties_fave" value="{{route("properties.fave")}}">
	<div class="overlay" style="display: none;"></div>
	<!-- Custom HTML -->

    <!-- Modal login -->
    <div class="modal fade modal-login" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{asset('assets/img/close_modal.svg')}}" alt="close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Welcome back!</h2>
                    <p>Log in to your Haulmate account below</p>
                    <form id="loginForm" action="{{route('login.email')}}" method="POST" class="register__form">
                        @csrf
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control auth-fields" required="">
                            <span id="email-error" class="invalid-feedback" role="alert">
                                <strong>Email not found</strong>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control auth-fields" required="">
                            <span id="password-error" class="invalid-feedback" role="alert">
                                <strong>Invalid password</strong>
                            </span>
                        </div>

                        <button type="submit" class="btn">Login</button>
                    </form>

                    <span class="or">or</span>

                    <div class="social-login">
                        <a href="{{route('login.facebook')}}" class="btn-social">
                            <img src="{{asset('assets/img/fb_modal.svg')}}" alt="Facebook"> Login with Facebook</i>
                        </a>
                        <a href="{{route('login.google')}}" class="btn-social">
                            <img src="{{asset('assets/img/google_modal.svg')}}" alt="close"> Login with Google</i>
                        </a>
                    </div>

                    <span class="info">Don't have an account?</span>
                    <a href="#" class="more" data-dismiss="modal" data-toggle="modal" data-target="#signModal">Sign up here</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Signup login -->
    <div class="modal fade modal-login" id="signModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{asset('assets/img/close_modal.svg')}}" alt="close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="email-default">
                        <h2 class="mb-5">Join Haulmate and make moving easy</h2>

                        <div class="social-login mb-4">
                            <a href="{{route('login.facebook')}}" class="btn-social">
                                <img src="{{asset('assets/img/fb_modal.svg')}}" alt="Facebook"> Sign up with facebook</i>
                            </a>
                            <a href="{{route('login.google')}}" class="btn-social">
                                <img src="{{asset('assets/img/google_modal.svg')}}" alt="close"> Sign up with Google</i>
                            </a>
                            <a href="#" class="btn-social emailRegister">
                                <img src="{{asset('assets/img/email_modal.svg')}}" alt="close"> Sign up with your Email</i>
                            </a>
                            
                        </div>
                    </div>

                    <div class="email-register" style="display: none;">
                        <h2 class="mb-4 text-left">
                            <a href="#" class="back emailDefault"><img src="{{asset('assets/img/back.svg')}}" alt="back"></a> Sign up with your Email
                        </h2>

                        <form id='registerForm' action="{{route('user.register')}}" method="POST" class="register__form">
                            @csrf
                            <input id="register_redirect" type="hidden" name="redirect" value="{{Request::url()}}"/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input id="first_name" type="text" name="first_name" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input id="last_name" type="text" name="last_name" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input id="email" type="email" name="email" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input id="password" type="password" name="password" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required="">
                                    </div>
                                </div>
                                <span id="register-error" class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
        
                            <button type="submit" class="btn">Sign up</button>
                        </form>
                    </div>

                    <span class="info">Already have an account?</span>
                    <a href="#" class="more" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>
                </div>
            </div>
        </div>
    </div>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img width="180" src="{{asset('assets/img/logo-main.png')}}" alt="Haul-mate">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{asset('assets/img/menu.svg')}}" alt="">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('community')}}">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                        </li>
                        @guest
                        <li class="nav-item with-border" style="display:inline-flex">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log in</a>
                            @if (!Auth::check())
                            <a class="nav-link button" href="#" data-toggle="modal" data-target="#signModal">Sign up</a>
                            @endif
                        </li>
                        @else
<!--                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/account')}}">Home</a>
                        </li>-->
                        <li class="nav-item with-border">
                            <a class="nav-link" href="{{url('/favorites')}}">
                                <img src="{{asset('assets/img/favorites-menu.svg')}}" alt="">
                            </a>
<!--                            <a class="nav-link" href="{{url('/favorites')}}">
                                <div class="notification-menu active">
                                    <img src="{{asset('assets/img/notifications-menu.svg')}}" alt="">
                                </div>
                            </a>-->
                        </li>
                        <li class="nav-item">
                           
                            <div class="dropdown account-dropdown show">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="poster">
                                        <img src="{{Auth::user()->photo_url}}" alt="">
                                    </div>
                                    <span class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                </a>
                              
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                                  <!--<a class="dropdown-item" href="{{url('/account')}}">Home</a>-->
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                            {{-- <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                        </li>
                        @endguest
                    </ul>
                </div>
			</nav>
		</div>
    </header>
    
    @yield('content')
    @yield('scripts')

    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img width="160" src="{{asset('assets/img/logo-main.png')}}" alt="Haul-mate">
                    </a>
                </div>
                <div class="col-md-6">
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('community')}}">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                        </li>
                        <li class="nav-item" style="display:inline-flex">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log in</a>
                            @if (!Auth::check())
                            <a class="nav-link button" href="#" data-toggle="modal" data-target="#signModal">Sign up</a>
                            @endif
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/account')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('community')}}">Community</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/about')}}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
                <div class="col-md-3">
                    <nav class="social">
                        <a href="https://www.facebook.com/HaulMate-111260370620246" target="_blank"><img src="{{asset('assets/img/fb.svg')}}" alt=""></a>
                        <a href="https://www.instagram.com/haulmate/" target="_blank"><img src="{{asset('assets/img/inst.svg')}}" alt=""></a>
                        <!--<a href="#"><img src="{{asset('assets/img/tw.svg')}}" alt=""></a>-->
                    </nav>
                </div>
            </div>

            <div class="copy">
                <span>© Copyright {{ date('Y') }}, Haulmate </span>

                <nav class="copy--links">
                    <a href="{{route('privacy_policy')}}">Privacy Policy</a>
                    <a href="{{route('terms_of_use')}}">Terms of use</a>
                </nav>
            </div>
        </div>
    </footer>

    @if(Session::has('showRegisterModal'))
        <script>
                $(document).ready(function () {
                    $("#signModal").modal('show');
                });
        </script>
    @endif

    @if(Session::has('showLoginModal'))
        <script>
                $(document).ready(function () {
                    $("#loginModal").modal('show');
                });
        </script>
    @endif

    <script src="{{asset('assets/js/scripts.min.js')}}"></script>
    <script src="{{asset('assets/libs/autocomplete/autocomplete.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery.scrollbar-master/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV7sTGhOtqXVGY6NhdiIwcXhNUcJmSnOk"></script>
    <script type="text/javascript">
        (function($) {
            $('.auth-fields').on('change paste keyup', function(e){
                $('#email-error').hide().html('');
                $('#password-error').hide().html('');
            });

            $('#loginForm').on('submit', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    data: data,
                    method: 'POST',
                    dataType: 'json',
                    success: function (result) {
                        if (result.status === 'error')
                            $('#password-error').html(result.error).show();
                        else
                            window.location = "{{ route('account') }}";
                    },
                    error: function (xhr, status, error) {
                        var response = jQuery.parseJSON(xhr.responseText);
                        $.each( response.errors, function(i, error){
                            if (i === 'email') {
                                $('#email-error').html(error).show();
                            } else {
                                $('#password-error').html(error).show();
                            }
                        });
                    },
                });
            });

            $('#registerForm').on('submit', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    data: data,
                    method: 'POST',
                    dataType: 'json',
                    success: function (result) {
                        window.location = result.redirect;
                    },
                    error: function (xhr, status, error) {
                        var response = jQuery.parseJSON(xhr.responseText);
                        var errors = '';
                        $.each( response.errors, function(i, error){
                            errors += error + '<br/>';
                        });
                        $('#register-error').html('<strong>' + errors + '</strong>').show();
                    },
                });
            });
            
        /*
        *  new_map
        *
        *  This function will render a Google Map onto the selected jQuery element
        *
        *  @type  function
        *  @date  8/11/2013
        *  @since 4.3.0
        *
        *  @param $el (jQuery element)
        *  @return  n/a
        */

        function new_map( $el ) {
            
            // var
            var $markers = $el.find('.marker');
            
            
            // vars
            var args = {
                zoom    : 10,
                center    : new google.maps.LatLng(0, 0),
                mapTypeId : google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true,
                // clickableIcons: false,
                // styles : [
                //         {
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#f5f5f5"
                //             }
                //             ]
                //         },
                //         {
                //             "elementType": "labels.icon",
                //             "stylers": [
                //             {
                //                 "visibility": "off"
                //             }
                //             ]
                //         },
                //         {
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#616161"
                //             }
                //             ]
                //         },
                //         {
                //             "elementType": "labels.text.stroke",
                //             "stylers": [
                //             {
                //                 "color": "#f5f5f5"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "administrative.land_parcel",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#bdbdbd"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "poi",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#eeeeee"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "poi",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#757575"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "poi.park",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#e5e5e5"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "poi.park",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#9e9e9e"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "road",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#ffffff"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "road.arterial",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#757575"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "road.highway",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#dadada"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "road.highway",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#616161"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "road.local",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#9e9e9e"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "transit.line",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#e5e5e5"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "transit.station",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#eeeeee"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "water",
                //             "elementType": "geometry",
                //             "stylers": [
                //             {
                //                 "color": "#c9c9c9"
                //             }
                //             ]
                //         },
                //         {
                //             "featureType": "water",
                //             "elementType": "labels.text.fill",
                //             "stylers": [
                //             {
                //                 "color": "#9e9e9e"
                //             }
                //             ]
                //         }
                //         ]
            };
            
            
            // create map           
            var map = new google.maps.Map( $el[0], args);
            
            
            // add a markers reference
            map.markers = [];
            
            
            // add markers
            $markers.each(function(){
            
                add_marker( $(this), map );
            
            });

            
            // center map
            center_map( map );
            
            
            // return
            return map;
            
        }

        /*
        *  add_marker
        *
        *  This function will add a marker to the selected Google Map
        *
        *  @type  function
        *  @date  8/11/2013
        *  @since 4.3.0
        *
        *  @param $marker (jQuery element)
        *  @param map (Google Map object)
        *  @return  n/a
        */

        function add_marker( $marker, map ) {
            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );  
            var image = $marker.attr('data-favourite');
            // var image;
            
            // console.log(imageUrl)
            // if (!isFavourite) {
            //     image = "{{asset('assets/img/map_icon.svg')}}";
            //     console.log(image)
            // } else {
            //     image = "{{asset('assets/img/map_icon_marked.svg')}}";
            //     console.log(image)
            // }    
            var icon = {
                url: image, // url
                scaledSize: new google.maps.Size(36, 36), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                map:      map,
                title:    'Haulmate',
                icon:     icon
            });

            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow
            var check_content = $(".content[data-id="+$marker.attr('data-id')+"]").html()
            if( check_content != "" && typeof check_content != undefined)
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content   : $(".content[data-id="+$marker.attr('data-id')+"]").html()
                });

                // show info window when marker is clicked
                
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open( map, marker );
                    // $('.map__single').addClass('active');
                    // $('.map__single .card').hide();
                });

                //show/hide popup on hover
                google.maps.event.addListener(marker, 'mouseover', function() {

                    // infowindow.open( map, marker );

                });

                google.maps.event.addListener(marker, 'mouseout', function() {

                    // infowindow.close( map, marker );
                    console.log('close')

                });

                
            }

            google.maps.event.addListenerOnce(map, 'idle', function(){
                google.maps.event.trigger(map, 'resize');
                center_map(map);
            });

        }

        /*
        *  center_map
        *
        *  This function will center the map, showing all markers attached to this map
        *
        *  @type  function
        *  @date  8/11/2013
        *  @since 4.3.0
        *
        *  @param map (Google Map object)
        *  @return  n/a
        */

        function center_map( map ) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
            // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( 7 );
            }
            else
            {
            // fit to bounds
            map.fitBounds( bounds );
            }

        }

        /*
        *  document ready
        *
        *  This function will render each map when the document is ready (page has loaded)
        *
        *  @type  function
        *  @date  8/11/2013
        *  @since 5.0.0
        *
        *  @param n/a
        *  @return  n/a
        */
        // global var
        var map = null;

        $(document).ready(function(){

            $('.acf-map').each(function(){

            // create map
            map = new_map( $(this) );

            });
        });

        

        })(jQuery);
        </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167187512-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    @if (Auth::user())
        gtag('config', 'UA-167187512-1', {
            'user_id': '{{Auth::user()->id}}'
        });
    @else
        gtag('config', 'UA-167187512-1');
    @endif
</script>
<!-- End Google Analytics -->
</body>
</html>
