    // global var 
    var $orderTracking = $('.orderTracking');
    var $InfoContent = $('.Info_content');
    var $tabLeft = $('a.memberInfo');
    var $tabRight = $('a.ordertracking');





    //browser on start-//////////////////////
    (function($, window, document) {
        //會員中心tab控制
    	dashboard();


    	//會員中心訂單開合控制
    	wholeOrder();






    })(jQuery, window, document);


    //browser on loaded-/////////////////////

    $(window).load(function() {

    });

    //other function-////////////////////////


    //會員中心tab控制
    function dashboard(){
    	$orderTracking.slideUp(0);
    	$tabLeft.click(function(){
    		$(this).addClass('active');
    		$tabRight.removeClass('active');
    		$orderTracking.slideUp(400);
    		$InfoContent.slideDown(350);
    	})

    	$tabRight.click(function(){
    		$(this).addClass('active');
    		$tabLeft.removeClass('active');
    		$orderTracking.slideDown(350);
    		$InfoContent.slideUp(400);
    	})
    }

    function wholeOrder(){
    	




    }


   