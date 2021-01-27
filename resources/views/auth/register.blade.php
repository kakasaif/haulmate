@extends('layout.app')

@section('content')
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-5">
                <form action="{{ route('register') }}" method="POST" class="register__form">
                    @csrf
                    <span class="register__form--title">Join Haulmate and make moving easy</span>

                    <div class="form-group">
                        <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="last_name" type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" value="{{ old('last_name') }}" required autocomplete="last_name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required autocomplete="new-password">
                    </div>

                    <button class="btn">Let's do this</button>

                    <div class="social-login">
                        <a href="{{route('login.facebook')}}" class="btn">
                            Sign-up with <i class="fab fa-facebook"></i>
                        </a>
                        <a href="{{route('login.google')}}" class="btn">
                            Sign-up with <i class="fab fa-google"></i>
                        </a>
                    </div>

                    <span class="or">- or -</span>

                    <span class="register__form--text">Do you have an account?</span>
                    <a href="{{url('/login')}}" class="register__form--url">Sign In</a>
                </form>
            </div>
            <div class="col-md-6 col-xl-7">
                <div class="register__text">
                    <span>Make the most of your next move and ensure you hit the ground running!</span>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection