@extends('layout.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('password.confirm')}}" method="POST" class="register__form">
                    @csrf
                    <span class="register__form--title">{{ __('Confirm Password') }}
                        <span class="register__form--title-inner"> {{ __('Please confirm your password before continuing.') }}</span>
                    </span>

                    <div class="form-group">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password" @if (!empty($email)) autofocus @endif>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn">{{ __('Confirm Password') }}</button>

                    @if (Route::has('password.request'))
                    <br/><br/>

                    <a href="{{ route('password.request') }}" class="register__form--url">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
