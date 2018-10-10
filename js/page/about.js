// global var 
var $AboutSlider //About子分類的slider
var $AboutNowOpen //About設定一開始打開的分類
var $AboutPage //儲存分類區塊
var nowPageName //分類頁面名稱
var $TrackingNow //路徑的當前頁面
var $trackingName // 
var $TimeSlider //年分選擇的slider



//browser on start-//////////////////////
(function($, window, document) {


    //$AboutNowOpen = 1; About單原子內容開啟的順序
    //



})(jQuery, window, document);

//browser on scroll-//////////////////////

$(window).scroll(function(event) {



})


//browser on loaded-/////////////////////

$(window).on('load', function() {

    //About子分類的slider 運行
    AboutSliderMenu();
    //TimeLine子分類的slider 運行
    TimelineSliderMenu();
    //TimeLine子分類的選擇
    SelectYear();
    //Parse URL to get parameters
    nowPageName = getParameterByName('page');
    console.log('nowPageName=',nowPageName);
    if (nowPageName) {
        $('.AboutContent section').each(function() {
            if ($(this).attr("id") == nowPageName) {

                var goIndex = $(this).index();
                $trackingName = $(this).attr('date-name');
                ctrlAboutSub(goIndex, $trackingName);
            }
        })
    } else {
        ctrlAboutSub(0, "About iCath");
    }


});

//browser on hashchange-/////////////////////
$(window).bind('hashchange', function() {

    //Parse URL to get parameters
    nowPageName = getParameterByName('page');

    if (nowPageName) {
        $('.AboutContent section').each(function() {

            console.log(nowPageName);
            if ($(this).attr("id") == nowPageName) {
                console.log($(this).attr("id"));
                var goIndex = $(this).index();
                $trackingName = $(this).attr('date-name');
                ctrlAboutSub(goIndex, $trackingName);
                console.log($trackingName);
            }
        })
    }

});

//other function-////////////////////////

//About子分類的slider
function AboutSliderMenu() {
    //console.log('slider');

    $AboutSlider = new Swiper('.AbouTab', {
        simulateTouch: true,
        loop: false,
        slidesPerView: 4,
        spaceBetween: 0,
        navigation: {

        }
    })


}
//TimeLine的slider
function TimelineSliderMenu() {
    //console.log('slider');

    $TimeSlider = new Swiper('.TimeTab', {
        simulateTouch: true,
        loop: false,
        slidesPerView: 6,
        spaceBetween: 0,
        navigation: {

        }
    })



}

//About 子頁面開合控制 
function ctrlAboutSub($nowSelect, $PageName) {
    $AboutPage = $('.AboutContent section');
    $TrackingNow = $('p.nowLoaction');
    $AboutPage.slideUp(400);
    $AboutSlider.slideTo($nowSelect);
    $('.swiper-container.AbouTab .AboutSlider').eq($nowSelect).addClass('NowActive');
    $AboutPage.eq($nowSelect).stop().slideDown(400);
    $('.AboutSlider').removeClass('NowActive');
    $('.AboutSlider').eq($nowSelect).addClass('NowActive');
    $TrackingNow.html($PageName);
    console.log($PageName);
}


//解析URL
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


function SelectYear() {
    var $SelectYear
    var $Year
    var $historyContent

    $historyContent = $('.timeLineBox .history')
    $('.TimeSlider').click(function() {

        $SelectYear = $(this).attr("id");
        if ($SelectYear == "All") {
            $historyContent.slideDown();

        } else {
            console.log(parseInt($SelectYear.substr(1)));
            $Year = parseInt($SelectYear.substr(1));
            $historyContent.each(function(){
                var historyId = $(this).attr('id');
                var historyYear = historyId.substr(1);
                console.log(historyYear);
                if($Year == historyYear){
                    $(this).slideDown();
                }else{
                     $(this).slideUp();
                }
            })


        }



    })
    if ($SelectYear) {

    } else {
        $TimeSlider.slideTo(0);
    }




}