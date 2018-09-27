// global var 
var $buger
var $nav
var $navClose
var $scroll_top
var $windowHeight
var $touchEvent // 全域 偵測是否支援touchEvent
var $loadEle = document.getElementById('pageLoading')

//imageloaded
imagesLoaded( document.querySelector('body'),{ background: true }, function( instance ) {
  console.log('all images are loaded');
   if ( $loadEle.classList.contains('loading')) {
    $loadEle.classList.remove('loading');
    $loadEle.classList.add('finish');
    setTimeout(function(){
        $loadEle.classList.add('remove');

    }, 1300);

   }
 
});

//imageloaded



//browser on start-//////////////////////
(function($, window, document) {

    $buger = $('a.buger');
    $nav = $('.mainContainer nav');
    $navClose = $('nav .close');
    $windowHeight = $(window).height();
    $body = $('body');



    //偵測瀏覽器
    //https://github.com/mtskf/UserAgentChecker
    if (_uac.browser == "ie11" || _uac.browser == "ie10" || _uac.browser == "ie9" || _uac.browser == "ie8" || _uac.browser == "ie") {
        $("html").addClass('ie');
    } else if (_uac.browser == "firefox") {
        $("html").addClass('firefox');
    } else if (_uac.browser == "safari") {
        $("html").addClass('safari');
        console.log('safari');
        $('section.product_content .mainPicContain').addClass('ios');
    } else if (_uac.browser == "chrome") {
        $("html").addClass('chrome');
        if(iOS() == true){
            $('section.product_content .mainPicContain').addClass('ios');
        }else{
            console.log('no ios');
        }
        //console.log('chrome');
    }
    //偵測是否有touch事件
    if (Modernizr.touchevents) {
        // supported
        $touchEvent = true
        //console.log('supported touchEvent');
    } else {
        // not-supported
        $touchEvent = false
        //console.log('not-supported touchEvent');
    }

    //漢堡選單
    bugerEvent();

    //easescroll的設定
    //https://github.com/ivmello/easeScroll
    easeScroll();

    //頁面的緩出效果
    // Reference https://coderwall.com/p/aqyk7a/fade-out-page-when-clicking-links
    //pageFadOut();








})(jQuery, window, document);

//browser on scroll-//////////////////////

$(window).scroll(function(event) {

    scroll_top = $(window).scrollTop();

    //內頁選單行為
    MenuEvent(scroll_top);




})


//browser on loaded-/////////////////////

$(window).load(function() {

});

//other function-////////////////////////

//偵測是否是ios

function iOS() {

  var iDevices = [
    'iPad Simulator',
    'iPhone Simulator',
    'iPod Simulator',
    'iPad',
    'iPhone',
    'iPod'
  ];

  if (!!navigator.platform) {
    while (iDevices.length) {
      if (navigator.platform === iDevices.pop()){ return true; }
    }
  }

  return false;
}

//漢堡選單
function bugerEvent() {
    $buger.click(function(e) {
        $(this).addClass('active');
        $nav.removeClass('close');
    })
    $navClose.click(function(e) {
        $buger.removeClass('active');
        $nav.addClass('close');
    })
}



//內頁選單行為
function MenuEvent(scroll_top) {


    if ($('article.shopping').length > 0 || $('.stepContainer').length > 0) {
        if (scroll_top >= 60) {
            $('header#header').addClass('active');
            // $('.topBtn').addClass('open');
            //$('footer .grass').addClass('smaller');
        } else {
            $('header#header').removeClass('active');
            //$('.topBtn').removeClass('open');
            //$('footer .grass').removeClass('smaller');
        }

    } else {
        if (scroll_top >= ($windowHeight - 150)) {
            $('header#header').addClass('active');
            // $('.topBtn').addClass('open');
            //$('footer .grass').addClass('smaller');
        } else {
            $('header#header').removeClass('active');
            //$('.topBtn').removeClass('open');
            //$('footer .grass').removeClass('smaller');
        }

    }



}

//部分頁面使用 easescroll
function easeScroll() {
    if ($('article.products').length == 0 && $('.wrapper.index').length == 0) {
        console.log('smooth_scroll');
        $("html").easeScroll({
            frameRate: 60,
            animationTime: 1000,
            stepSize: 100,
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






}

//頁面的緩出效果
function pageFadOut(){

    //--------------------------------------- Fade Out
    // Detecting combination keypresses (Control, Alt, Shift)?
    // https://stackoverflow.com/a/37559790
    var ctrl_isPress = false;
    document.addEventListener ("keydown", function (zEvent) {
        if (zEvent.ctrlKey) {
            ctrl_isPress = true;
        }else{
            ctrl_isPress = false;
        }
    });
    // Fade out page when clicking links
    // Reference https://coderwall.com/p/aqyk7a/fade-out-page-when-clicking-links
    // 排除所有可能不是連結的部分(not...)
    $("a").not('[target="_blank"],[href*="javascript:"],[href^="#"],[href*="tel:"],[href*="mailto:"]').click(function(event){
        if(!ctrl_isPress){
            // 如果不是按著Ctrl時點擊連結
            event.preventDefault();

            // End Click Event(Fixed IE bug)
            if($(this).hasClass('pointer-events-none')){
                return false
            }
            
            linkLocation = this.href;
            $("body").fadeOut(1000, redirectPage);       
            loadingFadeIn(redirectPage);
        }
    });
        
    function redirectPage() {
        window.location = linkLocation;
    }

    function loadingFadeIn(callback){
        // $('.loader').css('z-index', 1000);
        // $('.loader').fadeIn(500, callback);
        // $('.logobox.loading').addClass('hide');
        // if ($(window).width() >= 640) {
        //     // Tablet + PC
        //     $('.loader .logobox').addClass('loading');
        // }
        // $('.loader .brandContainer').addClass('loading');
        // $('.decoLine#decoLine').css('z-index', 1001);
        // $('.decoLine#decoLine').addClass('loading');
    }




}