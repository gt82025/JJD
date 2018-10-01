(function($, window, document){

	// -----------------------------------
	// Setting
	// -----------------------------------
	// 判斷browser Begin
	var ua = navigator.userAgent;
	var browser = {
		isChrome: /chrome/i.test(ua),
		isFirefox: /firefox/i.test(ua),
		isSafari: /safari/i.test(ua),

		// https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
		isIE: /msie/i.test(ua) || /trident/i.test(ua),
		isEdge: /edge/i.test(ua)
	};
	// 修正數值browser
	if(browser.isChrome) browser.isSafari = false;
	if(browser.isEdge){
		browser.isChrome = false;
		browser.isSafari = false;
	}

	// Lightbox 增加歷史紀錄
	// Reference: https://stackoverflow.com/q/22909242
	function setModalHash(url, present) {
		// http://tutorialzine.com/2013/07/quick-tip-parse-urls/
		var a = $('<a>', {
			href: url
		})[0];
		var newHash = "";
		if (present === true) {
			newHash = "#dna-detail";
		}
		// Build the resulting URL
		result = a.protocol + "//" + a.hostname + ":" + a.port + a.pathname + a.search + newHash;
	
		return result;
	}

	// 檢測報表DNA詳細內容
	// Lightbox Text Change
	// Reveal item
	var revealBox = $('#dna-detail');
	var revealTitle = revealBox.find('.title');
	var revealText = revealBox.find('.text-box');

	// Change Text
	function getText(currentItem){
		var textRefer = currentItem.next('.text-refer');
		var title = textRefer.find('.title').text();
		var textBox = textRefer.find('.text-box').html();
		
		var option = {
			title: title,
			text: textBox
		}
		// console.log(textRefer)
		return option
	}
	function chageText(title, textContainer){
		// 清空
		revealTitle.text("");
		revealText.html("");
		// Add Word
		revealTitle.text(title);
		revealText.html(textContainer);
	}

	function revealChageword(currentItem, callback){
		var item = getText(currentItem);
		chageText(item.title, item.text);
		(callback && typeof(callback) === "function") && callback();
	}

	// 重設Popup 位置 => 置中
	function resetTop(){
		var wh = $(window).innerHeight();
		var vbh = revealBox.innerHeight();
		var cssTop = (wh > vbh) ? (wh - vbh) / 2 : 90;

		revealBox.css({
			top: cssTop
		});
	}



	// List item Click
	$(".dna-more").on('click', function(){
		// 設定歷史紀錄
		// IE 有 Bug 暫時不使用
		if(!browser.isIE && !browser.isEdge){
			history.pushState(null, null, setModalHash(document.URL, true));
		}
		
		var currentItem = $(this);
		// Change Word
		revealChageword(currentItem, resetTop);
	});
	
	revealBox.on('closeme.zf.reveal', function(){
	}).on('closed.zf.reveal', function(){
		// 清除歷史紀錄
		if(!browser.isIE && !browser.isEdge && !isHistoryBack){
			history.back();
		}
	});


	// 監測網址是否有改變
	// How to detect URL change in JavaScript
	// https://stackoverflow.com/a/6390389
	function hashHandler(){
		this.oldHash = window.location.hash;
		this.Check;
	
		var that = this;
		var detect = function(){
			if(that.oldHash!=window.location.hash){
				// console.log("HASH CHANGED - new has" + window.location.hash);
				that.oldHash = window.location.hash;
				if(window.location.hash == ""){
					// 沒有Hash => 關閉
					// console.log('there is not hash')
					revealBox.foundation('close');
				}
			}
		};
		this.Check = setInterval(function(){ detect() }, 100);
	}
	var hashDetection = new hashHandler();


	// 監測是否有按上一頁(History Back)
	// https://stackoverflow.com/a/14586082
	var isHistoryBack = false;
	window.onpopstate = function(event) {
		isHistoryBack = true;
		// console.log("location: " + document.location);
	}

})(jQuery, window, document);