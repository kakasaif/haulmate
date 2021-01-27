@extends('layout.app')
@section('content')

<section class="register-steps">
    <div class="container">

        <div class="tab-content" id="stepsContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">

                <h2>We’re yet to move to {{empty($country_to->country) ? 'Singapore' : $country_to->country}} ourselves</h2>

                <p>Unfortunately, we don't yet operate in {{empty($country_to->country) ? 'Singapore' : $country_to->country}} but we’re aiming to soon!<br/>
                    Please fill in the form below and we’ll let you know once we do. </p>
                <div class="message" style="display: none;">
                    <img src="{{asset('assets/img/success.png')}}" alt="">
                </div>

                <form id="regStepsForm" action="{{route('save_email_step')}}" method="POST" class="form-border">
                    @csrf
                    <input type="hidden" name="moving_from" value="{{ $country_from->id ?? 0 }}" />
                    <input type="hidden" name="moving_to" value="{{ $country_to->id ?? 0 }}" />
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <input id="moving_name" name="name" type="text" class="form-control autoComplete" placeholder="Enter your Name" autocomplete="off" value="" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input id="moving_email" name="email" type="email" class="form-control autoComplete" placeholder="Enter your Email" autocomplete="off" value="" required="">
                        </div>
                    </div>
                    <div class="row errors"></div>
                </form>

                <div>
                    <p>Thanks for your support</p>
                </div>

                <a class="btn" id="saveBtn" href="#">Keep me updated</a>
                <div class="buttons">
                    <a class="btn-skip" href="{{url()->previous()}}">Back</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<!--<script src="{{asset('assets/js/pages/register-step.js')}}"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>-->
<script>
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    $(document).ready(function () {
        $('#saveBtn').on('click', function (e) {
            e.preventDefault();
            var email = $('#moving_email').val();
            var $form = $('#regStepsForm');

            if ($('#moving_name').val() === '') {
                $('.errors').html('Name field should not be empty');
                return false;
            } else if (email === '') {
                $('.errors').html('Email field should not be empty');
                return false;
            } else if (!validateEmail(email)) {
                $('.errors').html('Incorrect Email format');
                return false;
            }


            // $('#regStepsForm').submit();

            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize()
            }).done(function () {
                console.log('success');
                $('.hide-block').hide();
                $('#regStepsForm').hide();
                $('#saveBtn').hide();
                $('.message').show();
            }).fail(function () {
                console.log('fail');
            });

            e.preventDefault();
        });
    });
</script>
@endsection
