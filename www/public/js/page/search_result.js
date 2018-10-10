;(function(){
	
	//--------------------------------- 搜尋 input clear Begin
	// Search clear
	var inputWrapper = $('.result-input');
	var input = inputWrapper.find('input');
	var clearBtn = inputWrapper.find('.close-button');
	var class__show = "is--show";

	// init
	if(input.val().trim() != "") clearBtn.addClass(class__show);

	input.keyup(function(event) {
		if($(this).val().trim() != ""){
			clearBtn.addClass(class__show);
		}else{
			clearBtn.removeClass(class__show);
		}
	})
	
	clearBtn.on('click', function(event) {
		clearBtn.removeClass(class__show);
		input.val('');
		input.focus();
	});
	//--------------------------------- 搜尋 input clear End
})();