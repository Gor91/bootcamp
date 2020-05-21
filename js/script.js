$(document).ready(function () {
    function scrollToAnchor(aid) {
        var aTag = $("a[name='" + aid + "']");
        $('html,body').animate({scrollTop: aTag.offset().top}, 'slow');
    }

    $(".banner__nav__link, .header__link").click(function () {
        scrollToAnchor('id3');
    });
    // var owl = $('.owl-carousel');
    $('.agenda__cont').owlCarousel({
        loop: true,
        margin: 25,
        nav: false,
        slideSpeed: 300,
        paginationSpeed: 500,
        singleItem: true,
        navigation: true,
        stagePadding: 20,
        scrollPerPage: true,
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