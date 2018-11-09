
jQuery(document).ready(function($){

    if (education_zone_data.rtl == '1') {
        var rtl = true;
    } else {
        var rtl = false;
    }

    $('.testimonial-slide').owlCarousel({
        //mode: "slide",
        items:1,
        mouseDrag:false,
        dots: false,
        nav: true,
        rtl: rtl,
    });
    
    $('.number').counterUp({
        delay: 10,
        time: 1000
    });

    $('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#site-navigation',
        side: 'left'
    });
    $('#responsive-btn').sidr({
        name: 'sidr-secondary',
        source: '#secondary-navigation',
        side: 'right'
    });

    $('.photo-gallery .gallery').addClass('owl-carousel');

    $(".photo-gallery .gallery").owlCarousel({
     items: 5,
     autoplay: false,
     loop: false,
     nav: true,
     dots: false,
     rtl: false,
     autoHeight: true,
     autoHeightClass: 'owl-height',
     mouseDrag: false,
     responsive: {
        0: {
            items: 2,
        }, 
        641 : {
            items: 3,
        }, 
        768 : {
            items: 4,
        }, 
        981 : {
            items: 5,
        }
    }
});
});