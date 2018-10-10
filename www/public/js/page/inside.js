// 線上工具可壓縮SVG
// 但時常會壓縮到不該壓縮的
// 要備份 + 調整
// https://jakearchibald.github.io/svgomg/
//-------------------------------------------------- Svg Load Start
//Reference: http://stackoverflow.com/a/11978996
$(function(){

	//---------------------------------------------------- 判斷browser Begin
	var ua = navigator.userAgent;
	var browser = {
		isChrome: /chrome/i.test(ua),
		isFirefox: /firefox/i.test(ua),
		isSafari: /safari/i.test(ua),

		// https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
		isIE: /msie/i.test(ua) || /trident/i.test(ua),
		isEdge: /edge/i.test(ua)
	};
	//---------------------------------------------------- 判斷browser End

	var svgArray = new Array;
	svgArray[0] = [];//紀錄URL，用來比對紀錄
	svgArray[1] = [];//紀錄svg，用來取代html;
	var svgLoadTimer=[];//紀錄svg讀取計時Loop
	$('img.svg').each(function(index,value){
		var $img = jQuery(this),
			imgID = $img.attr('id'),
			imgClass = $img.attr('class'),
			imgSrc = $img.attr('data-svg')||$img.attr('data-src')||$img.attr('src'),
			imgUrl = imgSrc.split('#')[0],
			imgSrcId = imgSrc.split('#')[1];

		//比對處理次數記錄
		var runSvgLoad = svgArray[0].some(function(value){
			return value == imgUrl;
		});

		if(!runSvgLoad){
			//如果沒有紀錄
			svgArray[0].push(imgUrl);
			runjQueryGet();
		}else{
			// 如果有紀錄
			// 等待(interval)確定有資料可以Clone
			svgLoadTimer[index] = setInterval(function(){
				var svgArrayIndex = svgArray[0].indexOf(imgUrl),
					svgOrigin = svgArray[1][svgArrayIndex];
				if(svgOrigin){
					clearInterval(svgLoadTimer[index])
					var $svg = svgOrigin.clone();
					runSvgManage($svg);
				}else{
					console.log(svgOrigin);
				}
			},500);
		}

		//使用jQuery Get
		function runjQueryGet(){
			jQuery.get(imgUrl, function(data) {

				// Get the SVG tag, ignore the rest
				var $svg = jQuery(data).find('svg');

				// Remove any invalid XML tags as per http://validator.w3.org
				$svg = $svg.removeAttr('xmlns:a');

				// svg推上Array[1]
				// svgArray[1].push($svg.clone()); //bug
				// svg大小不同loading 速度不一致
				// 因此抓index紀錄
				var svgArrayIndex = svgArray[0].indexOf(imgUrl);
				svgArray[1][svgArrayIndex] = $svg.clone();
				$svg = svgArray[1][svgArrayIndex].clone();

				//執行處理
				runSvgManage($svg);

			}, 'xml');
		}

		//處理SVG
		//1. 加ID
		//2. 加Class
		//3. 取代html
		function runSvgManage($svg){

			// Svg Style - Step1
			// 紀錄Style in svg for first has id
			var svgStyle = null;
			if(!runSvgLoad){
				// 如果沒有紀錄 = 是第一個讀入
				svgStyle = $svg.find('style').get(0);

				// IE/Edge Bug: 會無法讀取Style
				// 必須對style更動
				//@ Reference https://github.com/iconic/SVGInjector/issues/23
				//@ Reference https://github.com/kisenka/svg-sprite-loader/issues/167
				if(svgStyle){
					if (browser.isIE || browser.isEdge) {
						svgStyle.textContent += '';
					}
				}
			}
			// 記錄後刪除
			$svg.find('style').remove();

			// 處理如果有指定ID
			if(imgSrcId){
				var svgIdItem = $svg.find('#' + imgSrcId).get(0);

				//新增code
				$svg = $svg.empty();
				$svg.append(svgIdItem);
			}

			// Style - Step2
			// 對第一個恢復Style
			if(!runSvgLoad){
				$svg.append(svgStyle);
			}

			// Add replaced image's ID to the new SVG
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image's classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				var originClass = $svg.attr('class');
				originClass = (originClass) ? originClass : '';
				$svg = $svg.attr('class', originClass +' '+ imgClass+' replaced-svg');
			}

			// Replace image with new SVG
			$img.replaceWith($svg);
		}
	});
});

