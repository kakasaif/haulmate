@extends('layout.app')

@section('content')

<section class="profile">    
    <div class="container">
        <div class="row">   
            <div class="col-md-3">
                <div class="profile__sidebar">
                    <h2>Edit Profile</h2>

                    <ul class="nav flex-column" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link @if(!session('tab')) active @endif" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">
                                <span class="icon">
                                    <img class="no-active" src="{{asset('assets/img/profile/user.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/profile/user_active.svg')}}" alt="">
                                </span>
                                User Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(session('tab') === 'reset') active @endif" id="reset-tab" data-toggle="tab" href="#reset" role="tab" aria-controls="reset" aria-selected="true">
                                <span class="icon">
                                    <img class="no-active" src="{{asset('assets/img/profile/option.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/profile/option_active.svg')}}" alt="">
                                </span>
                                Change Password</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="preferences-tab" data-toggle="tab" href="#preferences" role="tab" aria-controls="preferences" aria-selected="false">
                                <span class="icon">
                                    <img class="no-active" src="{{asset('assets/img/profile/setting.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/profile/setting_active.svg')}}" alt="">
                                </span>
                                Preferences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="false">
                                <span class="icon">
                                    <img class="no-active" src="{{asset('assets/img/profile/setting.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/profile/setting_active.svg')}}" alt="">
                                </span>
                                Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="locations-tab" data-toggle="tab" href="#locations" role="tab" aria-controls="services" aria-selected="false">
                                <span class="icon">
                                    <img class="no-active" src="{{asset('assets/img/profile/setting.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/profile/setting_active.svg')}}" alt="">
                                </span>
                                Locations</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile__content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade @if(!session('tab')) show active @endif" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="profile__block">
                                <div class="profile__block--info">
                                    <div class="poster upload" style="background: url('{{$user->photo_url ?? ''}}') no-repeat center center; background-size: cover; cursor:pointer">

                                    </div>
                                    <div class="right">
                                        <span class="name">{{ $user->first_name }} {{ $user->last_name }}</span>
                                        <a href="#" class="profile__block--change">Click on here to change profile photo</a>
                                        {{-- <span class="country">
                                            @if(!empty($countries[$user->moving_from]))
                                                <span class="flag">
                                                    <img src="{{$countries[$user->moving_from]->flag_url ?? ''}}" alt="">
                                                </span>
                                                {{$countries[$user->moving_from]->country}}
                                            @endif
                                        </span> --}}
                                    </div>
                                </div>

                                <div class="property__left--selection">
                                    <label for=""><span>Your selection</span> <a href="{{route('register_steps')}}" class="edit">Edit</a></label>
                        
                                    <div class="property__left--options">
                                        <div>
                                            <label for="">Relocation</label>
                        
                                            <div class="relocation">
                                                <span><img src="{{$country_from->flag_url ?? ''}}" alt="" width="21"></span>
                                                <span><img src="{{asset('assets/img/relocation-arrow.svg')}}" alt=""></span>
                                                <span><img src="{{$country_to->flag_url ?? ''}}" alt="" width="21"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Lifestyle options</label>
                                            <div class="properties__item--options">
                                                @if(!empty($user_detail->preferences))
                                                    @php
                                                        $good_prefs = [];
                                                        $show_count = 50;
                                                        $counter = 0;
                                                    @endphp
                                                    @foreach($user_detail->preferences as $preference)
                                                        @php
                                                            $good_prefs[] = $preference;
                                                        @endphp
                                                        @if (++$counter <= $show_count)
                                                        <div class="properties__item--option">
                                                            <img src="{{$preference->icon_url ?? ''}}" alt="">
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                    @if (count($good_prefs) - $show_count > 0)
                                                        <div class="properties__item--option">
                                                            +{{ count($good_prefs) - $show_count }}
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Live close to</label>
                                            <span class="address"><b>{{$user->live_close ?? 'City Centre'}}</b> within {{$user->remoteness ?? 10}} mins by {{empty($user->transport) || $user->transport === 'public' ? 'public transport' : $user->transport}}</span>
                                        </div>
                                        <div>
                                   
                                        </div>
                                    </div>
                                </div>
                    
                                @if(session('status'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>{{ session('status') }}</strong>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('profile.save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="photo_url" class="photo-upload" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">First Name</label>
                                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $user->first_name ?? '' }}">
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $user->last_name ?? '' }}">
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email address</label>
                                                <input type="email" class="form-control" value="{{ $user->email }}" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone number</label>
                                                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone ?? '' }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
<!--                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Countries you have lived in</label>
                                                <select name="lived_in" id="livedIn" class="select2 select2-forum" multiple="multiple">
                                                    @if(!empty($countries))
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->code}}">{{$country->country}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nationality</label>
                                                <input type="text" class="form-control" name="nationality" value="{{ $user->nationality ?? '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Currently living in</label>
                                                <select name="moving_from" id="livingIn" class="select2-main">
                                                    <!--<option value="" disabled>Choose country</option>-->
                                                    @if(!empty($countries))
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->code}}" @if($user->moving_from === $country->code) selected="" @endif>{{$country->country}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Moving to</label>
                                                <select name="moving_to" id="movingTo" class="select2-main">
                                                    <!--<option value="" disabled>Choose country</option>-->
                                                    @if(!empty($countries))
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->code}}" @if($user->moving_to === $country->code) selected="" @endif>{{$country->country}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Moving with</label>

                                                <div class="row buttonsSwitch">
                                                    <div class="col-lg-4">
                                                        <a href="#" class="btn active">By yourself</a>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" class="btn">As a couple</a>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" class="btn">As a family</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <button class="btn">Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade @error('old_password') show active @enderror @if(session('tab') === 'reset') show active @endif" id="reset" role="tabpanel" aria-labelledby="reset-tab">
                            <form method="POST" action="{{ route('password.new') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="password" class="form-control @error('old_password') is-invalid @enderror @if(session('old_password_error')) is-invalid @endif" name="old_password" value="{{ $old_password ?? old('old_password') }}" required autocomplete="old_password" autofocus>

                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if(session('old_password_error'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ session('message') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        $('.poster.upload, .profile__block--change').on('click', function() {
            $('.photo-upload').click();
        });

        $(".save-preference").on('click', function(e) {
            e.preventDefault();
            var data = {
                preferences: []
            }

            $("#preferences .areas__item.active").each(function() {
                data.preferences.push($(this).data('id'));
            });

            ajaxPost('/profile/save_preferences', data, response => {
                location.reload(true);
            }, error => {

            });
        });

        $(".save-service").on('click', function(e) {
            e.preventDefault();
            var data = {
                services: []
            }

            $("#services .blocks__item.active").each(function() {
                data.services.push($(this).data('id'));
            });

            ajaxPost('/profile/save_services', data, response => {
                location.reload(true);
            }, error => {

            });
        });
        
        $(".save-location").on('click', function(e) {
            e.preventDefault();
            var data = {
                live_close: $('#live_close').val(),
                remoteness: $('.remoteness.active').data('value'),
                transport: $('.transport.active').data('value'),
            }

            ajaxPost('/profile/save_location', data, response => {
                location.reload(true);
            }, error => {

            });
        });

        $(".cancel-preference, .cancel-service, .cancel-location").on('click', function(e) {
            e.preventDefault();
            location.reload(true);
        });
    </script>
    <script src="{{asset('assets/js/pages/register-step.js')}}"></script>
@endsection