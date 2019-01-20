    // global var 
    var mySwiper
    var onePageScrollIndex
    var $eventContent
    var $eventBtn
    var newsSlider





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
        sectionHover();
        fullPagesJs();
        eventIndex();
        eventSlider();






    })(jQuery, window, document);


    //browser on loaded-/////////////////////

    $(window).load(function() {

    });

    //other function-////////////////////////

    //首頁 fullPagesJs 請參考 https://github.com/alvarotrigo/fullPage.js/#fullpagejs
    function fullPagesJs() {

        $('#fullpage').fullpage({
            //options here
            sectionSelector: 'section',
            scrollOverflow: true,
            scrollBar: false,
            keyboardScrolling: true,
            touchSensitivity: 15,
            afterLoad: function(anchorLink, index) {
                console.log(index);
                if(index == 2){
                    $('#header').addClass('active');
                }else if(index == 1){
                    $('#header').removeClass('active');
                }


            }
        });

        //methods
        //$.fn.fullpage.setAllowScrolling(false);
        



    }

    //首頁 swiper slider 請參考 http://idangero.us/swiper/
    function IndexSlider() {

        mySwiper = new Swiper('.mainSlider', {
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



    //控制首頁section按鈕動作
    function sectionHover() {
        var $btnBox = $('section.fp-section .titleBox');

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

    //首頁 event Lightbox
    function eventIndex(){
        $('.newsContent').click(function(){
            $('.eventLightBox').addClass('active');
        })
        $('#eventClose').click(function(){
             $('.eventLightBox').removeClass('active');


        })
    }
    //首頁 event slider
    function eventSlider(){
                newsSlider = new Swiper('.swiper-news', {
            // Optional parameters
            loop: false,
            autoplay: {
                delay: 5000,
            },
            speed: 500,
            spaceBetween: 0,
             slidesPerView: 1,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination-news',
                clickable: true,
            }
        })



    }
