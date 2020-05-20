$(document).ready(function () {
    function scrollToAnchor(aid){
        var aTag = $("a[name='"+ aid +"']");
        $('html,body').animate({scrollTop: aTag.offset().top},'slow');
    }

    $(".banner__nav__link").click(function() {
        scrollToAnchor('id3');
    });
    // var owl = $('.owl-carousel');
    $('.agenda__cont').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        slideSpeed: 300,
        paginationSpeed: 500,
        singleItem: true,
        navigation: true,
        scrollPerPage: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
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
});