$(function(){
	var win = $(window),
		ww = win.innerWidth(),
		wh = win.innerHeight(),
		ws = win.scrollTop();

	var resizeWindow = function(){
		ww = win.innerWidth();
		wh = win.innerHeight();
	}

	//isMobile 判斷
	var isMobile = false;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		isMobile = true
	}
	
	//-------------------------------------------------- Banner parallax
	// $( window ).scroll(function(event) {
	// 	var scroll = $(window).scrollTop();
	// 	var banner = $( ".inside_banner" );
	// 	var scroll;

	// 	// banner.addClass("move");
	//     if (scroll >= 450) {
	//         banner.removeClass('move');
	//     }else {
	//     	banner.addClass('move');
	//     }
	// });

	//-------------------------------------------------- shows and hides filtered items
	function filterItem(){
		$(".filter-button").click(function() {
			var value = $(this).attr('data-filter');
			if(value === "all") {
				// $('.filter-item').show('1000');
				$('.filter-item').addClass('showFilter').show();
			} else {
				$(".filter-item").not('.'+value).removeClass('hideFilter').hide();
				$('.filter-item').filter('.'+value).addClass('showFilter').show();
			}
		});
		// changes active class on filter buttons
		$('.filter-button').click(function () {
			$(this).siblings().removeClass('is-active');
			$(this).addClass('is-active');
		});
	}

	function filterSelect(){
		// 針對select狀態設定
		$('.dropdown-select').change(function(){
		    var val = $(this).val();
		    // var lastThreeChars = val.substring(val.length - 3);
		    var filterItem = $('.filter-item');
		    $('.filter-item li').hide('3000');
		    // $('.filter-item li[class$="' + lastThreeChars + '"]').show('3000');
		    if(val === "all") {
				filterItem.addClass('showFilter').show();
			} else {
				filterItem.not('.'+val).removeClass('hideFilter').hide();
				filterItem.filter('.'+val).addClass('showFilter').show();
			}
		});
	}


	// 產生相對應於filter-dropdown的下拉選單
	function filterSelectDropdown(){
		// Create the dropdown base
		$("<select />",{
			"class" : "dropdown-select"
		}).appendTo("#filter-dropdown");

		// Create default option "請選擇類別"
		$("<option />", {
			
			"selected": "selected",
			"value"   : "",
			"text"    : "請選擇類別"
		}).appendTo("nav select");

		// Populate dropdown with menu items
		$("#filter-dropdown a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"data-filter" : el.attr("data-filter"),
				"value" : el.attr("data-filter"),
				"text"    : el.text(),
				"class" : "filter-button"
			}).appendTo("nav select");
		});
	}
	filterSelectDropdown();


	// 
	//-------------------------------------------------- 文字行數省略設定
	function clamp(){
		$('.clampThis').each(function(index, element) {
			$clamp(element, { clamp: 2, useNativeClamp: false });
		});
	}
	

	//-------------------------------------------------- set reload/scroll/resize
		//window on scroll use javascript
		//Reference: https://stackoverflow.com/a/10915048
		//http://dev.w3.org/2006/webapi/DOM-Level-3-Events/html/DOM3-Events.html#event-type-scroll
	function onScrollEventHandler(ev){
		ws = win.scrollTop();
	}
	function onResizeEventHandler(ev){
		filterItem();
		filterSelect();
		clamp();
		
	}
	function onLoadEventHandler(ev){
		filterItem();
		filterSelect();
		clamp();
	}
	var el=window;

	if(el.addEventListener){
		el.addEventListener('scroll', onScrollEventHandler, false);   
		el.addEventListener('resize', onResizeEventHandler, false);   
		el.addEventListener('load', onLoadEventHandler, false);   
	} else if (el.attachEvent){
		el.attachEvent('onscroll', onScrollEventHandler); 
		el.attachEvent('onresize', onScrollEventHandler); 
		el.attachEvent('load', onLoadEventHandler); 
	}

});



