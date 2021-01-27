@extends('layout.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-5">
                <form action="{{route('login')}}" method="POST" class="register__form">
                    @csrf
                    <span class="register__form--title">Welcome back!
                        <span class="register__form--title-inner"> Log back in to continue planning your move </span></span>

                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn">Login</button>

                    <div class="social-login">
                        <a href="{{route('login.facebook')}}" class="btn">
                            Login with <i class="fab fa-facebook"></i>
                        </a>
                        <a href="{{route('login.google')}}" class="btn">
                            Login with <i class="fab fa-google"></i>
                        </a>
                    </div>

                    <a href="{{ route('password.request') }}" class="register__form--url">{{ __('Forgot Your Password?') }}</a>
                    
                    <br><br/>

                    <span class="or">- or -</span>

                    <a href="{{ route('register') }}" class="register__form--url">Register</a>
                </form>
            </div>
            <div class="col-md-6 col-xl-7">
                {{--
                <div class="register__text">
                    <span>Make the most of your next move and ensure you hit the ground running!</span>
                </div>
                --}}
            </div>
        </div>
    </div>
</section>

@endsection