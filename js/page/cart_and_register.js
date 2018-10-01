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
var $checkSingle //  checkout.html 商品確認單品品項
var $wholePrice // checkout.html 訂單總價
var $wholeAndDeliverFee // checkout.html 訂單總價 + 貨運
var $Freight = 100; // heckout.html 運費



var $PCLink // apply.html個資保護聲明按鈕。
var $closePC // apply.html個資保護聲明關閉。

var $cartbtn // 全域 購物車按紐
var $shoppingList // 全域 購物車列表容器
var $ListClosebtn // 全域 購物車列表商品關閉按鈕
var $carry_more // 全域 繼續購買難紐
var $shoppingAddress = 'shopping.html';


var $body // 全域 body標籤
var $cartSingle // 全域 購物車列表商品品項
var $totalprice //全域 購物車列表商品總價

var $tasteDetial // 味道選擇按鈕
var $contentDetial // 味道選擇內容
var $tasteClose // 味道選擇關閉
var $tasteconfirm // 味道選擇確定


//browser on start-//////////////////////
(function($, window, document) {

    checkOutNow(); // checkout.html開始結帳

    PersonalCapital(); // apply.html 個資保護聲明。

    cartEvent(); // 全站 右側購物車開闔

    SideCart(); // 全站 右側購物車按鈕UI操作行為

    caclCart(); // 全站 右側購物車金額計算

    tasteDetial(); // 全站 商品口味選擇










})(jQuery, window, document);


//browser on loaded-/////////////////////

$(window).load(function() {
    if ($('.wrapper.index').length > 0) {

    } else {
        $(document).scrollScope();
    }


});

//other function-////////////////////////

