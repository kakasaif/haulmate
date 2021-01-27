@extends('layout.app')
@section('content')

<section class="register-steps">
    <div class="container">
        <div class="tab-pane fade show active" id="step3" role="tabpanel" aria-labelledby="step3-tab">

            @include('relocation-flow.step3')

            <a class="btn stepNext" href="#step4">Next step</a>

            <div class="buttons">
                <a class="btn-skip" href="{{ route('account') }}">Back</a>
                <!--<a class="btn-skip btnNext" href="#step4">Skip</a>-->
            </div>
        </div>
        <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step4-tab">

            <img src="{{asset('assets/img/success.png')}}" alt="" class="mb-3">

            <h2 class="mb-2">Thanks for Providing your info!</h2>

            <p class="mb-5">Somebody will reach out to you very shortly to arrange a viewing</p>

            <a href="{{ route('account') }}" class="btn submitter">Let's go</a>

            <div class="buttons">
                <a class="btn-skip" href="#step3">Back</a>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    function goNextStep(href) {
        $('.register-steps .tab-pane').hide();
        $(href).tab('show').show();
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();

        window.location.hash = href;
        $('html,body').scrollTop(scrollmem);
        //scroll top mobile
        if ($(window).width() < 767) {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        }
    }

    $(document).ready(function () {
        $('.register-steps .stepNext').on('click', function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            if (href === '#step4') {
                var data = $('#leadsForm').serialize();
                $.ajax({
                    url: '{{route("property.save")}}',
                    type: 'POST',
                    data: data,
                    dataType: "JSON",
                }).done(function (response) {
                    if (response.status === 'success') {
                        goNextStep(href);
                    }
                }).fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('server not responding...');
                });
            } else {
                goNextStep(href);
            }
        });
    });
</script>
@endsection
