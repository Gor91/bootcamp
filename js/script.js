$(document).ready(function () {
    $( ".banner__nav__link, .header__link" ).click(function( event ) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);
    });

    // var owl = $('.owl-carousel');
    $('.agenda__cont').owlCarousel({
        loop: true,
        margin: 25,
        nav: false,
        slideSpeed: 1000,
        paginationSpeed: 1000,
        singleItem: true,
        navigation: true,
        stagePadding: 20,
        scrollPerPage: true,
        startPosition:300,
        autoplay:true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            900: {
                items: 3
            },
            1000: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
    // owl.on('mousewheel', '.owl-stage', function (e) {
    //     if (e.deltaY > 0) {
    //         owl.trigger('next.owl');
    //     } else {
    //         owl.trigger('prev.owl');
    //     }
    //     e.preventDefault();
    // });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var bannerHegiht = $('.banner').height();
        //>=, not <=
        if (scroll >= bannerHegiht) {
            //clearHeader, not clearheader - caps H
            $(".header").addClass("header__show");
        } else {
            $(".header").removeClass("header__show");
        }
    });
});