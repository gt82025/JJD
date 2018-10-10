    // global var 
    var $head = $('.mainContainer');
    var $menu = $('.mainContainer nav');
    var $popUpBtn = $('.openPopup');
    var $popUp = $('article.appointment');
    var $closBtn = $('.appointment .closeBtn');
    var $windowHeight = $(window).height();
    var $mainSvgComntainer = $('article.relation .about');
    //browser on start-//////////////////////
    (function($, window, document) {

        headChange();
        openForm();
        scrollSvgStart(); //卷軸下滑效果







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

    function scrollSvgStart() {

        $(window).scroll(function() {
            // Get scroll position
            var s = $(window).scrollTop();
            // scroll value and opacity
            if (s >= ($windowHeight * 0.66)) {
                blurVal = (s / 100);
                console.log($windowHeight * 0.66);
                $mainSvgComntainer.addClass('active');
                $mainSvgComntainer.removeClass('close');

            }else{

                $mainSvgComntainer.addClass('close');
                $mainSvgComntainer.removeClass('active');

            }

                

           

        });
    };