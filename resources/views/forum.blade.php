@extends('layout.app')
@section('content')
<section class="forum">    
    <!-- Modal -->
    <div class="modal fade" id="newTopic" tabindex="-1" role="dialog" aria-labelledby="newTopicLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="newTopicLabel">Create a topic</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Topic">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Question">
                </div>
                <div class="form-group">
                    <label for="category">Choose Categories</label>
                    <select name="" id="category" class="select2-forum" multiple="multiple">
                        <option value="">Category 1</option>
                        <option value="">Category 2</option>
                        <option value="">Category 3</option>
                        <option value="">Category 4</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Add topic</button>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-md-none">
                <!-- only mob -->
                <div class="forum__header-mob">
                    @if(Auth::check())
                    <a href="#" class="btn" data-toggle="modal" data-target="#newTopic">Create a Topic </a>
                    @else
                    <a class="register_link btn" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Create a Topic</a>
                    @endif

                    <div class="forum__sidebar--search">
                        <input type="text" class="form-control" placeholder="Search thread by keyword">
                    </div>

                    <select name="" id="forumSwitch" class="select2">
                        <option value="" data-tab="#categories">Categories</option>
                        <option value="" data-tab="#movers">Movers</option>
                        <option value="" data-tab="#arriving">Arriving</option>
                        <option value="" data-tab="#jobs">Jobs</option>
                        <option value="" data-tab="#friends">New friends</option>
                        <option value="" data-tab="#school">School</option>
                        <option value="" data-tab="#bank">Bank account</option>
                        <option value="" data-tab="#other">Other</option>
                    </select>
                </div>
                <!-- only mob end -->
            </div>
            <div class="col-md-4 col-xl-3 d-none d-md-block">
                <div class="forum__title">
                    <h2>Search</h2>
                </div>
            </div>
            <div class="col-md-8 col-xl-9">
                <div class="forum__title">
                    <h2></h2>

                    @if(Auth::check())
                    <a href="#" class="btn d-none d-md-block" data-toggle="modal" data-target="#newTopic">Create a Topic </a>
                    @else
                    <a class="register_link btn d-none d-md-block" href="#" data-toggle="modal" data-target="#signModal" data-ref="{{urlencode(Request::url())}}">Create a Topic</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">   
            <div class="col-md-4 col-xl-3 d-none d-md-block">
                <div class="forum__sidebar">
                    <div class="forum__sidebar--search">
                        <input type="text" class="form-control" placeholder="Search thread by keyword">
                    </div>

                    <ul class="nav flex-column" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="true">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="movers-tab" data-toggle="tab" href="#movers" role="tab" aria-controls="movers" aria-selected="false">Movers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="arriving-tab" data-toggle="tab" href="#arriving" role="tab" aria-controls="arriving" aria-selected="false">Arriving</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs" aria-selected="false">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">New friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="school-tab" data-toggle="tab" href="#school" role="tab" aria-controls="school" aria-selected="false">School</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false">Bank account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-xl-9">
                <div class="forum__content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                            <div class="forum__content--item">
                                <div class="forum__content--left">
                                    <div class="poster" style="background: url('{{asset('assets/img/user1.png')}}') no-repeat center center; background-size: cover;">

                                    </div>
                                    <span class="country"><img src="{{asset('assets/img/flags/ua.svg')}}" alt=""></span>
                                </div>
                                <div class="forum__content--right">
                                    <span class="title">How long does it take to get a visa once I get my job?</span>
                                    <span class="date">26 Oct 2019 04:32 pm</span>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et…</p>
                                </div>
                            </div>

                            <div class="forum__content--item">
                                <div class="forum__content--left">
                                    <div class="poster"style="background: url('{{asset('assets/img/user2.png')}}') no-repeat center center; background-size: cover;">

                                    </div>
                                    <span class="country"><img src="{{asset('assets/img/flags/us.svg')}}" alt=""></span>
                                </div>
                                <div class="forum__content--right">
                                    <span class="title">Looking for a cafe job. Any tips?</span>
                                    <span class="date">26 Oct 2019 04:32 pm</span>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et…</p>
                                </div>
                            </div>

                            <div class="forum__content--item">
                                <div class="forum__content--left">
                                    <div class="poster"style="background: url('{{asset('assets/img/user3.png')}}') no-repeat center center; background-size: cover;">

                                    </div>
                                    <span class="country"><img src="{{asset('assets/img/flags/us.svg')}}" alt=""></span>
                                </div>
                                <div class="forum__content--right">
                                    <span class="title">What's the tech scene like in Singapore?</span>
                                    <span class="date">26 Oct 2019 04:32 pm</span>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et…</p>
                                </div>
                            </div>

                            <div class="forum__content--item">
                                <div class="forum__content--left">
                                    <div class="poster"style="background: url('{{asset('assets/img/user4.png')}}') no-repeat center center; background-size: cover;">

                                    </div>
                                    <span class="country"><img src="{{asset('assets/img/flags/hr.svg')}}" alt=""></span>
                                </div>
                                <div class="forum__content--right">
                                    <span class="title">Anyone able to recommend a good recruiter? </span>
                                    <span class="date">26 Oct 2019 04:32 pm</span>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et…</p>
                                </div>
                            </div>

                            <div class="forum__content--item">
                                <div class="forum__content--left">
                                    <div class="poster"style="background: url('{{asset('assets/img/user5.png')}}') no-repeat center center; background-size: cover;">

                                    </div>
                                    <span class="country"><img src="{{asset('assets/img/flags/ua.svg')}}" alt=""></span>
                                </div>
                                <div class="forum__content--right">
                                    <span class="title">Looking for UX designers. Starting ASAP. </span>
                                    <span class="date">26 Oct 2019 04:32 pm</span>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                                        incididunt ut labore et…</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="movers" role="tabpanel" aria-labelledby="movers-tab">...</div>
                        <div class="tab-pane fade" id="arriving" role="tabpanel" aria-labelledby="arriving-tab">...</div>
                        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">...</div>
                        <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">...</div>
                        <div class="tab-pane fade" id="school" role="tabpanel" aria-labelledby="school-tab">...</div>
                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">...</div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">...</div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection