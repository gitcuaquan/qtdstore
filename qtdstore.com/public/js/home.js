$(document).ready(function() {
    // == feaatured product =============
    $('.list-carousel').owlCarousel({
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

});