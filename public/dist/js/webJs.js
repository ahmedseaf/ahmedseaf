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
                $(this).removeClass('active')
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





$(document).ready(function(){
   $('.secondSlider .ads1 > img').eq(0).addClass('active');
    (function repeatAds1 (){
        $('.secondSlider .ads1 .active').each(function (){
            if(! $(this).is(':last-child')) {
                $(this).delay(5000).fadeOut(2000, function(){
                    $(this).removeClass('active').next().fadeIn(2000).addClass('active');
                    repeatAds1 ();                       
                });
                
             } else{
                 $(this).delay(5000).fadeOut(2000, function(){
                     $(this).removeClass('active')
                     $('.secondSlider .ads1 > img').eq(0).fadeIn(2000).addClass('active');
                     repeatAds1 ();
                 })
             }       
        })
    }());
   

    
}); // End Document Ready






function moveAllSliders(slider, clickNext, clickPrev, slideWidth) {
    let isDown = false;
    let startX;
    let scrollLeft;
    
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
     // const x = e.pageX  - slider.offsetLeft ;
      const x = e.pageX  ;
      const walk = (x - startX) * 3; //scroll-fast
      slider.scrollLeft = scrollLeft - walk;
     
    });
    
    clickNext.addEventListener('click', (e) => { 
        slider.scrollLeft = slider.scrollLeft + slideWidth;
    })
    clickPrev.addEventListener('click', () => { 
        slider.scrollLeft = slider.scrollLeft - slideWidth;
    })

}





let slider1 = document.querySelector('.items');
let clickPrev1 = document.getElementById('prevSlide');
let clickNext1 = document.getElementById('nextSlide');
let slideWidth1 = document.querySelector('.grid-item .items .item').offsetWidth;
moveAllSliders(slider1, clickNext1, clickPrev1, slideWidth1);




let slider2 = document.querySelector('.slideNewProductContainer .newProductContainer .newProductSlider .itemsSlider .itemSlide');
let clickPrev2 = document.getElementById('prevSlide2');
let clickNext2 = document.getElementById('nextSlide2');
let slideWidth2 = document.querySelector('.slideNewProductContainer .newProductContainer .newProductSlider .itemsSlider .itemSlide .oneNewProduct').offsetWidth;
moveAllSliders(slider2, clickNext2, clickPrev2, slideWidth2)



let slider3 = document.getElementById('itemSlide3');
let clickPrev3 = document.getElementById('prevSlide3');
let clickNext3 = document.getElementById('nextSlide3');
let slideWidth3 = document.querySelector('.slideNewProductContainer .newProductContainer .newProductSlider .itemsSlider .itemSlide .oneNewProduct').offsetWidth;
moveAllSliders(slider3, clickNext3, clickPrev3, slideWidth3)










/*

// For Slider 1
const slider = document.querySelector('.items');

const prevOne = document.getElementById('prevSlide');
const nextOne = document.getElementById('nextSlide');
const SlideWidth = document.querySelector('.grid-item .items .item').offsetWidth;







let isDown = false;
let startX;
let scrollLeft;

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
 // const x = e.pageX  - slider.offsetLeft ;
  const x = e.pageX  ;
  const walk = (x - startX) * 3; //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
 
});

nextOne.addEventListener('click', (e) => { 
    slider.scrollLeft = slider.scrollLeft + SlideWidth;
})
prevOne.addEventListener('click', () => { 
    slider.scrollLeft = slider.scrollLeft - SlideWidth;
})

*/

const fav = $('.productSlid .productLinks .linkContainer .favContainer .fav i');

fav.on('click', function (e) {
   e.preventDefault();
   $(this).toggleClass('far fas');
});
