@extends('layout.app')

@section('content')

<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="register__form--title">{{ __('Verify Your Email Address') }}
                    <span class="register__form--title-inner"> {{ __('Before proceeding, please check your email for a verification link.') }}</span>
                </span>

                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif

                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
