// global var 
var $TechSlider
var $TechItem
var $techMainContent
var $techMainContentClose
var $TechContentSlider 
//browser on start-//////////////////////
(function($, window, document) {



})(jQuery, window, document);

//browser on scroll-//////////////////////

$(window).scroll(function(event) {


})


//browser on loaded-/////////////////////

$(window).on('load', function() {


    //Technology 類別選單
    TecSliderMenu();

    //Technology 細節內容選單
    TechnologyDetial();


});

//other function-////////////////////////

//Technology 類別選單

function TecSliderMenu() {
    console.log('slider');

    $TechSlider = new Swiper('.Tech', {
        simulateTouch: true,
        loop: false,
        slidesPerView: 3,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
    $('.TechSlider').click(function() {
        //console.log($TechSlider.clickedIndex);
        $('.TechSlider').removeClass('NowActive');
        $(this).addClass('NowActive');



    })


}

//Technology 內容slider
function TechnologyDetial(){
    $techMainContent = $('.techMainContent');
    $techMainContentClose = $('.techMainContent .close');
    $TechContentSlider = new Swiper('.techDetialSlider', {
        simulateTouch: true,
        loop: false,
        slidesPerView: 1,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next.sliderR',
            prevEl: '.swiper-button-prev.sliderL',
          },
        pagination: {
            el: '.swiper-pagination.tech',
            clickable: true
          }
    })
    $TechItem = $('.techContent .techItem');
    $TechItem.each(function(){
        var $coverBtn = $(this).find('a.btn');
        $coverBtn.click(function(){
            //console.log('$coverBtn');
            $techMainContent.addClass('open');
        })
        $techMainContentClose.click(function(){
            $techMainContent.removeClass('open');


        });





    }) 
    





}