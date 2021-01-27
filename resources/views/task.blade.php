@extends('layout.app')
@section('content')

<section class="section-1-tasks">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="promo">
                    <span class="promo__text">Assign Tasks to Haulmate</span>

                    <h2>It's hard to be in two places at once. Our team is ready to start the process on the other end. </h2>

                    <p>Assign tasks to local experts so that you can start your moving journey before you move.
                         From doing a property inspection on your behalf to getting recommendations</p>

                    <div class="promo__footer">
                        <a href="#" class="btn">Assign tasks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <section class="experts">
        <div class="experts__top">
            <div class="experts__top--left">
                <h2>Meet the experts helping<br> renters just like you</h2>
                <p>When you message Haulmate you talk to actual human beings like Sophie and 
                    Wade who are here to help you with your next move.</p>
            </div>
            <div class="experts__top--right">
                <img src="{{asset('assets/img/experts.png')}}" alt="Experts">
            </div>
        </div>
        <div class="experts__bottom">
            <div class="experts__bottom--left">
                <div class="review">
                    <p>Moving overseas is a highly anxious time. Haulmate is like a personal shopper. It's brilliant.
                        I'm a fan! 😊</p>
                    <span class="review--name">Mike</span>
                </div>
            </div>
            <div class="experts__bottom--right">
                <div class="review">
                    <p>I love my new place and I appreciated Haulmate coming out to each property to help 
                        me ask all the appropriate questions.</p>
                    <span class="review--name">Laura</span>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="experts-tasks">
    <div class="container">
        <h2>In case you're<br> wondering...</h2>

        <div class="experts-tasks__slider">
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Film a property inspection</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task1.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Jason</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 24 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$100</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
            
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Do a neighborhood tour</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task2.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Mike</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 24 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$50</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
            
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Film a property inspection</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task3.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Stacy</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 3 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$75</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
            
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Select 5 properties that I may be interested in</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task4.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Nick</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 24 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$25</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
            
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Pick up furniture from IKEA</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task5.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Sandra</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 48 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$50</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
            
            <div class="experts-tasks__item">
                <div class="experts-tasks__item--task">Select 5 properties that I may be interested in</div>
                <div class="experts-tasks__item--right">
                    <div>
                        <div class="user">
                            <div class="user--poster" style="background: url('{{asset('assets/img/task6.png')}}') no-repeat center center; background-size: cover;">

                            </div>
                            <span class="user--name">Max</span>
                        </div>
                    </div>
                    <div>
                        <div class="time">
                            <span class="time--title">Will be completed within 24 hrs</span>
                        </div>
                    </div>
                    <div>
                        <div class="price">
                            <span class="price--value">$75</span>
                        </div>
                    </div>
                    <div>
                        <a href="{{url('/finance')}}" class="btn">Assign task</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection