@extends('layout.app')
@section('content')

<div class="title-block mb-5">
    <div class="container">
        <h2>Get ready for your move to Singapore!</h2>
        <p>Here are areas we think you’ll love living in!</p>
    </div>
</div>

<div class="search-block">
    <div class="container">
        <div class="search-block__filter">
            <div class="search-block__filter--left">
                <a href="{{url('/register')}}" class="btn update">Update search</a>
            </div>

            <div class="search-block__filter--right">
                <a href="#" class="btn filter">Popular with locals <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                <a href="#" class="btn filter">Families <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                <a href="#" class="btn filter">Parks <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                <a href="#" class="btn filter">Low Rent <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                <a href="#" class="btn filter">Safe <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
                <a href="#" class="btn filter">Local Eats <span><img src="{{asset('assets/img/close.svg')}}" alt=""></span></a>
            </div>
        </div>

        <div class="search-block__result landing">
            <div class="row justify-content-md-center">
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="{{url('register')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area1.png')}}') no-repeat center center; background-size: cover;">
                        <span>Downtown</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like not-used">
                                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                </span>
                                <span>Downtown</span>
                                <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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

                <div class="col-10 col-md-4 col-lg-3">
                    <a href="{{url('register')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area2.png')}}') no-repeat center center; background-size: cover;">
                        <span>Tiong Bahru</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like not-used">
                                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                </span>
                                <span>Tiong Bahru</span>
                                <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="{{url('register')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area3.png')}}') no-repeat center center; background-size: cover;">
                        <span>Kallang</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like not-used">
                                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                </span>
                                <span>Kallang</span>
                                <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="{{url('register')}}" class="search-block__item" style="background: url('{{asset('assets/img/areas/area4.png')}}') no-repeat center center; background-size: cover;">
                        <span>Newton</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like not-used">
                                    <img class="no-active" src="{{asset('assets/img/like.svg')}}" alt="">
                                    <img class="active" src="{{asset('assets/img/like_fill.svg')}}" alt="">
                                </span>
                                <span>Newton</span>
                                <span class="close"><img src="{{asset('assets/img/close_w.svg')}}" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <!-- <div class="col-10 col-md-4 col-lg-3">
                    <a href="#" class="search-block__item" style="background: url('./img/areas/area5.png') no-repeat center center; background-size: cover;">
                        <span>Orchard</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like">
                                    <img class="no-active" src="./img/like.svg" alt="">
                                    <img class="active" src="./img/like_fill.svg" alt="">
                                </span>
                                <span>Orchard</span>
                                <span class="close"><img src="./img/close_w.svg" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="#" class="search-block__item" style="background: url('./img/areas/area6.png') no-repeat center center; background-size: cover;">
                        <span>River Valley</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like">
                                    <img class="no-active" src="./img/like.svg" alt="">
                                    <img class="active" src="./img/like_fill.svg" alt="">
                                </span>
                                <span>River Valley</span>
                                <span class="close"><img src="./img/close_w.svg" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="#" class="search-block__item" style="background: url('./img/areas/area7.png') no-repeat center center; background-size: cover;">
                        <span>Tanglin</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like">
                                    <img class="no-active" src="./img/like.svg" alt="">
                                    <img class="active" src="./img/like_fill.svg" alt="">
                                </span>
                                <span>Tanglin</span>
                                <span class="close"><img src="./img/close_w.svg" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
                <div class="col-10 col-md-4 col-lg-3">
                    <a href="#" class="search-block__item" style="background: url('./img/areas/area8.png') no-repeat center center; background-size: cover;">
                        <span>Geylang</span>
                        <div class="search-block__item--hover">
                            <div class="top">
                                <span class="like">
                                    <img class="no-active" src="./img/like.svg" alt="">
                                    <img class="active" src="./img/like_fill.svg" alt="">
                                </span>
                                <span>Geylang</span>
                                <span class="close"><img src="./img/close_w.svg" alt=""></span>
                            </div>
    
                            <table class="content">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>💰</span> Average Rent
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>⌛️</span> Time to Centre
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>🛩</span> Expat Score
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>👨‍👩‍👧‍👧</span> Family Friendly
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
            </div> -->
        </div>
    </div>
</div>

<div class="title-block">
    <div class="container">
        <h2>Save money on your move with some deals we think you'll love </h2>
    </div>
</div>

<div class="offers landing">
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-6 col-lg-3">
                <a href="{{url('/register')}}" class="offers__item" style="background: url('{{asset('assets/img/offer1.png')}}') no-repeat center center; background-size: cover;">
                    <span class="offers__item--label">Movers</span>

                    <div class="offers__item--footer">
                        <div class="offers__item--logo">
                            <img src="{{asset('assets/img/crown.png')}}" alt="">
                        </div>
                        <span class="offers__item--discount">20%</span>
                    </div>
                </a>
                <span class="offers__item__info"><b>20%</b> off international relocation with <b>Movers.sg</b></span>
            </div>
            <div class="col-10 col-md-6 col-lg-3">
                <a href="{{url('/register')}}" class="offers__item" style="background: url('{{asset('assets/img/offer2.png')}}') no-repeat center center; background-size: cover;">
                    <span class="offers__item--label">Pet Relocation</span>

                    <div class="offers__item--footer">
                        <div class="offers__item--logo">
                            <img src="{{asset('assets/img/jason.png')}}" alt="">
                        </div>
                        <span class="offers__item--discount">10%</span>
                    </div>
                </a>
                <span class="offers__item__info"><b>10%</b> off pet relocation from <b>Jason’s Pet Relocation</b></span>
            </div>
            <div class="col-10 col-md-6 col-lg-3">
                <a href="{{url('/register')}}" class="offers__item" style="background: url('{{asset('assets/img/offer3.png')}}') no-repeat center center; background-size: cover;">
                    <span class="offers__item--label">Property</span>

                    <div class="offers__item--footer">
                        <div class="offers__item--logo">
                            <img src="{{asset('assets/img/property.png')}}" alt="">
                        </div>
                    </div>
                </a>
                <span class="offers__item__info">Find a place to call home and room mates with <b>Hemlet</b></span>
            </div>
            <div class="col-10 col-md-6 col-lg-3">
                <a href="{{url('/register')}}" class="offers__item" style="background: url('{{asset('assets/img/offer4.png')}}') no-repeat center center; background-size: cover;">
                    <span class="offers__item--label">Bank Account</span>

                    <div class="offers__item--footer">
                        <div class="offers__item--logo">
                            <img src="{{asset('assets/img/dbs.png')}}" alt="">
                        </div>
                    </div>
                </a>
                <span class="offers__item__info">Instant sign-up for a bank account at <b>DBS</b></span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="promo-footer">
        <span>To see additional areas, insights & get access to our preferred partners, create an account... <b>and it's free!</b></span>
        <a href="{{url('/register')}}" class="btn">Create an account</a>
    </div>
</div>

@endsection