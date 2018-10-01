// global var 
var $checkOutBtn // checkout.html開始結帳按鈕
var $checkPopup // checkout.html登入 註冊 忘記密碼 popup
var $checkPopupClose // checkout.html popup的關閉按鈕 
var $forgotbtn // checkout.html popup的忘記密碼按鈕
var $registerMb //  checkout.html popup的註冊前導 內容
var $forgetPW //  checkout.html popup的忘記密碼 內容
var $loginPop //  checkout.html popup的登入內容 內容
var $cancelForget //  checkout.html popup的取消忘記密碼
var $tabLogin //  checkout.html popup的會員登入按鈕
var $tabregist //  checkout.html popup的加入會員按鈕


//browser on start-//////////////////////
(function($, window, document) {

    checkOutNow(); // checkout.html開始結帳










})(jQuery, window, document);


//browser on loaded-/////////////////////

$(window).load(function() {





});

//other function-////////////////////////


function checkOutNow() {
    if ($('article.checkout').length > 0) {
        $checkPopup = $('.Check_Register');
        $checkPopupClose = $('.popup .closeBtn ');
        $forgotbtn = $('a.forget');
        $registerMb = $('section.registerMb');
        $forgetPW = $('section.forgetPW');
        $loginPop = $('section.loginPop');
        $checkOutBtn = $('a.checkOut');
        $cancelForget = $('a.cancelForget');
        $registerMb.stop().slideUp();
        $forgetPW.stop().slideUp();
        $loginPop.stop().slideDown();
        $tabLogin = $('.tabContainer .tabL');
        $tabregist = $('.tabContainer .tabR');
        //$checkOutBtn.click(function() {
        //    $checkPopup.addClass('active');
        //})
        //$checkPopupClose.click(function() {
        //    $checkPopup.removeClass('active');
        //})
        $forgotbtn.click(function() {
            $registerMb.stop().slideUp();
            $forgetPW.stop().slideDown();
            $loginPop.stop().slideUp();
        })
        $cancelForget.click(function() {
            $registerMb.stop().slideUp();
            $forgetPW.stop().slideUp();
            $loginPop.stop().slideDown();
        });
        $tabLogin.click(function() {
            $registerMb.stop().slideUp();
            $forgetPW.stop().slideUp();
            $loginPop.stop().slideDown();
            $(this).addClass('active');
            $tabregist.removeClass('active');
        });
        $tabregist.click(function() {
            $registerMb.stop().slideDown();
            $forgetPW.stop().slideUp();
            $loginPop.stop().slideUp();
            $(this).addClass('active');
            $tabLogin.removeClass('active');
        });        
    }





}