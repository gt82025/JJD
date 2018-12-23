// global var 
var $giftSlider
var $singleSlider
var $firstBanner
var $scrollMagic
var $windowHeight
var $GiftSelect
var $productQuantity
var $productArray = new Array();
var $productBarArray = new Array();
var $productsBar



//browser on start-//////////////////////
(function($, window, document) {


    $windowHeight = $(window).height();
    //禮品 slider
    gift();
    //單品 slider
    singleProducts();
    //easescroll的設定   參考https://github.com/ivmello/easeScroll
    smoothScroll();








})(jQuery, window, document);


//browser on loaded-/////////////////////

$(window).load(function() {

    //讀取完畢後第一cut的行為
    onLoaded();
    //scrollMagic套件 參考http://scrollmagic.io/
    scrollMagicStart();
    //文字刪減
    cutText($("[limit]"));
    //產品清單 slider
    productsBarSlider();


});

//browser on resize-/////////////////////
$(window).resize(function() {
    cutText($("[limit]"));


});

//other function-////////////////////////
function productsBarSlider() {
    $productsBar = $('.productsBar .container');

    function Quantity() {
        var q
        if ($(window).width() <= 600) {
            q = 1;
            return (q);
        } else {
            q = 2;
            return (q);

        }

    }

    $productsBar.each(function() {
        $productsSlider = new Swiper($(this), {
            slidesPerView: Quantity(),
            spaceBetween: 0,
            initialSlide: 0,
            navigation: {
                nextEl: '.BarNext',
                prevEl: '.BarPrev',
            },
        })


    })

    // if ($(window).width() <= 600) {
    //     $productQuantity = $('.product_content').length;


    //     $productsSlider = new Swiper('.productsBar', {
    //         slidesPerView: 1,
    //         spaceBetween: 0,
    //         navigation: {
    //             nextEl: '.BarNext',
    //             prevEl: '.BarPrev',
    //         },

    //     })

    // }
}
//easescroll的設定   參考https://github.com/ivmello/easeScroll
function smoothScroll() {
    $("html").easeScroll({

        frameRate: 30,
        animationTime: 700,
        stepSize: 65,
        pulseAlgorithm: 1,
        pulseScale: 6,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1,
        keyboardSupport: true,
        arrowScroll: 30,
        touchpadSupport: true,
        fixedBackground: true
    });



}
//禮品 slider  swiper slider 請參考 http://idangero.us/swiper/
function gift() {
    var GiftBoxLink = $('#giftProduct a.txtBox');

    function Quantity() {
        var q
        if ($(window).width() <= 600) {
            q = 1;
            return (q);
        } else {
            q = 3;
            return (q);

        }

    }
    $GiftSelect = 1
    $giftSlider = new Swiper('.gift', {
        slidesPerView: Quantity(),
        spaceBetween: 0,
        slidesPerGroup: 1,
        // pagination: {
        //   el: '.swiper-pagination',
        //   clickable: true,
        // },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $giftSlider.on('slideChange', function () {

        //console.log($giftSlider.activeIndex);
        var nowSelected = $giftSlider.activeIndex;
        var datalink = $(this).attr('data-link');
         $('.giftslider').removeClass('active');
         $('.giftslider').eq(nowSelected).addClass('active');
         $('.pdPicture').removeClass('active');
         $('.pdPicture').eq(nowSelected).addClass('active');
         GiftBoxLink.attr('href', datalink);


    });
    $('.giftslider').click(function() {
        //console.log($(this).index());
        var nowSelected = $(this).index();
        var datalink = $(this).attr('data-link');
        //console.log(datalink);
        $('.giftslider').removeClass('active');
        $(this).addClass('active');
        $('.pdPicture').removeClass('active');
        $('.pdPicture').eq(nowSelected).addClass('active');
        GiftBoxLink.attr('href', datalink);




    })
}
//單品 slider slider  swiper slider 請參考 http://idangero.us/swiper/
function singleProducts() {
    var $selectedNum
    var $singlePD = $('#singlePdList a');
    var $selected
    $('.productsPhoto .pdPicture').fadeOut();
    $('.productsPhoto .pdPicture').eq(0).stop().fadeIn();

    function space() {
        var s
        if ($(window).width() <= 1200) {
            s = 5;
            return (s);
        } else {
            s = 30;
            return (s);

        }

    }

    function Quantity() {
        var q
        if ($(window).width() <= 600) {
            q = 3;
            return (q);
        } else {
            q = 5;
            return (q);
        }

    }
    //console.log(Quantity());
    $singleSlider = new Swiper('.ListContainer', {
        slidesPerView: Quantity(),
        spaceBetween: space(),
        scrollbar: {
            el: '.swiper-scrollbar',
            hide: false,
        },
        navigation: {
            nextEl: '.single-next',
            prevEl: '.single-prev',
        },

    })

    $singlePD.click(function() {
        //console.log($(this).index());
        $selected = $(this).index();
        $('.productsPhoto .pdPicture').fadeOut(600);
        $('.productsPhoto .pdPicture').eq($selected).stop().fadeIn(300);
    })

}
//讀取完畢後第一cut的行為
function onLoaded() {

    $firstBanner = $('.mainBanner');
    $firstBanner.find('.bgPic').addClass('active');
    $firstBanner.find('h1').addClass('active');
    $firstBanner.find('.scrollDown').addClass('active');
}


