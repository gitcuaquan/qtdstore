$(document).ready(function() {
    // ============ slider ===========
    $('.slider-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

});