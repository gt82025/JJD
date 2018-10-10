// global var 
var $pdPickSlider
var $quantityCtrl = 1;
var $shoppingNow
var $productMainPhoto //產品細節按鈕
var $productPhotoContainer //產品細節容器
var $productMainPhotoClose //產品細節照片按鈕
var $blurMax = 50;
//browser on start-//////////////////////
(function($, window, document) {
    //圖片讀取完畢
    $('article.shopping').imagesLoaded()
        .done(function(instance) {
            $('.shopping section.main').addClass('active');
        })
        .fail(function() {
            $('.shopping section.main').addClass('active');
        })
        .progress(function(instance, image) {
            var result = image.isLoaded ? 'loaded' : 'broken';
            console.log('image is ' + result + ' for ' + image.img.src);
        });
    //控制產品規格下拉選單
    SelectCtrl();

    //控制產品數量按鈕
    QuantityCtrl();

    //產品照片slider
    PdPhotoSlider();

    //產品購買按鈕
    //AddCart();

    //PRODUCTS PICKS 商品推薦 slider
    products_picks();

    // 全站 商品口味選擇
    tasteDetial();
})(jQuery, window, document);


//browser on loaded-/////////////////////

//$(window).load(function() {

    //scrollMagicStart();






//});

//other function-////////////////////////
//產品照片slider
function PdPhotoSlider() {

    var swiper = new Swiper('.photaContainer', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $productMainPhoto = $('.detialPhoto.btnbox');
    $productPhotoContainer = $('.PhotoContent');
    $productMainPhotoClose = $('.PhotoContent .closeBtn');

    $productMainPhoto.click(function() {
        $productPhotoContainer.removeClass('close');


    })
    $productMainPhotoClose.click(function() {
        $productPhotoContainer.addClass('close');


    })





}

//PRODUCTS PICKS 商品推薦 slider
function products_picks() {
    $pdPickSlider = new Swiper('.Picks_slider', {
        slidesPerView: Quantity(),
        spaceBetween: 45,

        navigation: {
            nextEl: '.pickNext',
            prevEl: '.pickPrev'
        }

    });
}

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
//控制產品數量按鈕
function QuantityCtrl() {
    var $minusBtn = $('label.Quantity .minus');
    var $plusBtn = $('label.Quantity .plus');
    var $boxInput = $('label.Quantity input.Quantity');
    $minusBtn.click(function() {
        if ($quantityCtrl > 1) {
            $quantityCtrl--
        } else {
            $quantityCtrl = 1
        }
        $boxInput.val($quantityCtrl);
    })
    $plusBtn.click(function() {
        if ($quantityCtrl > 0) {
            $quantityCtrl++
        } else {
            $quantityCtrl = 1
        }
        $boxInput.val($quantityCtrl);
        console.log($quantityCtrl);
    })


}
//控制產品規格下拉選單
function SelectCtrl() {
    //$('.optionContainer').slideUp();
    var $option
    $option = $('#PdSpec').find('.optionContainer');
    $('#PdSpec').click(function(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        console.log('click');

        $option.slideToggle();
        //$(this).next().removeClass('hide');
        //$(this).next().addClass('show');
    })
    $(document).click(function(event) {
        if (!$(event.target).closest('#PdSpec').length) {
            $option.slideUp();
        }
    });
    var $opSelected
    var $content
    var $selected
    $NowSelected = $('#PdSpec .NowSelected');
    $opSelected = $('#PdSpec .option');
    $opSelected.click(function() {
        $content = $(this).html();
        $selected = $(this).index();
        $NowSelected.html('' + $content);
        $('#PdSpec select').selectedIndex = $selected;
        $('#PdSpec option').eq($selected).prop('selected', 'selected');
        // $('#PdSpec option[value="B6"]').prop('selected', true);
        $('input[name="size"]').attr('value',$('#PdSpec option').eq($selected).attr('value'));
        $('input[name="size_name"]').attr('value',$('#PdSpec option').eq($selected).data('name'));
    })




}

//產品購買按鈕
/*
function AddCart() {

    if ($('a.shoppingNow').length > 0) {

        $shoppingNow = $('a.shoppingNow');
        $shoppingNow.click(function() {
            $('.addCartNotic').addClass('active');
            
            var timeOut = setTimeout(function() {
                $('.addCartNotic').animate({ opacity: 0 }, 300, function() {
                    $('.addCartNotic').removeClass('active');
                    $('.addCartNotic').attr('style', '');
                    timeOut = null

                });
            }, 1000)


        })

    }



}
*/
function scrollMagicStart() {

    $(window).scroll(function() {
        // Get scroll position
        var s = $(window).scrollTop();
            // scroll value and opacity
            if($(window).width() >= 600){
                blurVal = (s / 100);
            }else{
                blurVal = 0;
            }
            
        // opacity value 0% to 100%
        $('article.shopping .main').css('filter', 'blur(' + blurVal + 'px)');
        $('article.shopping .main').css('transition-property', 'unset');
        $('article.shopping .main').css('transition-duration', '0s');
    });
};

// 全站 商品口味選擇
function tasteDetial() {
    if ($('.contentDetialbtn').length > 0) {
     
        $tasteDetial = $('.contentDetialbtn');
        $contentDetial = $('.contentDetial');
        $tasteClose = $('.detial .closeBtn');
        $tasteconfirm = $('.btnContainer .confirm');
        $tasteDetial.click(function() {
            console.log($('input[name="quantity"]').val());
            $qty = $('input[name="quantity"]').val();
            $size_id = $('input[name="size"]').val();
            $('#tasteList').html('');
            $.ajax({
				url: '../api/product/inside',
				type: "get",
				dataType: "json",
				success: function(data){
					var $html = '';
                    for (let $i = 0; $i < $qty; $i++) {
                        let $number = $i+1;
                        $html += '<li>';
                        $html += '<div class="head">';
                        $html +=        '<p>盒'+$number+'口味</p>';
                        $html +=        '<p class="errorNotice show">*單一盒內蛋糕總數不論口味一定需剛好3個</p>';
                        $html +=    '</div>';
                        $html +=    '<div class="tastContent">';

                        for (let $k = 0; $k < data.length; $k++) {
                            $html +=        '<div class="single taste">';
                            $html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$k].cover+'" alt="'+data[$k].name+'">';
                            $html +=            '<label class="quantity_main">';
                            $html +=                '<a href="javascript:;" class="minus"></a>';
                            $html +=                '<input type="number" value="0" class="Quantity" data-id="'+data[$k].id+'" name="inside'+$k+'"> <a href="javascript:;" class="plus"></a>';
                            $html +=            '</label>';
                            $html +=        '</div>';
                        }
                        $html +=    '</div>';
                        $html +='</li>';
                    }
                    $('#tasteList').html($html);

                    $contentDetial.addClass('open');
                    $body.addClass('stop-scrolling');
                    if ($('#tasteList.set').length > 0) {
                        $TasteSingle = $('.single.taste');
                        //console.log($TasteSingle);
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
					console.log(data);

				},complete:function(){
					//console.log(o);
				},error:function(e){
					
					console.log(o);
				}
			});
        });
        $tasteClose.click(function() {
            $contentDetial.removeClass('open');
            $body.removeClass('stop-scrolling');
        });
        $tasteconfirm.click(function() {

            if (confirm($(this).data('confirm'))) {
                var o = {};
                var results = [];
                var form = $('#inside').get(0);
                for(var i=0;i<form.length;i++){
                    var f = form.elements[i];

                    if(f.value == '') continue;
                    if(i%4 == 0){
                        var o = {};
                        results.push(o);
                    };

                    o[f.name] = {'id': $(f).data('id'), 'qty': f.value} ;
                    
                };
                $contentDetial.removeClass('open');
                o = {};
                o['quantity'] = $('input[name="quantity"]').val();
                o['size'] = $('input[name="size"]').val();
                o['size_name'] = $('input[name="size_name"]').val();
                o['name'] = $('input[name="name"]').val();
                o['category_name'] = $('input[name="category_name"]').val();
                o['content_detail'] = results;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                    }
                })
                $.ajax({
                    url: '../api/cart/addToCart',
                    type: "POST",
                    dataType: "json",
                    data: o,
                    success: function(data){
                        
                        $('.addCartNotic').addClass('active');
                        $html = '<p>';
                        $html += '<span class="series">'+o.name+'</span>';
                        $html += '<span class="pdName">'+o.category_name+'</span>';
                        $html += '<span class="size">尺寸 : <span class="val">'+o.size_name+'</span></span>';
                        $html += '<span class="quantity">數量 : <span class="val">'+o.quantity+'</span></span>';
                        $html += '<br>已加入購物車</p>';	
                        
                        $('.addCartNotic').html($html);
                        var timeOut = setTimeout(function() {
                            $('.addCartNotic').animate({ opacity: 0 }, 300, function() {
                                $('.addCartNotic').removeClass('active');
                                $('.addCartNotic').attr('style', '');
                                timeOut = null
                            });
                            $('.cart.pc,.cart.mobile').find('.quantity').html(data.count);
                            location.reload();
                        }, 1000)
                        
                        console.log(data);
                        
                    },complete:function(){
                        //console.log(o);
                    },error:function(e){
                        toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
                        console.log(o);
                    }
                });




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
                    if ($combinTotal != 3) {
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