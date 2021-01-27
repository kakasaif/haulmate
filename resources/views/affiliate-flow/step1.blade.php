@extends('layout.app')
@section('content')

<section class="partner" style="background: url('{{$partner->banner_url ?? asset('assets/img/partner_bg.png')}}') no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="partner__info">
            <h2>{!! $partner->banner_title ?? 'A PERFECT PLAN<br>JUST FOR YOU!' !!}</h2>
            <span>{{ $partner->banner_subtitle ?? '10GB FOR $12/MO'}}</span>

            <a href="{{ $partner->banner_action ? url($partner->banner_action) : url('/') }}" class="btn">{{ $partner->banner_button ?? 'Get started' }}</a>
        </div>
    </div>
</section>

<section class="partner-plans">
    <div class="container">
        {!! $partner->body ?? '' !!}
        <a href="{{ $partner->action ? url($partner->action) : url('/') }}" class="btn">{{ $partner->button_text ?? 'Get started' }}</a>
    </div>
</section>

<div class="property-similar">
    <div class="container">
        <h2>Similar Offers</h2>
        <div class="dashboard__content--areas">
                                
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area1.png')}}') no-repeat center center; background-size: cover;">
                    <span>Downtown</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Downtown</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area2.png')}}') no-repeat center center; background-size: cover;">
                    <span>Tiong Bahru</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Tiong Bahru</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area3.png')}}') no-repeat center center; background-size: cover;">
                    <span>Kallang</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Kallang</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area4.png')}}') no-repeat center center; background-size: cover;">
                    <span>Newton</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Newton</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area7.png')}}') no-repeat center center; background-size: cover;">
                    <span>Tanglin</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Tanglin</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area2.png')}}') no-repeat center center; background-size: cover;">
                    <span>Tiong Bahru</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Tiong Bahru</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{url('location-inner')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area2.png')}}') no-repeat center center; background-size: cover;">
                    <span>Tiong Bahru</span>
                    <div class="search-block__item--hover">
                        <div class="top">
                            <span class="like">
                                <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                            </span>
                            <span onclick="document.location.href='{{url('location-inner')}}'">Tiong Bahru</span>
                            <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                        </div>

                        <table class="content">
                            <tbody>
                                <tr>
                                    <td>
                                        <span>💰</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>⌛️</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>🛩</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>👨‍👩‍👧‍👧</span> 
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%;"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<section class="section-5">
    <div class="container">
        <h3>Customer Success Stories</h3>
        <span class="text">Trusted by thousands of expats all around the world</span>

        <div class="stories storiesSlider">
            <div class="stories__item">
                <div class="stories__item--poster" style="background: url({{asset('assets/img/stories1.png')}}) no-repeat center center; background-size: cover;">
                </div>
                <span class="stories__item--country">India</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

                <span class="stories__item--name">Saanvi Sai</span>
                <span class="stories__item--type">India</span>
            </div>

            <div class="stories__item">
                <div class="stories__item--poster" style="background: url({{asset('assets/img/stories2.png')}}) no-repeat center center; background-size: cover;">
                </div>
                <span class="stories__item--country">Taiwan</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

                <span class="stories__item--name">Hsiao-Han Deko</span>
                <span class="stories__item--type">Company</span>
            </div>

            <div class="stories__item">
                <div class="stories__item--poster" style="background: url({{asset('assets/img/stories3.png')}}) no-repeat center center; background-size: cover;">
                </div>
                <span class="stories__item--country">France</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

                <span class="stories__item--name">Mike Jones</span>
                <span class="stories__item--type">Company</span>
            </div>

            <div class="stories__item">
                <div class="stories__item--poster" style="background: url({{asset('assets/img/stories1.png')}}) no-repeat center center; background-size: cover;">
                </div>
                <span class="stories__item--country">India</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>

                <span class="stories__item--name">Saanvi Sai</span>
                <span class="stories__item--type">India</span>
            </div>
        </div>
    </div>
</section>

@endsection