;(function($, window, document){

	var timer = null;
	var num = $('#trun-count-down');
	var countDownNum = parseInt(num.text());
	var countDownstart = countDownNum;

	var contactReveal = $('#form-success');
	contactReveal.on('open.zf.reveal', function(){
		num.text(countDownNum);
		timer = setInterval(function(){
			if(countDownNum > 0){
				countDownNum--
				num.text(countDownNum);
			}else{
				clearTimer()
				trunPageIndex()
			}
		}, 1000);
	}).on('closed.zf.reveal', function(){
		clearTimer();
		countDownNum = countDownstart;
	});

	function clearTimer(){
		clearInterval(timer);
		timer = null;
	}

	function trunPageIndex(){
		location.href = "/"
	}

})(jQuery, window, document);