// -----------------------------------
// Object-fit for IE/Edge
// -----------------------------------
;(function($, window, document){

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


	// Object-fit Start--------------------------------------------------
	// 取得 & 替換 
	var objectFitForIE_getBg = function(thisItemJS){
		var src = thisItemJS.src;
		var item = $(thisItemJS);

		// 計算最大公因數/最小公倍數
		// Reference https://www.liveism.com/math-live/arithmetic/live-online-gcd-lcm-calculator.php
		function fgcd(x, y) {
			return y == 0 ? x : fgcd(y, x % y);
		}
		function countMath(A,B) {
			var GCD; // greatest common divisor 最大公因數 
			var LCM; // least common multiple 最小公倍數 
			if (A == "" || B == "" || A == "0" || B == "0" || isNaN(A) || isNaN(B)){
				// console.log("請輸入欲求最大公因數的兩個正整數！");
			}else{
				GCD = fgcd(parseInt(A), parseInt(B));
			}
			if (GCD != "0")
				LCM = (A * B) / GCD;
			else
				LCM = "無意義";
			var result = [GCD, LCM];
			return result
		}

		// 取得空PNG
		function getBase64Png(width, height){
			var resultGCD = countMath(width, height)[0];

			// Create transparent image
			var canvas = document.createElement("canvas");

			// set desired size of transparent image
			canvas.width = width / resultGCD;
			canvas.height = height / resultGCD;

			// extract as new image (data-uri)
			var url = canvas.toDataURL();	// 預設會轉成 image/png
			return url
		}

		// console.log(item.css('-o-object-fit')) // IE 無法找到object-fit
		if(!item.hasClass('ie-hack')){

			// Get image width & height
			var itemW = thisItemJS.naturalWidth;
			var itemH = thisItemJS.naturalHeight;

			// 用svg產生空的比例
			// var imgEmpty = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="'+ itemW +'" height="'+ itemH +'"><path fill="none" d="M0 0h'+ itemW +'v'+ itemH +'H0z"/></svg>'
			var imgEmpty = getBase64Png(itemW, itemH);

			// 替換成背景圖片
			item.attr('src',imgEmpty)
			item.css({
				'background-repeat' : 'no-repeat',
				'background-position' : '50% 50%',
				'background-image' : 'url(' + src + ')',
				'background-size' : 'cover',
			});
			item.addClass('ie-hack');
		}
    };
    var objectFitForIE = function(currentItem){
		if(browser.isIE){
			if(currentItem == undefined){
				$('.object-fit img').each(function(){
					objectFitForIE_getBg(this)
				});
			}else{
				objectFitForIE_getBg(currentItem);
			}
		}
	};
	objectFitForIE();

})(jQuery, window, document);




