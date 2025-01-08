$('.hero-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:0,
    nav:false,
    dots:true,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    items:1,
    autoHeight:true,
    dotsContainer: '#hero-dots'
})
$('.featured-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:0,
    nav:false,
    autoWidth:true,
    autoplay:true,
    margin: 20,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    items:1,
    dotsContainer: '#featured-dots',
    responsive : {
        0: {
            autoWidth:false,
            items: 1,
        },
        850: {
            autoWidth:true,
            items: 1,
        }
    }
})

$('.testimonial-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    responsive : {
        0: {
            items: 1, // Untuk perangkat kecil, seperti ponsel
        },
        480: {
            items: 1, // Ukuran layar ponsel menengah
        },
        768: {
            items: 1, // Tablet potret
        },
        1024: {
            items: 1, // Tablet lanskap atau layar kecil
        },
        1280: {
            items: 2, // Laptop atau layar sedang
        },
        1440: {
            items: 2, // Layar desktop besar
        },
        1920: {
            items: 3, // Layar ultra-wide
        }
    }
})

$('.paket-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true,
    responsive:{
        0: {
            items: 1, // Untuk perangkat kecil, seperti ponsel
        },
        480: {
            items: 1, // Ukuran layar ponsel menengah
        },
        768: {
            items: 2, // Tablet potret
        },
        1024: {
            items: 3, // Tablet lanskap atau layar kecil
        },
        1280: {
            items: 4, // Laptop atau layar sedang
        },
        1440: {
            items: 4, // Layar desktop besar
        },
        1920: {
            items: 5, // Layar ultra-wide
        }
    }
})

$('.news-show-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items: 1,
        },
        682:{
            items: 2,
        },
        820:{
            items: 3,
        },
        920:{
            items: 4,
        }
    }
})

$('.merchandise-show-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items: 2,
        },
        682:{
            items: 3,
        },
        820:{
            items: 4,
        },
        920:{
            items: 5,
        }
    }
})

$('.merchandise-reccomend-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    nav:false,
    dots:false,
    items:2,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items: 1,
        },
        682:{
            items: 2,
        },
        820:{
            items: 3,
        },
        920:{
            items: 4,
        }
    }
})

$('.testimonial-general-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:20,
    nav:false,
    dots:false,
    autoplay:true,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    items:2,
    responsive:{
        0: {
            items: 1, // Untuk perangkat kecil, seperti ponsel
        },
        480: {
            items: 1, // Ukuran layar ponsel menengah
        },
        768: {
            items: 1, // Tablet potret
        },
        1024: {
            items: 2, // Tablet lanskap atau layar kecil
        },
        1280: {
            items: 3, // Laptop atau layar sedang
        },
        1440: {
            items: 3, // Layar desktop besar
        },
        1920: {
            items: 3, // Layar ultra-wide
        }
    }
})