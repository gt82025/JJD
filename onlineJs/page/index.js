// global var 
var mySwiper
var onePageScrollIndex



//browser on start-//////////////////////
(function($, window, document) {
    $('html').addClass('index');
    $('picture').imagesLoaded()
        .always(function(instance) {
            console.log('all images loaded');
        })
        .done(function(instance) {
            console.log('all images successfully loaded');
            imgFill();
        })
        .fail(function() {
            console.log('all images loaded, at least one is broken');
        })
        .progress(function(instance, image) {
            var result = image.isLoaded ? 'loaded' : 'broken';
            console.log('image is ' + result + ' for ' + image.img.src);
        });

    IndexSlider();

    onPageScroll();

    sectionHover();

    




})(jQuery, window, document);


//browser on loaded-/////////////////////

$(window).load(function() {

});

//other function-////////////////////////


//首頁 swiper slider 請參考 http://idangero.us/swiper/
function IndexSlider() {

    mySwiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 15000,
        },
        speed: 500,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    })


}

//首頁 One Page Scroll 1.3.1 
//請參考 https://github.com/peachananr/onepage-scroll
//請參考 https://github.com/npostulart/onepage_scroll <--功能強化

function onPageScroll() {
    

    onePageScrollIndex = $("article.mainContainer").onepage_scroll({
        sectionContainer: "section",
        easing: "ease",
        animationTime: 800,
        pagination: false,
        updateURL: false,
        loop: false,
        keyboard: true,
        responsiveFallback: false,
        afterMove: function(index) {
            if (index != 1) {
                //console.log('no1');
                $('#header').addClass('active');
            } else {
                $('#header').removeClass('active');
            }

        },
        beforeCreate: $.noop, 
        afterCreate: $.noop, 
        beforeDestroy: $.noop, 
        afterDestroy: $.noop 

    });




}

//控制首頁section按鈕動作
function sectionHover() {
    var $btnBox = $('section.section .titleBox');

    $btnBox.mouseover(function(e) {
        $(this).prev().addClass('active');
    })
    $btnBox.mouseout(function(e) {
        $(this).prev().removeClass('active');
    })

}

//首頁 slider image fill 請參考 http://idangero.us/swiper/
function imgFill() {
    // $('picture').imagefill();
}