/*first slider*/
$('.slider-one')
.not("slick-intialized")
.slick({
    autoplay:true,
    autoplayspeed:3000,
    dots:true,
    prevArrow:".site-slider.slider-btn.prev",
    nextArrow:".site-slider.slider-btn.next"
});





$('.slider-tow')
.not("slick-intialized")
.slick({
    
    prevArrow:".site-slider.tow.prev",
    nextArrow:".site-slider.tow.next",
    slidesToShow:5,
    slidesToScroll:1,
     autoplaySpeed: 3000
});