//scrollMagic套件 參考http://scrollmagic.io/
function scrollMagicStart() {


    $scrollMagic = new ScrollMagic.Controller({ globalSceneOptions: {} });


    if ($(window).width() <= 500) {



    } else {

        var scene = new ScrollMagic.Scene({
                triggerElement: '#giftProduct',
                duration: $windowHeight * 1.2,
                tweenChanges: true,
                offset: -$windowHeight * 0.1
            }).setTween($('#giftProduct').find('.pdPictureContainer'), { y: "10%", ease: Linear.easeNone })
            .on('add', function(event) {
                TweenLite.to($('#giftProduct').find('.pdPictureContainer'), 0, { y: "-10%", ease: Linear.easeNone });
            }).addTo($scrollMagic);


    }

    var scene = new ScrollMagic.Scene({
        triggerElement: '#giftProduct',
        offset: $windowHeight * 0.25
    }).on('enter', function(event) {
        $('#giftProduct').addClass('active');
    }).on("leave", function(event) {
        $('#giftProduct').removeClass('active')
    }).addTo($scrollMagic);

    //產品Banner
    var scene = new ScrollMagic.Scene({
            triggerElement: 'section#Banner',
            duration: 10,
            offset: $windowHeight * 0.5
        })
        .on('enter', function(event) {
            $('section#Banner').removeClass('leave');
            console.log('on enter')

        }).on("leave", function(event) {
            $('section#Banner').addClass('leave');

        }).addTo($scrollMagic);


    //產品區塊SCROLL 動畫
    $('.product_content').each(function() {
        var $obj = $(this);
        var $objName = $(this).attr('id');
        if ($obj.hasClass('noList')) {
            var $offset2 = -$windowHeight * -0.2

        } else {
            var $offset2 = -$windowHeight * 0.1

        }

        //console.log($(this).find('.mainPicContain'));

        if ($(window).width() <= 500) {

            var scene = new ScrollMagic.Scene({
                triggerElement: this,
                duration: $windowHeight * 1.2,
                offset: -$windowHeight * 0.1
            }).on('enter', function(event) {

                $obj.addClass('active');
            }).on("leave", function(event) {
                $obj.removeClass('active');
            }).addTo($scrollMagic);




        } else {

            var scene = new ScrollMagic.Scene({
                    triggerElement: this,
                    duration: $windowHeight * 1.2,
                    offset: $offset2
                }).setTween($(this).find('.mainPicContain'), { y: "5%", scale: 1.05, ease: Power0.easeNone })
                .on('add', function(event) {
                    TweenLite.to($obj.find('.mainPicContain'), 0, { y: "0%", scale: 1, ease: Power0.easeNone });
                    //console.log($obj.find('.mainPicContain'));
                }).on('enter', function(event) {
                    $obj.addClass('active');
                }).on("leave", function(event) {
                    $obj.removeClass('active');
                }).addTo($scrollMagic);

        }


        var scene = new ScrollMagic.Scene({
            triggerElement: this,
            offset: $windowHeight * 0.25
        }).on('enter', function(event) {
            $obj.addClass('productsIn');
        }).on("leave", function(event) {
            $obj.removeClass('productsIn')
        }).addTo($scrollMagic);
    })





}

//截斷文字
var cutText = function(obj) {

    //console.log(obj.index($(this).parent()));


    if (typeof(OriginalTextArray) == 'undefined') {
        //OriginalText = $(this).text();
        OriginalAttributeArray = []
        OriginalTextArray = [];
        obj.each(function() {
            OriginalTextArray.push($(this).text());
            OriginalAttributeArray.push($(this).attr("limit"));
        })
    }

    //console.log(OriginalAttributeArray);
    //console.log(OriginalTextArray);
    var Text = [];

    for (var i = 0; i < OriginalTextArray.length; i++) {
        limitText = OriginalAttributeArray[i];
        var limitArray = limitText.split(" ");
        var Arraylength = limitArray.length;
        Text = OriginalTextArray[i];
        for (var s = 0; s < limitArray.length; s++) {

            var pixel = limitArray[s].match(/\d+/g);
            if ($(window).width() <= pixel[0]) {
                obj.eq(i).text(Text);
                if (pixel[1] < Text.length) {
                    obj.eq(i).text('');
                    obj.eq(i).text(Text.substring(0, pixel[1]) + "...");
                } else {

                }

            }

        }

    }
}

//偵測瀏覽器
