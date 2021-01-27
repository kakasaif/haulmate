function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function count_filters() {
    var count = $('.single_choice .btn.active').length + $('.multiple_choice .btn.active').length - $('.landmark__filters--block .btn.active').length;
    if ($('#live_close_input').val() !== '')
        count += 1;
    if (count) {
        $('#filters_info').html(count);
        $('.clearAll').show();
    } else {
        $('#filters_info').html(0);
        $('.clearAll').hide();
    }
}

$(document).ready(function () {
    count_filters();
    $('.single_choice .btn').on('click', function (e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
            $(this).parent('.single_choice').find('.btn').removeClass('active');
        } else {
            $(this).parent('.single_choice').find('.btn').removeClass('active');
            $(this).addClass('active');
        }
        count_filters();
    });
    $('.multiple_choice .btn').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        count_filters();
    });
    $('.landmark__filters--block .btn').on('click', function (e) {
        $('#landmark-error').hide();
    });
    $('.clearAll').on('click', function (e) {
        e.preventDefault();
        $('.btn.active').each(function () {
            $(this).removeClass('active');
        });
        $('#live_close_input').val('');
        count_filters();
    });
    $('.btn--more').on('click', function (e) {
        e.preventDefault();
        $(this).hide();
        $('.filter__content--buttons-hidden').show();
    });

    // autocomplete
    var autocomplete = '';
    $('#live_close_input').on('input', function () {
        count_filters();
        var location = $(this).val();
        if (location.length >= 3) {
            if (autocomplete !== '')
                autocomplete.abort();
            autocomplete = $.get(
                'https://developers.onemap.sg/commonapi/search?searchVal=' + encodeURI(location) + '&returnGeom=Y&getAddrDetails=Y&pageNum=1',
                function (data, status) {
                    // debugger;
                    if (data.results.length > 0) {
                        var address = data.results.map((e) => {
                            return e.ADDRESS;
                        });

                        $('.autoComplete').autocomplete({
                            source: address,
                            delay: 0
                        });
                        // $('.autoComplete').autocomplete('search', location);
                        $( ".autoComplete" ).autocomplete( "search", " " );
                    }
                }
            );
        }
    });

    $('.submitter').on('click', function (e) {
        e.preventDefault();
        if ($('#movingFrom').children("option:selected").val() === '') {
            if ($(this).data('type') === 'bottom') {
                $('html, body').animate({
                    scrollTop: $("#movingFrom").offset().top - 100
                }, 500);
            }
            $('#movingFrom').select2('open');
            return false;
        }
        if ($('#movingTo').children("option:selected").val() === '') {
            if ($(this).data('type') === 'bottom') {
                $('html, body').animate({
                    scrollTop: $("#movingTo").offset().top - 100
                }, 500);
            }
            $('#movingTo').select2('open');
            return false;
        }
        $('#services').val('');
        $('#preferences').val('');
        $('#live_close').val('');
        $('#remoteness').val('');
        $('#transport').val('');
        $('#moving_with').val('');
        $('#moving_on').val('');
        var property_types = [];
        var services = [];
        var preferences = [];
        //process multiple values fields
        $('.property_type.active').each(function (index, elem) {
            property_types.push($(this).data('id'));
        });
        $('#property_type').val(property_types.join());
        $('.service_item.active').each(function (index, elem) {
            services.push($(this).data('id'));
        });
        $('#services').val(services.join());
        $('.areas__item.active').each(function (index, elem) {
            preferences.push($(this).data('id'));
        });
        $('#preferences').val(preferences.join());
        //process single values fields
        $('#live_close').val($('#live_close_input').val());
        $('#remoteness').val('');
        $('#transport').val('');
        if ($('#live_close_input').val() !== '') {
            $('.remoteness.active').each(function (index, elem) {
                $('#remoteness').val($(this).data('value'));
            });
            $('.transport.active').each(function (index, elem) {
                $('#transport').val($(this).data('value'));
            });
            if ($('#remoteness').val() === '' || $('#transport').val() === '') {
                $('#landmark-error').show();
                $('html, body').animate({
                    scrollTop: $("#landmark-block").offset().top - 100
                }, 500);
                return false;
            }
        }
        //process single values fields
        $('.moving_with.active').each(function (index, elem) {
            $('#moving_with').val($(this).data('value'));
        });
        $('.moving_on.active').each(function (index, elem) {
            $('#moving_on').val($(this).data('value'));
        });
        $('#regStepsForm').submit();
    });
});
