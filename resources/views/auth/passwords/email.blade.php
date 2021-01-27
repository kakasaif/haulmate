@extends('layout.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('password.email')}}" method="POST" class="register__form">
                    @csrf
                    <span class="register__form--title">Don't worry!
                        <span class="register__form--title-inner"> Let's get back your account control </span></span>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn">{{ __('Send Password Reset Link') }}</button>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
