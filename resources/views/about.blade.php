@extends('layout.app')

@section('meta_title','About Us - Haulmate')
@section('meta_description','Haulmate is simplifying how we relocate throughout the world. Learn about why Haulmate exists and get in touch with us')
@section('meta_keywords','Living in Singapore, Moving to Singapore, expats, relocation')

@section('content')

<section class="about-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>RELOCATION REIMAGINED</h2>
                <p>A simplified way to move through the world</p>

                {{-- <p>We believe that every move is different and should be treated with greater care.
                    This is why Haulmate exists - Make your move.</p> --}}
            </div>
        </div>
    </div>
</section>

<section class="about-2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 about-block order-2 order-md-1">
                <div class="about-block__inner">
                    <h2>Our Vision</h2>
                    <p>Become the world’s relocation platform.</p>
                    <p>To achieve this, we strive to inspire and empower people and partners to think with a global mindset and boldly go after new opportunities with confidence.</p>
                </div>
            </div>
            <div class="col-md-6 about-block order-1 order-md-2">
                <div class="about-block__inner image">
                    <img src="{{asset('assets/img/about1.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 about-block order-md-1">
                <div class="about-block__inner image">
                    <img src="{{asset('assets/img/about2.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-6 about-block order-md-2">
                <div class="about-block__inner">
                    <h2>Our Story</h2>
                    <p>Having moved overseas myself, most recently to Singapore, I was surprised at how fragmented the relocation experience was.</p>
                    <p> Each move was like starting again, and each time, I spent days (if not weeks) on every expat blog and website trying to imagine how best to plan for my upcoming move.
                        After speaking with hundreds of expats across the globe about their similar relocation experiences, it was clear this is a common problem that needs to be resolved - and the Haulmate team was born.
                    </p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 about-block order-2 order-md-1">
                <div class="about-block__inner">
                    <h2>Looking ahead</h2>
                    <p>Born out of a global lockdown, we are building for an evolving and new world by reimagining the end-to-end relocation experience.</p>
                    <p>We are at the start of our journey and have recently launched in Singapore with plans to expand to other major cities soon.
                        If you would like to connect, please get in touch directly via whatsapp on +6587790305</p>
                </div>
            </div>
            <div class="col-md-6 about-block order-1 order-md-2">
                <div class="about-block__inner image">
                    <img src="{{asset('assets/img/about3.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-3">
    <div class="about-3__left" style="background: url('{{asset('assets/img/about3_bg.jpg')}}') no-repeat center center; background-size: cover;">

    </div>
    <div class="about-3__right">
        <div class="about-3__right--inner">
            <h2>Have ideas? Get in Touch</h2>
            <p>We are always keen to hear your ideas about how we can improve the Haulmate experience. Please drop us a note with any burning questions or bright ideas and we'll respond within 24 hours.</p>
    
                @if(Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                 </div>
             @endif

            <form action="{{route('about')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="Enter your name...">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required placeholder="Enter your email...">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control  @error('message') is-invalid @enderror" name="message" id="message" required cols="30" rows="10" placeholder="Enter message here..."></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn" type="submit">Send</button>
            </form>
    
            <span>Alternatively, reach out to the founder directly:</span>
    
            <ul class="social">
                <li>
                    <span class="social--icon">
                        <img src="{{asset('assets/img/social_user.svg')}}" alt="">
                    </span>
                    <span class="social--value">Mike Male</span>
                </li>
                <li>
                    <span class="social--icon">
                        <img src="{{asset('assets/img/social_email.svg')}}" alt="">
                    </span>
                    <a href="mailto:mike@haulmate.co" class="social--value">mike@haulmate.co</a>
                </li>
                <li>
                    <span class="social--icon">
                        <img src="{{asset('assets/img/social_phone.svg')}}" alt="">
                    </span>
                    <a href="tel:+6587790305" class="social--value">+65 8779 0305</a>
                </li>
            </ul>
        </div>
        
    </div>
</section>

@endsection