// checkout.html開始結帳
function checkOutNow() {
    if ($('.Check_Register').length > 0) {
        $checkPopup = $('.Check_Register');
        $checkPopupClose = $('.popup .closeBtn ');
        $forgotbtn = $('a.forget');
        $registerMb = $('div.registerMb');
        $forgetPW = $('div.forgetPW');
        $loginPop = $('div.loginPop');
        $checkOutBtn = $('a.checkOut.Register');
        $cancelForget = $('a.cancelForget');
        $registerMb.stop().slideUp();
        $forgetPW.stop().slideUp();
        $loginPop.stop().slideDown();
        $tabLogin = $('.tabContainer .tabL');
        $tabregist = $('.tabContainer .tabR');
        $checkSingle = $('#checkoutStart li');
        $loginbtn = $('#member_Login');
        $loginbtn.click(function() {
            $checkPopup.addClass('active');
            if ($('.wrapper.index').length > 0) {

                $.fn.fullpage.setAllowScrolling(false);



            } else {
                $body.addClass('stop-scrolling');
                $body.attr('data-scroll-scope', 'force');

                if ($touchEvent) {
                    $('body').unbind('touchmove');
                } else {
                    //console.log('notouch')
                }
            }
        })
        $checkOutBtn.click(function() {
            $checkPopup.addClass('active');
        })
        $checkPopupClose.click(function() {
            $checkPopup.removeClass('active');
            if ($('.wrapper.index').length > 0) {
                $.fn.fullpage.setAllowScrolling(true);

            } else {
                $body.removeClass('stop-scrolling');
                $body.removeAttr('data-scroll-scope');
                if ($touchEvent) {
                    $('body').bind('touchmove', function(e) { e.preventDefault() });
                }


            }
        })
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
        if ($('.stepContainer.step1').length > 0) {
            $checkSingle.each(function() {
                var $minus = $(this).find('.minus');
                var $plus = $(this).find('.plus');
                var $nowQuentityInput = $(this).find('.Quantity')
                var $nowQuentity = $(this).find('.Quantity').val();
                var $price = $(this).find('.price p').html().substring(3);
                var $setPrice = 0
                var $totalPrice = $(this).find('.check p');

                $minus.click(function() {
                    if ($nowQuentity <= 1) {


                    } else {
                        $nowQuentity--;
                        $nowQuentityInput.val($nowQuentity);
                        $setPrice = $price * $nowQuentity
                        $totalPrice.attr("data-price", $setPrice);
                        $totalPrice.text('NT$' + $setPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        //checkOuttotal();

                    }

                })
                $plus.click(function() {
                    if ($nowQuentity) {
                        $nowQuentity++;
                        $nowQuentityInput.val($nowQuentity);
                        $setPrice = $price * $nowQuentity
                        $totalPrice.attr("data-price", $setPrice);
                        $totalPrice.text('NT$' + $setPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        //console.log($nowQuentity);
                        //checkOuttotal();
                    }

                })
                //console.log('nowQuentity = ' + nowQuentity);

            })
        }
    }
    //checkOuttotal();
}
// checkout.html 計算結帳清單
function checkOuttotal() {
    if ($('#checkoutStart li').length > 0) {
        var $SingleQuantity = $checkSingle.length;
        //console.log($SingleQuantity);
        $wholePrice = 0;
        $wholeAndDeliverFee = 0;
        for (var i = 0; i < $SingleQuantity; i++) {
            var $singlePrice = $checkSingle.eq(i).find('.check p').html().substring(3);
            $wholePrice = $wholePrice + parseInt($singlePrice);

        }
        $('.order_price .wholePrice').text('NT$' + $wholePrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $wholeAndDeliverFee = $wholePrice + $Freight;
        //console.log('$wholeAndDeliverFee =' + $wholeAndDeliverFee);
        $('.order_total .wholeAddFreight').text('NT$' + $wholeAndDeliverFee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))

        //$('.totalPrice .result').text('NT$' + $totalprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


        //$wholePrice = 


    }





}

// apply.html 個資保護聲明。
function PersonalCapital() {
    if ($('.applyContainer').length > 0) {

        $PCLink = $('.PersonalCapital');
        $PCLink.click(function() {
            $('.PersonalCapitalMain').addClass('open');

        })
        $closePC = $('.mainContent .closeBtn');
        $closePC.click(function() {
            $('.PersonalCapitalMain').removeClass('open');
        })

    }



}


// 全站 右側購物車開闔
function cartEvent() {
    $shoppingList = $('article.cart');
    $cartbtn = $('.cart.pc');
    $ListClosebtn = $('.closeBtn.cart');
    $carry_more = $('.shopping_c');
    $ListBg = $('.cart .sideBar');
    $cartSingle = $('.cartList li');
    $blackGround = $('.sideLeft');
    var $recoderPage
    if ($cartSingle.length > 0) {
        $cartbtn.addClass('active');
        $cartbtn.click(function() {
            $shoppingList.removeClass('close');
            if ($('.wrapper.index').length > 0) {

                $.fn.fullpage.setAllowScrolling(false);



            } else {
                $body.addClass('stop-scrolling');
                //$body.attr('data-scroll-scope','force');

                if ($touchEvent) {
                    $('.srolllock').unbind('touchmove');
                } else {
                    //console.log('notouch')
                }
            }
        })
    } else {
        $cartbtn.removeClass('active');
        $('span.quantity').addClass('disable');



    }
    $carry_more.click(function() {

        if ($('article.checkout').length > 0 || $('.dashboardContainer').length > 0) {
            location.href = $shoppingAddress;
            //$(location).attr('href',$shoppingAddress);
            return false;
            //console.log($shoppingAddress);
        } else {
            $shoppingList.addClass('close');
            if ($('.wrapper.index').length > 0) {
                $.fn.fullpage.setAllowScrolling(true);
            } else {
                $body.removeClass('stop-scrolling');
                if ($touchEvent) {
                    $('body').bind('touchmove', function(e) { e.preventDefault() });
                }
            }

        }




    })
    $blackGround.click(function() {

        $shoppingList.addClass('close');
        if ($('.wrapper.index').length > 0) {
            $.fn.fullpage.setAllowScrolling(true);




        } else {
            $body.removeClass('stop-scrolling');
            //$body.removeAttr('data-scroll-scope');
            if ($touchEvent) {
                $('body').bind('touchmove', function(e) { e.preventDefault() });
            }


        }



    })
    $ListClosebtn.click(function() {
        $shoppingList.addClass('close');
        if ($('.wrapper.index').length > 0) {
            $.fn.fullpage.setAllowScrolling(true);





        } else {
            $body.removeClass('stop-scrolling');
            $body.removeAttr('data-scroll-scope');
            if ($touchEvent) {
                $('body').bind('touchmove', function(e) { e.preventDefault() });
            }


        }

    })

}

// 全站 右側購物車按鈕UI操作行為
function SideCart() {

    $cartSingle.each(function() {
        var $staticQuantity = $(this).find('.quantityShow p');
        var $QuantityInput = $(this).find('input.Quantity');
        var $deleteThis = $(this).find('a.delete');
        var $thisQuantity = $(this).find('input.Quantity').val();
        var $plus = $(this).find('a.plus');
        var $minus = $(this).find('a.minus');
        $staticQuantity.html($thisQuantity);
        console.log($thisQuantity);
        //增加商品數量

        $plus.click(function() {
            $thisQuantity++
            $QuantityInput.val($thisQuantity);
            $staticQuantity.html($thisQuantity);
            // 計算購物車商品總價
            caclCart();


        });
        //減少商品數量
        $minus.click(function() {
            if ($thisQuantity > 1) {
                $thisQuantity--
                $QuantityInput.val($thisQuantity);
                $staticQuantity.html($thisQuantity);
            }
            // 計算購物車商品總價
            caclCart();



        })
        //商品數量欄位變更
        $QuantityInput.change(function() {
            $thisQuantity = $QuantityInput.val();
            $staticQuantity.html($thisQuantity);
            caclCart();
        });
        //刪除商品品項
        $deleteThis.click(function() {
            if (confirm($(this).data('confirm'))) {
                var $listObj = $(this)
                $listObj.parent().animate({
                    opacity: 0,
                    height: 0,
                    padding: 0
                }, 400, function() {
                    setTimeout(function() {
                        $listObj.parent().remove();
                        cartEvent();
                        caclCart();
                    }, 1000);




                });

            }


        })







    })




}
// 全站 右側購物車金額計算
function caclCart() {
    if ($cartSingle.length > 0) {
        var $SingleQuantity = $cartSingle.length;
        $totalprice = 0;

        for (var i = 0; i < $SingleQuantity; i++) {
            var $singlePrice = $cartSingle.eq(i).find('.price').html().substring(3);
            var $singleQuantity = $cartSingle.eq(i).find('input.Quantity').val();
            $totalprice = $totalprice + ($singlePrice * $singleQuantity);
            console.log($totalprice);
        }
        $('.totalPrice .result').text('NT$' + $totalprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    } else {
        $('.totalPrice .result').text('NT$' + 0);
    }
}



// 全站 商品口味選擇
function tasteDetial() {
    if ($('.contentDetialbtn').length > 0) {
        $tasteDetial = $('.contentDetialbtn');
        $contentDetial = $('.contentDetial');
        $tasteClose = $('.detial .closeBtn');
        $tasteconfirm = $('.btnContainer .confirm');
        $tasteDetial.click(function() {
            $contentDetial.addClass('open');
            $body.addClass('stop-scrolling');
            $body.attr('data-scroll-scope', 'force');
            if ($('#tasteList.set').length > 0) {
                $TasteSingle = $('.single.taste');
                // console.log($TasteSingle);
                $TasteSingle.each(function() {
                    var $minus = $(this).find('.minus');
                    var $plus = $(this).find('.plus');
                    var $nowQuentityInput = $(this).find('.Quantity')
                    var $nowQuentity = $(this).find('.Quantity').val();

                    $minus.click(function() {
                        if ($nowQuentity < 1) {


                        } else {
                            $nowQuentity--;
                            $nowQuentityInput.val($nowQuentity);
                            calcCombin();


                        }

                    })
                    $plus.click(function() {
                        if ($nowQuentity < 4) {
                            $nowQuentity++;
                            $nowQuentityInput.val($nowQuentity);
                            calcCombin();

                        }
                    })
                })
            }
        });
        $tasteClose.click(function() {
            $contentDetial.removeClass('open');
            $body.removeClass('stop-scrolling');
            $body.removeAttr('data-scroll-scope');
        });
        $tasteconfirm.click(function() {

            if (confirm($(this).data('confirm'))) {

                $contentDetial.removeClass('open');
            };

        })
        //計算盒裝蛋糕內的總合
        function calcCombin() {
            var $tastContent = $('#tasteList li');
            var $calcfinished = [];
            var $resultcalc
            $tastContent.each(
                function() {
                    var $cakeQuantity = $(this).find('.single.taste').length;
                    var $combinTotal = 0
                    var $notice = $(this).find('.errorNotice');

                    for (var i = 0; i < $cakeQuantity; i++) {
                        var $singleQuantity = $(this).find('input.Quantity').eq(i).val();
                        $combinTotal = $combinTotal + parseInt($singleQuantity);

                    }
                    if ($combinTotal != 4) {
                        $calcfinished.push(0);
                        $notice.addClass('show');

                    } else {
                        $calcfinished.push(1);
                        $notice.removeClass('show');
                    }
                }
            )
            //console.log($calcfinished);
            $resultcalc = $calcfinished.every(function(item, index, array) {

                return item == 1
            });
            if ($resultcalc == true) {
                $tasteconfirm.removeClass('not-active');

            } else {
                $tasteconfirm.addClass('not-active');
            }

            console.log($resultcalc);

        }

    }
}