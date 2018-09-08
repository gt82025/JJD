// global var 
var $pdPickSlider
var $quantityCtrl = 1;
var $shoppingNow
var $productMainPhoto //產品細節按鈕
var $productPhotoContainer //產品細節容器
var $productMainPhotoClose //產品細節照片按鈕
//browser on start-//////////////////////
(function($, window, document) {



    //控制產品規格下拉選單
    SelectCtrl();

    //控制產品數量按鈕
    QuantityCtrl();

    //產品照片slider
    PdPhotoSlider();

    //產品購買按鈕
    AddCart();

    //PRODUCTS PICKS 商品推薦 slider
    products_picks();









})(jQuery, window, document);


//browser on loaded-/////////////////////

$(window).load(function() {





});

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
        slidesPerView: 3,
        spaceBetween: 45,

        navigation: {
            nextEl: '.pickNext',
            prevEl: '.pickPrev'
        }

    });
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
        $('#PdSpec option').eq($selected).prop('selected', true);
        // $('#PdSpec option[value="B6"]').prop('selected', true);
        console.log($selected);



    })




}

//產品購買按鈕
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