// Form Search Filter
// Used page: Cooperation & Product cooperation(partners)
// Reference: https://www.w3schools.com/howto/howto_js_filter_lists.asp
// keyboard
//	  - 選到第一個往上、最後一個往下 => 恢復填寫值
//	  - 方向鍵操縱輸入，同步輸入Input
//	  - 超過範圍要改變滾軸
//	  - keypress時也要變化
//	  - Enter鍵 => 輸入 & 搜尋
//	  - Esc鍵 => 關閉選項 *可能會有衝突
//  - No reselt時狀況
;(function($, window, document){
	var searchFilter_input = $('.search-filter-input');
	var searchFilter_list = $('.search-filter-list');
	var searchFilter_listChildrenTag = 'li'; // Lowercase 全小寫
	var searchFilter_listItem, searchFilter_listItemLength;
	
	var searchFilter_start = -1; //初始值
	var searchFilter_active = searchFilter_start;
	var activeClass = 'is--selected';
	var hideClass = 'hide';

	var searchCache = ""; // 記憶輸入的數值，用以恢復原本輸入的值

	// 重新取得 Length避免有被ajax更改
	function resetAmount(){
		searchFilter_listItem = searchFilter_list.children(searchFilter_listChildrenTag);
		searchFilter_listItemLength = searchFilter_listItem.length;
	}
	resetAmount();

	// Filter List Event
	searchFilter_list.on('click', searchFilter_listChildrenTag, function (evnet) {
		// 選擇 => 輸入文字
		searchFilter_input.val($(this).text());
		searchFilter_active = searchFilter_start;
		searchFilter();
	}).on('mouseenter', searchFilter_listChildrenTag, function (evnet) {
		var item = $(this);
		searchFilter_active = $(this).index();
		item.siblings().removeClass(activeClass);
		item.addClass(activeClass);
	}).on('mouseleave', function (evnet) {
		// Focus out
		resetFilter();
	});

	// 解決Bug：明明隱藏卻還是選的到
	// 解決方式：focusout時，延遲增加pointerEvents
	searchFilter_input.on('focus', function(){
		searchFilter_list.css('pointer-events', '');
	}).on('focusout', function(){
		setTimeout(function(){
			searchFilter_list.css('pointer-events', 'none');
			// 恢復預設值
			resetFilter();
			searchFilter();
		},500);
	});

	// 恢復預設值
	function resetFilter(){
		searchFilter_active = searchFilter_start;
		searchFilter_list.children('.' + activeClass).removeClass(activeClass);
	}

	// 取得下一個index
	function getActiveNext(currentActive, dir){
		// 重新取得 Length避免有被ajax更改
		resetAmount();

		var isDown = dir == 'down';
		var newActiveResult;
		var i = (isDown) ? currentActive + 1 : currentActive - 1 ;
		var condition = (isDown) ? i < searchFilter_listItemLength : i >= 0;
		if(!isDown && currentActive == 0){
			// 如果是第一個 && 按上的情況 => 初始值 || 
			newActiveResult = searchFilter_start;
		}else if(isDown && i == searchFilter_listItemLength){
			// 選到最後一個 && 又按下 =>　停留在最後一個
			newActiveResult = searchFilter_listItemLength - 1;
		}else{
			for(;condition;){
				var currentItem = searchFilter_listItem.eq(i);
				// console.log(i == searchFilter_listItemLength)
				if(currentItem.length){
					if(i === searchFilter_start || currentItem.css('display') != 'none'){
						// 如果是初始值 || item 是顯示的(不等於display: none)
						newActiveResult = i;
						break;
					}else{
						// 被隱藏
						if(isDown){
							i++
						}else{
							i--
						}
					}
				}else{
					// currentItem 不存在
					newActiveResult = currentActive;
					break;
				}
			} // End For Loop
		}
		return newActiveResult
	};
	// 選取 + 出現字
	function selectItem(index){
		// console.log(index)
		var currentOption = searchFilter_listItem.eq(index)

		// active不等於初始值 => 才增加Class
		searchFilter_list.children('.' + activeClass).removeClass(activeClass);
		if(index != searchFilter_start){
			currentOption.addClass(activeClass);
		}
		
		if(index <= searchFilter_start){
			// 無選擇時 => 恢復原本輸入值
			searchFilter_input.val(searchCache);
		} else{
			// 選擇時輸入值
			searchFilter_input.val(currentOption.text());
		}
		// Focus字的最後一個
		// searchFilter_input.focusCampo();
	};

	// 更改ScrollBar(keyboard)
	var searchFilter_listItemHeight = searchFilter_listItem.innerHeight();
	function filterScrollIntoView(index){
		var currentOption = searchFilter_listItem.eq(index);
		var currentOption_offsetTop = currentOption.get(0).offsetTop;

		var searchFilter_height = searchFilter_list.innerHeight();
		var searchFilter_scrollTop = searchFilter_list.scrollTop();

		// active 不等於初始值 => 捲動
		if(index != searchFilter_start){

			// 不在filterList可視範圍 => 改卷軸高
			// [IE有BUG]一定的高度位置Scolltop會跑掉
			// 			暫時先減 30以防看不到
			if(currentOption_offsetTop > searchFilter_scrollTop + searchFilter_height - 30){
				// itme位置高 > filterList的高 + filterList scrollTop（Down超過）
				searchFilter_list.scrollTop(searchFilter_scrollTop + searchFilter_listItemHeight);
				// console.log('條件一')
				
			}else if(currentOption_offsetTop < searchFilter_scrollTop){
				
				// itme位置高 < filterList的高 + filterList scrollTop（Up超過）
				searchFilter_list.scrollTop(currentOption_offsetTop)
				// console.log('條件二')

			// }else{
			// 	console.log('index', index)
			// 	console.log(' scrollTop', searchFilter_scrollTop, '\n','offsetTop',currentOption_offsetTop)
			}
		}
		
	}

	// 取得index + 執行選取動作
	function filterSelectHandler(currentActive, dir){
		searchFilter_active = getActiveNext(searchFilter_active, dir);
		selectItem(searchFilter_active);
		filterScrollIntoView(searchFilter_active);
	};

	// Search Filter
	// Reference: https://www.w3schools.com/howto/howto_js_filter_lists.asp
	function searchFilter() {
		// Declare variables
		var input, filter, ul, li, a, i;
		input = searchFilter_input.get(0);
		filter = input.value.toUpperCase();
		li = searchFilter_list.children(searchFilter_listChildrenTag);
	
		// Loop through all list items, and hide those who don't match the search query
		for (i = 0; i < li.length; i++) {
			if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
				li[i].style.display = "";
			} else {
				li[i].style.display = "none";
			}
		}
	};

	// Focus字的最後一個
	// Set Focus After Last Character in Text Box
	// Reference: https://stackoverflow.com/a/9351214
	$.fn.focusCampo = function(){
		return this.each(function(){
			var inputField = this;
			setTimeout(function(){
				if (inputField != null && inputField.value.length != 0){
					if (inputField.createTextRange){
						var FieldRange = inputField.createTextRange();
						FieldRange.moveStart('character',inputField.value.length);
						FieldRange.collapse();
						FieldRange.select();
					}else if (inputField.selectionStart || inputField.selectionStart == '0') {
						var elemLen = inputField.value.length;
						inputField.selectionStart = elemLen;
						inputField.selectionEnd = elemLen;
						inputField.focus();
					}
				}else{
					inputField.focus();
				}
			},2);
		});
	};

	// Keyborad Event
	searchFilter_input.on('keyup', function (event) {
		// Up: 38, Down: 40
		// Esc : 27
		// Backspace: 8, delet: 46
		// console.log(event.keyCode)
		var key = event.keyCode;
		var dir = (key === 38) ? 'up' : (key === 40) ? 'down' : null;
		var isStop = (searchFilter_start >= searchFilter_active && key === 38);
		
		if(key === 27){
			// Esc
			searchFilter_list.addClass(hideClass);
			// 恢復預設空值
			searchFilter_input.val(searchCache);
		}else{
			// Not Esc
			// 如果空值又按 Backspace or Delete => 不反映 : 選單恢復
			var emptyValueEvent = searchFilter_input.val() === "" && (key === 8 || key == 46);
			if(emptyValueEvent){
				// 如果空值又按 Backspace or Delete => active 恢復預設
				resetFilter();
			}else{
				// 接受不是空值的時候按下 Backspace or Delete => 選單顯示
				searchFilter_list.removeClass(hideClass);
			}

			// 紀錄輸入的文字
			if(key != 38 && key != 40){
				searchCache = searchFilter_input.val();
				searchFilter();
			}

			// 如果放開的按鍵是上
			if(key == 38){
				// Focus字的最後一個
				searchFilter_input.focusCampo();
			}
		}
	}).on('keydown', function(event){
		var key = event.keyCode;
		if(key === 38 || key === 40){
			if(searchFilter_active <= searchFilter_start && key === 38){
				// 未選 && 又按上
			}else{
				var dir = (key === 38) ? 'up' : 'down';
				// console.log(searchFilter_active)
				filterSelectHandler(searchFilter_active, dir);
			}
		}
	});

})(jQuery, window, document);
