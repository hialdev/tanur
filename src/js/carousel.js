$('.hero-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    items:1,
})

$('.testimonial-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items: 1,
        },
        682:{
            items: 1,
        },
        820:{
            items: 2,
        }
    }
})

$('.testimonial-general-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    items:2,
    responsive:{
        0:{
            items: 1,
        },
        682:{
            items: 1,
        },
        820:{
            items: 2,
        }
    }
})