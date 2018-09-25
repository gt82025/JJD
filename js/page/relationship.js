    // global var 
    var $head = $('.mainContainer');
    var $menu = $('.mainContainer nav');
    var $popUpBtn = $('.openPopup');
    var $popUp = $('article.appointment');
    var $closBtn = $('.appointment .closeBtn');
    var $scrollMagic






    //browser on start-//////////////////////
    (function($, window, document) {

        headChange();
        openForm();







    })(jQuery, window, document);


    //browser on loaded-/////////////////////

    $(window).load(function() {
        $('.relation picture').addClass('active');
        

    });

    //other function-////////////////////////

    function headChange() {
        if ($('article.customize').length > 0) {
            //$('picture.white').removeClass('hide');
            //$('picture.black').addClass('hide');
            //$menu.addClass('white');

        }

    }

    function openForm() {

        $popUpBtn.click(function() {
            $popUp.toggleClass('close');


        })
        $closBtn.click(function() {
            $popUp.toggleClass('close');
        })

    }

