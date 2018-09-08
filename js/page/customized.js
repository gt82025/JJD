    // global var 
    var $head = $('.mainContainer');
    var $menu = $('.mainContainer nav');






    //browser on start-//////////////////////
    (function($, window, document) {

       headChange();







    })(jQuery, window, document);


    //browser on loaded-/////////////////////

    $(window).load(function() {

    });

    //other function-////////////////////////

    function headChange(){
        if($('article.customize').length > 0){
            $('picture.white').removeClass('hide');
            $('picture.black').addClass('hide');
            $menu.addClass('white');

        }

    }



   