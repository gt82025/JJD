// global var 
var $buger
var $nav
var $navClose
var $scroll_top
var $windowHeight
var $touchEvent // 全域 偵測是否支援touchEvent
var $mobile = false // 全域 偵測是否支援touchEvent
var $loadEle = document.getElementById('pageLoading')

//imageloaded
imagesLoaded(document.querySelector('body'), { background: true }, function(instance) {
    console.log('all images are loaded');
    if ($loadEle.classList.contains('loading')) {
        $loadEle.classList.remove('loading');
        $loadEle.classList.add('finish');
        if($('article.relation').length > 0){
            scrollMagicStart();
        }
        
        setTimeout(function() {
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

   
    $mobile = mobilecheck();
    console.log($mobile);



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
        if (iOS() == true) {
            $('section.product_content .mainPicContain').addClass('ios');
        } else {
            console.log('no ios');
        }
        //console.log('chrome');
    }
    //偵測是否有touch事件
    if (Modernizr.touchevents) {
        // supported
        $touchEvent = true
        console.log('supported touchEvent');
    } else {
        // not-supported
        $touchEvent = false
        console.log('not-supported touchEvent');
    }
    


    //漢堡選單
    bugerEvent();

    //easescroll的設定
    //https://github.com/ivmello/easeScroll
    easeScroll();

    //頁面的緩出效果
    // Reference https://coderwall.com/p/aqyk7a/fade-out-page-when-clicking-links
    //pageFadOut();


    //某些頁面禁止購物車欄位修改
    NoEditcCart();









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
            if (navigator.platform === iDevices.pop()) { return true; }
        }
    }

    return false;
}
//偵測行動裝置
function mobilecheck(){
  var check = false;
  (function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

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
//某些頁面禁止購物車欄位修改
function NoEditcCart() {

    if ($('article.checkout').length > 0) {
        $('ul.cartList').addClass('hideUi');
    }

}

//頁面的緩出效果
function pageFadOut() {

    //--------------------------------------- Fade Out
    // Detecting combination keypresses (Control, Alt, Shift)?
    // https://stackoverflow.com/a/37559790
    var ctrl_isPress = false;
    document.addEventListener("keydown", function(zEvent) {
        if (zEvent.ctrlKey) {
            ctrl_isPress = true;
        } else {
            ctrl_isPress = false;
        }
    });
    // Fade out page when clicking links
    // Reference https://coderwall.com/p/aqyk7a/fade-out-page-when-clicking-links
    // 排除所有可能不是連結的部分(not...)
    $("a").not('[target="_blank"],[href*="javascript:"],[href^="#"],[href*="tel:"],[href*="mailto:"]').click(function(event) {
        if (!ctrl_isPress) {
            // 如果不是按著Ctrl時點擊連結
            event.preventDefault();

            // End Click Event(Fixed IE bug)
            if ($(this).hasClass('pointer-events-none')) {
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

    function loadingFadeIn(callback) {
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