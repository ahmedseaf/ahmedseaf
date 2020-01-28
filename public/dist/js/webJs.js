// Start Mega Menu

const triggers      = document.querySelectorAll('.navbarContainer .navContainer .navMenu .navMega .ulMenu > li');
const background    = document.querySelector('.navbarContainer .navContainer .dropdownBackground');
const nav           = document.querySelector('.navbarContainer .navContainer');


function handleEnter() {
    this.classList.add('trigger-enter');
    setTimeout(() => this.classList.contains('trigger-enter') && this.classList.add('trigger-enter-active'), 150);
   
    background.classList.add('open');

    const dropDown              = this.querySelector('.navbarContainer .navContainer .navMenu .navMega .dropdown');
    const dropdownGetPosition   = dropDown.getBoundingClientRect();
    const navGetPosition        = nav.getBoundingClientRect();

    const getPosition = {
        height: dropdownGetPosition.height,
        width:  dropdownGetPosition.width,
        top:    dropdownGetPosition.top - navGetPosition.top,
        left:   dropdownGetPosition.left - navGetPosition.left,
    };

    background.style.setProperty('width', `${getPosition.width}px`);
    background.style.setProperty('height', `${getPosition.height}px`);
    background.style.setProperty('transform', `translate(${getPosition.left}px , ${getPosition.top}px)`);

}



function handleLeave() {

    this.classList.remove('trigger-enter', 'trigger-enter-active');
    background.classList.remove('open');
 
}


triggers.forEach(trigger => trigger.addEventListener('mouseenter', handleEnter));
triggers.forEach(trigger => trigger.addEventListener('mouseleave', handleLeave));

// End Navbar








// For Main Slider

$(document).ready(function () {
    $('.mainSliderContainer .sliders .slide > img').eq(0).addClass('active');
    
    setInterval(() => {
        $('.mainSliderContainer .sliders .slide .active').each(function () {
            if(! $(this).is(':last-child')) {
                 $(this).removeClass('active').next().addClass('active');
            } else {
                 $(this).removeClass('active');
                 $('.mainSliderContainer .sliders .slide > img').eq(0).addClass('active');
            }
        })
    }, 5000);

    $('.mainSliderController .nextSlide').on('click', function(e){
        e.preventDefault();
        if(! $('.mainSliderContainer .sliders .slide .active').is(':last-child')) {
             $('.mainSliderContainer .sliders .slide .active').removeClass('active').next().addClass('active');
        } else {
             $('.mainSliderContainer .sliders .slide .active').removeClass('active')
             $('.mainSliderContainer .sliders .slide > img').eq(0).addClass('active');
        }
    });

    $('.mainSliderController .prevSlide').on('click', function(e) {
        e.preventDefault();
        if(! $('.mainSliderContainer .sliders .slide .active').is(':first-child')) {
            $('.mainSliderContainer .sliders .slide .active').removeClass('active').prev().addClass('active');
        } else {
            $('.mainSliderContainer .sliders .slide .active').removeClass('active')
                     $('.mainSliderContainer .sliders .slide > img').eq(-1).addClass('active');
        }
    });
});




// For Main Slider

$(document).ready(function () {
    $('.container .slideContainer .slide > img').eq(0).addClass('active');

    setInterval(() => {
        $('.container .slideContainer .slide .active').each(function () {
            if(! $(this).is(':last-child')) {
                $(this).removeClass('active').next().addClass('active');
            } else {
                $(this).removeClass('active');
                $('.container .slideContainer .slide > img').eq(0).addClass('active');
            }
        })
    }, 5000);

    $('.container .slideContainer .moveControl .nextSlide').on('click', function(e){
        e.preventDefault();
        if(! $('.container .slideContainer .slide .active').is(':last-child')) {
            $('.container .slideContainer .slide .active').removeClass('active').next().addClass('active');
        } else {
            $('.container .slideContainer .slide .active').removeClass('active')
            $('.container .slideContainer .slide > img').eq(0).addClass('active');
        }
    });

    $('.container .slideContainer .moveControl .prevSlide').on('click', function(e) {
        e.preventDefault();
        if(! $('.container .slideContainer .slide .active').is(':first-child')) {
            $('.container .slideContainer .slide .active').removeClass('active').prev().addClass('active');
        } else {
            $('.container .slideContainer .slide .active').removeClass('active')
            $('.container .slideContainer .slide > img').eq(-1).addClass('active');
        }
    });
});


