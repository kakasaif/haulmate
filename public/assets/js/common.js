$(function () {

    // Custom JS
    //comparison table toggle
    $('.comparison__table--header').on('click', function(e){
        e.preventDefault();
        $(this).parent().toggleClass('active');
    });
    // padding on maps blade
    function customPadding() {
        let width = $(window).width();
        if (width > 1300) {
            let widthLocal = $('header .container').width();
            let padding = (width - widthLocal) / 2;
            $('.property .property__left').css('padding-right', padding);
        }
    }
    customPadding();
    $( window ).resize(function() {
        customPadding();
    });

    //sticky nav
    if ($('.scroll-container .navigation').length) {
        var stickyTop = $('.scroll-container .navigation').offset().top;
    }
   

    if ($(window).width() > 767) {
        if($('.scroll-container').length) {
            // variables
            let topPosition = $('.scroll-container .scroll-block').offset().top - 10;
            let floatingDivHeight = $('.scroll-container .scroll-block').outerHeight();
            let footerFromTop = $('footer').offset().top;
            let absPosition = footerFromTop - floatingDivHeight - 20;
            let win = $(window);
            let floatingDiv = $('.scroll-container .scroll-block');
            let widthBlock =  $('.scroll-container.scroll-bottom').width();

            win.scroll(function() {
                //fix if .scroll-container  height changes
                footerFromTop = $('footer').offset().top;
                absPosition = footerFromTop - floatingDivHeight - 20;

                if (window.matchMedia('(min-width: 768px)').matches) {
                if ((win.scrollTop() > topPosition) && (win.scrollTop() < absPosition)) {
                    floatingDiv.addClass('sticky-block').css('width', widthBlock);
                    floatingDiv.removeClass('abs-block');

                } else if ((win.scrollTop() > topPosition) && (win.scrollTop() > absPosition)) {
                    floatingDiv.removeClass('sticky-block');
                    floatingDiv.addClass('abs-block');

                } else {
                    floatingDiv.removeClass('sticky-block');
                    floatingDiv.removeClass('abs-block');
                }
                }
            });
        }
    }
    $(window).scroll(function() {
        if($('.scroll-container').length) {
            if ($(window).width() > 767)  {
                let windowTop = $(window).scrollTop();
                let widthBlock = $('.scroll-container').width();
                let customHeight = 85;
                let scrollBlockHeight = $('.scroll-bottom').height();

                if ((windowTop - scrollBlockHeight + 95) > 0) {
                    let value = windowTop - scrollBlockHeight + 95;
                    customHeight = 85 - value;
                }
                if (stickyTop < windowTop && $(".scroll-container").height() + $(".scroll-container").offset().top - $(".scroll-container .navigation").height() > windowTop) {
                    $('.scroll-container .navigation').css({
                        'position' : 'fixed',
                        'top' : '85px',
                        'width' : widthBlock
                    });
                    // $('.scroll-container .scroll-block').css({
                    //     'position' : 'fixed',
                    //     'top' : customHeight + 'px',
                    //     'width' : $('.scroll-container .scroll-block').parents('.scroll-container').width()
                    // });
                    $('.scroll-container').css('padding-top','95px');
                } else {
                    $('.scroll-container .navigation').css({
                        'position' : 'relative',
                        'top' : '0px',
                        'width' : '100%'
                    });
                    // $('.scroll-container .scroll-block').css({
                    //     'position' : 'relative',
                    //     'top' : '0px',
                    //     'width' : '100%'
                    // });
                    $('.scroll-container').css('padding-top','0px');
                }
            }
        }
    });
    
    // anchor scroll
    $('.anchor').click(function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

            let spaceFix;
            ($(this).parents('.scroll-container')) ? spaceFix = '150' : spaceFix = '-50';

            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - spaceFix
                }, 500);

                if ($(this).parents('.scroll-container')) {
                    $('.scroll-container .navigation a').removeClass('active');
                    $(this).addClass('active');
                }

                return false;
            }
            
        }
    });
    // relocations switch
    $('.relocation .filter__content--buttons a').on('click', function(e){
        e.preventDefault();
        $(this).parent().find('.btn').removeClass('active');
        $(this).toggleClass('active')
    });
    $('.responses .more').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $('.responses--hidden').show();
    });
    $('.forum__sidebar .more').on('click', function(e){
        e.preventDefault();
        $(this).hide();
        $('.forum__sidebar--hidden').show();
    });
    $('.property__switch--filter a').on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('active')
    });
    $('.emailRegister').on('click', function(e){
        e.preventDefault();
        $('.email-default').hide();
        $('.email-register').show();
    })
    $('.emailDefault').on('click', function(e){
        e.preventDefault();
        $('.email-register').hide();
        $('.email-default').show();
    })
    //tooltips
    $('.pop-tooltip').popover({
        container: 'body',
        placement: 'top',
        html: true
      })
    // next/prev scroll
    $('body').on('click', '.location-info .next', function (e) {
        e.preventDefault();
        let initialPos = $('.scroll-content').scrollLeft();
        $('.scrollbar-outer').animate({scrollLeft: initialPos + 100}, 200);
    });
    $('body').on('click', '.location-info .prev', function (e) {
        e.preventDefault();
        let initialPos = $('.scroll-content').scrollLeft();
        $('.scrollbar-outer').animate({scrollLeft: initialPos - 100}, 200);
    });
    //scrollbar
    $('.scrollbar-outer').scrollbar({
        scrollx: "advanced",
        scrolly: false
    });
    // read more on location
    $('.location-content .read-more').on('click', function (e) {
        e.preventDefault();
        $('.location-content .short').hide();
        $(this).hide();
        $('.location-content .long').show();
    });
    // read more on property
    $('.property-partner .read-more').on('click', function (e) {
        e.preventDefault();
        $('.truncated-property-about').removeClass('truncated-property-about');
        $(this).hide();
    });
    $(window).scroll(function () {
        // sticky header
        var sticky = $('header'),
            scroll = $(window).scrollTop();

        if (scroll >= 67) {
            sticky.addClass('fixed');
            $('body').addClass('fixed');
        } else {
            sticky.removeClass('fixed');
            $('body').removeClass('fixed');
        }

    });

    //scroll properties
    $('.property__left').mCustomScrollbar({
        autoHideScrollbar: false,
        autoExpandScrollbar: true,
        autoDraggerLength: true,
        theme: 'minimal-dark',
        advanced: {
            updateOnContentResize: true,
        },
        scrollButtons: {
            scrollAmount: 20,
            enable: true // enable scrolling buttons by default
        },
        axis: 'y',
        scrollInertia: 0
    });

    //select2
    $('.select2-main').select2();

    //select2 forum
    $('.select2-forum').select2({
        allowClear: true,
        multiple: true,
        maximumSelectionLength: 2
    });

    //select 2 all properties
    $('#propertyType').select2({
        allowClear: false,
        multiple: true,
        // maximumSelectionLength: 2
    });

    $('#propertyType').on('change', function (e) {
        if ($('#propertyType').find(':selected').length > 0) {
            $('.prop-item').removeClass('visible').hide();
            $('#propertyType').find(':selected').each(function(item, value) {
                $('.prop-item.type-' + $(value).val()).addClass('visible').show();
            });
        } else {
            $('.prop-item').each(function(item, value) {
                $(this).addClass('visible').show();
            });
        }
        var count = $('.prop-item.visible').length;
        if (count > 0)
            $('#prop_count').html(' (' + count + ')');
        else
            $('#prop_count').html('');
    });
    //only mobile
    if ($(window).width() < 767) {
        $('.register-steps__steps .row').slick({
            // centerMode: true,
            // centerPadding: '60px',
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });
        $('.location-info__mob--slider').slick({
            // centerMode: true,
            // centerPadding: '60px',
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });
        $('.experts-tasks__slider').slick({
            // centerMode: true,
            // centerPadding: '60px',
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1
        });

        // property page switch
        $('.property__switch--inner a').on('click', function (e) {
            e.preventDefault();
            $('.property__switch--inner a').removeClass('active');
            $(this).addClass('active');
            if ($(this).hasClass('listView')) {
                $('.property__right').hide();
                $('.property__left').show();
            } else {
                $('.property__left').hide();
                $('.property__right').show();
            }
        });
    }

    //like
    $(document).on("click", ".like", function (e) {
        if ($(this).hasClass('not-used')) {
            return;
        } else {
            e.preventDefault();
            $(this).toggleClass('fill');
            $(this).toggleClass('active');
            var fave = 0;
            if ($(this).hasClass('active'))
                fave = 1;

            var url = $('#locations_fave').val();
            var location_id = $(this).data('id');
            var csrf_token = $('meta[name=csrf-token]').attr('content');
            var data = {location_id: location_id, fave: fave, _token: csrf_token};

            var is_properties = $(this).data('properties');

            if (is_properties === true) {
                url = $('#properties_fave').val();
                var housing_id = $(this).data('id');
                if ($(this).hasClass('active'))
                    fave = 1;
                else
                    fave = 0;
                data = {housing_id: housing_id, fave: fave, _token: csrf_token};
            }

            $.ajax({
                url: url,
                data: data,
                method: 'POST',
                success: function (result) {
                }
            });
        }
    });

    //like
    $(document).on("click", ".blacklist", function (e) {
        e.preventDefault();
        var url = $('#locations_blacklist').val();
        var location_id = $(this).data('id');
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var data = {location_id: location_id, _token: csrf_token};
        var self = $(this);

        $.ajax({
            url: url,
            data: data,
            method: 'POST',
            success: function (result) {
                $(self).parents('.slick-slide').remove();
            }
        });
    });

    // add as favourite
    $(document).on("click", ".add-favourite-location", function (e) {
        e.preventDefault();

        var $favorite_icon = $(this).find('i');
        var fave;

        if ($favorite_icon.hasClass('far')) {
            $favorite_icon.removeClass('far');
            $favorite_icon.addClass('fas');
            $(this).find('span').text("Remove from favourites");
            fave = 1;
        } else {
            $favorite_icon.addClass('far');
            $favorite_icon.removeClass('fas');
            $(this).find('span').text("Add as favourite");
            fave = 0;
        }

        var url = $('#locations_fave').val();
        var location_id = $(this).data('id');
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var data = {location_id: location_id, fave: fave, _token: csrf_token};

        $.ajax({
            url: url,
            data: data,
            method: 'POST',
            success: function (result) {
                console.log(result);
            },
        });
    });

    // add as favourite
    $(document).on("click", ".add-favourite-property", function (e) {
        e.preventDefault();

        var $favorite_icon = $(this).find('i');
        var fave;

        if ($favorite_icon.hasClass('far')) {
            $favorite_icon.removeClass('far');
            $favorite_icon.addClass('fas');
            $(this).find('span').text("Remove from favourites");
            fave = 1;
        } else {
            $favorite_icon.addClass('far');
            $favorite_icon.removeClass('fas');
            $(this).find('span').text("Add as favourite");
            fave = 0;
        }

        var url = $('#properties_fave').val();
        var housing_id = $(this).data('id');
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var data = {housing_id: housing_id, fave: fave, _token: csrf_token};

        $.ajax({
            url: url,
            data: data,
            method: 'POST',
            success: function (result) {
                console.log(result);
            },
        });
    });

    //forum mobile select
    $('#forumSwitch').on('change', function (e) {
        let value = $(this).find(":selected").data("tab");
        $('#myTab a[href="' + value + '"]').tab('show');
    });

    //show/hide filter blocks
    $('.filter-block__title').on('click', function (e) {
        e.preventDefault();
        $(this).parent('.filter-block').toggleClass('show');
    });

    //show filter
    $('.show-filter').on('click', function (e) {
        e.preventDefault();
        $('.overlay').show();
        $('.filterModal').show();
    });

    //close filter
    $('.dashboard__sidebar--title .close, .overlay').on('click', function (e) {
        e.preventDefault();
        $('.overlay').hide();
        $('.filterModal').hide();
    });


    $('.storiesSlider').slick({
        // centerMode: true,
        // centerPadding: '60px',
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            // {
            //     breakpoint: 992,
            //     settings: {
            //         slidesToShow: 2,
            //         slidesToScroll: 1,
            //     }
            // },
            {
                breakpoint: 767,
                settings: {
                    arrows: false
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.dashboard__content--areas').slick({
        // centerMode: true,
        // centerPadding: '60px',
        dots: false,
        draggable: false,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    }).find('.slick-list').mCustomScrollbar({
        autoHideScrollbar: false,
        autoExpandScrollbar: true,
        autoDraggerLength: true,
        theme: 'dark-thick',
        advanced: {
            updateOnContentResize: true,
        },
        scrollButtons: {
            scrollAmount: 20,
            enable: true // enable scrolling buttons by default
        },
        axis: 'x',
        scrollInertia: 0
    });

    $('.tasks').slick({
        // centerMode: true,
        // centerPadding: '60px',
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.dashboard__content--deals').slick({
        // centerMode: true,
        // centerPadding: '60px',
        dots: false,
        draggable: false,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    }).find('.slick-list').mCustomScrollbar({
        autoHideScrollbar: false,
        autoExpandScrollbar: true,
        autoDraggerLength: true,
        theme: 'dark-thick',
        advanced: {
            updateOnContentResize: true,
        },
        scrollButtons: {
            scrollAmount: 20,
            enable: true // enable scrolling buttons by default
        },
        axis: 'x',
        scrollInertia: 0
    });

    //partner slider
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.buttonsSwitch .btn').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.buttonsSwitch').find('.btn').removeClass('active');
        $(this).addClass('active');
    });

