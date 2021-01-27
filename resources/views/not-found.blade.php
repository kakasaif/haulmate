@extends('layout.app')
@section('content')

<section class="not-found">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <img src="{{asset('assets/img/not_found.png')}}" alt="Oops">

                <h2>Something went wrong</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut augue ligula, iaculis eget sagittis sit 
                    amet, eleifend quis diam. Etiam et eros non mauris tincidunt laoreet. Pellentesque tem. </p>

                <a href="{{url('/')}}" class="btn">Back to home</a>
            </div>
        </div>
    </div>
</section>
@endsection