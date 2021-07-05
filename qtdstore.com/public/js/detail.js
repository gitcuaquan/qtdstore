$(document).ready(function() {
    $('.related-list').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })

    $('.list-thumb .item:first-child').addClass('active');
    var src_first = $('.list-thumb .item:first-child img').attr('src');
    $('.product-thumb-preview img').attr('src', src_first);

    var width = $('.list-thumb').width();
    // slide ảnh
    $('a.btn-next').click(function() {
        var next_slide = $('.list-thumb .active').next();
        if (next_slide.length != 0) {
            $('.list-thumb .active').removeClass('active');
            next_slide.addClass('active');
            var src = $('.list-thumb .active img').attr('src');
            $('.product-thumb-preview img').attr('src', src);
            // move-left
            var all_next_slide = $('.list-thumb .active').nextAll();
            var thumb_total = $('.list-thumb .item').length - 4;
            if (all_next_slide.length < thumb_total) {
                $('.list-thumb').scrollLeft(width);
                width += width;
            }
        } else {
            {
                $('.list-thumb').scrollLeft(0);
                $('.list-thumb .active').removeClass('active');
                next_slide = $('.list-thumb .item:first-child');
                next_slide.addClass('active');
                var src = $('.list-thumb .active img').attr('src');
                $('.product-thumb-preview img').attr('src', src);
                width = width;
            }
        }
        return false;
    });

    $('a.btn-prev').click(function() {
        var prev_slide = $('.list-thumb .active').prev();
        if (prev_slide.length != 0) {
            $('.list-thumb .active').removeClass('active');
            prev_slide.addClass('active');
            var src = $('.list-thumb .active img').attr('src');
            $('.product-thumb-preview img').attr('src', src);
            // move - left
            var all_prev_slide = $('.list-thumb .active').prevAll();
            var thumb_total = $('.list-thumb .item').length - 4;
            if (all_prev_slide.length <= thumb_total) {
                $('.list-thumb').scrollLeft(0);
            }
        } else {
            $('.list-thumb').scrollLeft(width);
            $('.list-thumb .active').removeClass('active');
            prev_slide = $('.list-thumb .item:last-child');
            prev_slide.addClass('active');
            var src = $('.list-thumb .active img').attr('src');
            $('.product-thumb-preview img').attr('src', src);
        }
        return false;
    });

    $('.list-thumb .item').click(function() {
        $('.list-thumb .item').removeClass('active');
        $(this).addClass('active');
        var src = $(this).children('img').attr('src');
        $('.product-thumb-preview img').attr('src', src);
    });

});