//    $('.areas__item').on('click', function (e) {
//        e.preventDefault();
//        // $('.areas__item').toggleClass('active');
//        $(this).toggleClass('active');
//    });

    $('.blocks__item').on('click', function (e) {
        e.preventDefault();
        // $(this).removeClass('active');
        // $('.blocks__item').find('img').show();
        // $('.blocks__item').find('img.active').hide();
        if ($(this).hasClass('singleSelect')) {
            $(this).parents('.row').find('.blocks__item').removeClass('active');
            $(this).parents('.row').find('img.default').show();
            $(this).parents('.row').find('img.active').hide();

            $(this).addClass('active');
            $(this).find('img.default').hide();
            $(this).find('img.active').show();
        } else {
            $(this).toggleClass('active');
            $(this).find('img.default').toggle();
            $(this).find('img.active').toggle();
        }

    });

    //hash register steps
    function hash() {
        var hash = window.location.hash;
        if (hash) {
            $('.relocation .tab-pane').hide();
            $('.profile__content .tab-pane').hide();

            $('.profile__sidebar .nav-item a').removeClass('active');
            $('.profile__sidebar .nav-item').has('a[href*=' + '\\' + hash + ']').children().addClass('active');

            hash && $(hash).tab('show').show();

            $('html,body').scrollTop(0);
        }
    }
    hash();
    $(window).on('hashchange', function (e) {
        hash();
    });

    $('.profile__sidebar .nav-link').on('click', function (e) {
        console.log($(this).hash)
        window.location.hash = this.hash;
    })

    $('.register-steps .btnNext').on('click', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $('.register-steps .tab-pane').hide();
        $(href).tab('show').show();
        var scrollmem = $('body').scrollTop() || $('html').scrollTop();

        window.location.hash = this.hash;
        $('html,body').scrollTop(scrollmem);
        //scroll top mobile
        if ($(window).width() < 767) {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        }
    });

    $('body').on('mouseenter', '.search-block__item', function (e) {
        e.preventDefault();
        $(this).addClass('active');
    }).on('mouseleave', '.search-block__item', function () {
        $(this).removeClass('active');
    });

    $('body').on('click', '.search-block__item', function (e) {
        e.preventDefault();
        if (!e)
            var e = window.event;
        e.cancelBubble = true;
        if (e.stopPropagation)
            e.stopPropagation();
        
        var loc_id = $(this).data('id');
        var self = $(this);
        var csrf_token = $('meta[name=csrf-token]').attr('content');

        $.ajax({
            type: "POST",
            url: $("#base_url").val() + '/location/increment_views',
            data: {id: loc_id, _token: csrf_token},
            success: function (response) {
                window.location = $(self).attr('href');
            },
            error: function (error) {
                //
            }
        });

    });

    $('body').on('click', '.search-block__item .close', function (e) {
        e.preventDefault();
        if (!e)
            var e = window.event;
        e.cancelBubble = true;
        if (e.stopPropagation)
            e.stopPropagation();

        $(this).parents('.search-block__item').removeClass('active');
    });

    // logic for properties
    $('body').on('mouseenter', '.tasks__item', function (e) {
        e.preventDefault();
        $(this).addClass('active');
    }).on('mouseleave', '.tasks__item', function () {
        $(this).removeClass('active');
    });

    $('body').on('click', '.tasks__item .close', function (e) {
        e.preventDefault();
        if (!e)
            var e = window.event;
        e.cancelBubble = true;
        if (e.stopPropagation)
            e.stopPropagation();

        $(this).parents('.tasks__item').removeClass('active');
    });

    $('.register_link').on('click', function(e){
        $('#register_redirect').val($(this).data('ref'));
    });

});

function ajaxPost(url, data, callback, error_callback) {
    var csrf_token = $('meta[name=csrf-token]').attr('content');
    data['_token'] = csrf_token;
    $.ajax({
        type: "POST",
        url: $("#base_url").val() + url,
        data: data,
        success: function (response) {
            callback(response);
        },
        error: function (error) {
            error_callback(error);
        }
    });
}
