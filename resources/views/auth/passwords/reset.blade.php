@extends('layout.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('password.update')}}" method="POST" class="register__form">
                    @csrf
                    <span class="register__form--title">{{ __('Reset Password') }}
                        <span class="register__form--title-inner"> Please enter NEW password to get back your account control immediately</span>
                    </span>

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ $email ?? old('email') }}" required autocomplete="email" @if (empty($email)) autofocus @endif>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password" @if (!empty($email)) autofocus @endif>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn">{{ __('Reset Password') }}</button>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
