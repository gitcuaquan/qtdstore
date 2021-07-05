$(document).ready(function() {
    // back to top & fixed-menu
    $(window).scroll(function() {
        var pos_scroll = $(window).scrollTop();
        if (pos_scroll > 350) {
            $('.back-to-top').show(150);
        } else {
            $('.back-to-top').hide(150);
        }
    });

    $('.back-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800)
    });

    // fixed-menu
    $(window).scroll(function() {
        var pos_scroll = $(window).scrollTop();
        if (pos_scroll > 109) {
            $('#wp-content').css('margin-top', '47px');
            $('nav').addClass('fixed-menu');
        } else {
            $('#wp-content').css('margin-top', '0');
            $('nav').removeClass('fixed-menu');
        }
        // bỏ fixed menu
        var width = $(window).width();
        if (width <= 768) {
            $('nav').removeClass('fixed-menu');
        }
    });

    // cart
    $('.cart-icon').click(function() {
        $('.cart').stop().slideToggle(300);
    });


    $('a.plus').click(function() {
        $(this).toggleClass('rotate');
        $('ul.res-sub-menu').stop().slideToggle(300);
        return false;
    });

    $('html').on('click', function(event) {
        var target = $(event.target);
        var site = $('#site');

        if (target.is('.menu-bar-icon')) {
            if (!site.hasClass('move')) {
                site.addClass('move');
            } else {
                site.removeClass('move');
            }
        } else {
            $('#wrapper').click(function() {
                if (site.hasClass('move')) {
                    site.removeClass('move');
                    return false;
                }
            });
        }
    });

    $('.like').click(function() {
        if ($('.cart-like-notify').hasClass('fade-out')) {
            $('.cart-like-notify').removeClass('fade-out');
        }
        return false;
    });

    $('.icon-x').click(function() {
        if (!$('.cart-notify').hasClass('fade-out')) {
            $('.cart-notify').addClass('fade-out');
        }
        if (!$('.cart-like-notify').hasClass('fade-out')) {
            $('.cart-like-notify').addClass('fade-out');
        }
    });

    $('ul.res-menu li .menu-item').click(function() {
        $(this).toggleClass('click');
    });

    $('.res-sub-menu a').click(function() {
        $(this).toggleClass('click');
    });

});