$(document).ready(function(){
    $('.container .slideContainer .repeatSlide > img').eq(0).addClass('active');
    (function repeatAds2 (){
        $('.container .slideContainer .repeatSlide .active').each(function (){
            if(! $(this).is(':last-child')) {
                $(this).delay(5000).fadeOut(2000, function(){
                    $(this).removeClass('active').next().fadeIn(2000).addClass('active');
                    repeatAds2 ();
                });

            } else{
                $(this).delay(5000).fadeOut(2000, function(){
                    $(this).removeClass('active');
                    $('.container .slideContainer .repeatSlide > img').eq(0).fadeIn(2000).addClass('active');
                    repeatAds2 ();
                })
            }
        })
    }());



}); // End Document Ready





function moveAllSliders(slider, clickNext, clickPrev, slideWidth, timeMoveSlide) {
    let isDown = false;
    let startX;
    let scrollLeft;
     slideWidth = 0;

    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      slider.classList.add('active');
     // startX = e.pageX - slider.offsetLeft ;
      startX = e.pageX ;
      scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
      isDown = false;
      slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
      isDown = false;
      slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {  
      if(!isDown) return;
      e.preventDefault();
      const x = e.pageX  ;
      const walk = (x - startX) * 3; //scroll-fast
      slider.scrollLeft = scrollLeft - walk;
     
    });
    
    clickNext.addEventListener('click', (e) => { 
        slider.scrollLeft = slider.scrollLeft + slideWidth;
    });
    clickPrev.addEventListener('click', () => { 
        slider.scrollLeft = slider.scrollLeft - slideWidth;
    });

    setInterval(() => {
        slider.scrollLeft = slider.scrollLeft + slideWidth;
    }, timeMoveSlide);

}


let slider4 = document.querySelector('.container .productSliders .products');
let clickPrev4 = document.querySelector('.container .productSliders .moveControl .prevSlide');
let clickNext4 = document.querySelector('.container .productSliders .moveControl .nextSlide');
let slideWidth4 = document.querySelector('.container .productSliders .products .product');
if(slideWidth4 != null) {
    slideWidth4 = slideWidth4.offsetWidth;
moveAllSliders(slider4, clickNext4, clickPrev4, slideWidth4 , 66000);
}

let slider5 = document.querySelector('.container .productSliders .products2');
let clickPrev5 = document.getElementById('prevSlide2');
let clickNext5 = document.getElementById('nextSlide2');
let slideWidth5 = document.querySelector('.container .productSliders .products2 .product2');
if(slideWidth5 != null) {
    slideWidth5 = slideWidth5.offsetWidth;
    moveAllSliders(slider5, clickNext5, clickPrev5, slideWidth5, 66000);
}

let slider6 = document.getElementById('products3');
let clickPrev6 = document.getElementById('prevSlide3');
let clickNext6 = document.getElementById('nextSlide3');
let slideWidth6 = document.getElementById('product3');
if(slideWidth6 != null) {
    slideWidth6 = slideWidth6.offsetWidth;
    moveAllSliders(slider6, clickNext6, clickPrev6, slideWidth6, 4000);
}

let slider7 = document.getElementById('products4');
let clickPrev7 = document.getElementById('prevSlide4');
let clickNext7 = document.getElementById('nextSlide4');
let slideWidth7 = document.getElementById('product4');
if(slideWidth7 != null) {
    slideWidth7 = slideWidth7.offsetWidth;
    moveAllSliders(slider7, clickNext7, clickPrev7, slideWidth7, 7000);
}

let slider8 = document.getElementById('products5');
let clickPrev8 = document.getElementById('prevSlide5');
let clickNext8 = document.getElementById('nextSlide5');
let slideWidth8 = document.getElementById('product5');
if(slideWidth8 != null) {
    slideWidth8 = slideWidth8.offsetWidth;
    moveAllSliders(slider8, clickNext8, clickPrev8, slideWidth8, 6000);
}


// const fav = $('.productSlid .productLinks .linkContainer .favContainer .fav i');
//
// fav.on('click', function (e) {
//    e.preventDefault();
//    $(this).toggleClass('far fas');
// });








// For Product Page


let imageGallery = $('.productView .productImage .imageContainer .items > img');
imageGallery.on('click', function () {
    imageGallery.removeClass('selected');
    $(this).addClass('selected');

    $('.productView .productImage .imageContainer .itemActive > img').hide().attr('src', $(this).attr('src')).fadeIn(400);
});