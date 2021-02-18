require([
            'jquery',
            'slick'
        ], function ($) {
    jQuery(document).ready(function () {
        jQuery(".carousel").slick({
                                      swipe: false,
                                      infinite: true,
                                      slidesToShow: 3,
                                      slidesToScroll: 1
                                  });
    });
});