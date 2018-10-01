var common = function(){
	var urllink = location.toString();
	var caseType = urllink.substring(urllink.lastIndexOf('\/')+1, urllink.lastIndexOf('.'));
	var len = urllink.lastIndexOf('#') == -1 ? urllink.length : urllink.lastIndexOf('#');
	if(urllink.lastIndexOf('\/') == urllink.length-1) caseType = '';
	var searchFiled = 'search.php',Easing = 'easeInOutQuart',EasingB = 'easeInOutBack',obj = {};
	var hasChanged = true;
	$(document).ready(function(){

		$('body').fadeIn(600,Easing);
		
	});
	var isHover = false;
	return{
		init: function(){
            common.categoryHover();
            /*switch(caseType){
				case 'index': case '':

					
				break;
            };*/
        },
        clickBlock : function(b){
			if($('html').hasClass("lock")){
				$('html').removeClass('lock');
				
				$(b).removeClass('active').text('點我螢幕鎖定');
			}else{
				$('html').addClass('lock');
				$(b).addClass('active').text('點我螢幕解鎖');
			}
			
		},
		
		openBanner4 : function(){
			$('.banner4').slideToggle();
		},
		//選單換圖
        categoryHover : function(){
            $('.list-unstyled>li>a').hover(function(){
                //console.log($(this).attr('data-src'));
                $('.menu-image-holder').attr('src',$(this).attr('data-src'));
            });
        },

		clicktest : function(){
			alert('here!!!')
		},

		checkVal : function(b){
			var form = (b.tagName.toLowerCase() == 'form') ? b : $(b).parents('form').get(0);
			if(!this.verifyField(form)) return false;
			var o = this.getFormsData(form);
			
		},

		fadeCloud : function(){

			var cloud = '<div class="cloud"><img src="assets/images/c'+randomInteger(1, 3)+'.png" alt=""></div>';
				$('.banner').append(cloud);
				$('.cloud').animate({'left':400,'top':randomInteger(0, 100),'opacity':0},randomInteger(8000, 10000),function(){
					$(this).remove();
					
				});
		},

		openContent : function(b){
			$(b).find('.content-tag').slideToggle(600,Easing);
			$(b).siblings('section').find('.content-tag').slideUp(600,Easing);
		},
		
		openNav : function(b,t){
			$(t).stop().animate({right:0},600,Easing);
		},

		closeNav : function(b,t){
			$(t).stop().animate({right:"-100%"},600,Easing);
		},

		aniBg : function(){
			var $item = $('img'),
			i=0,
			Otimer = setInterval(function(){
			if(i < $item.length){
				//$item.eq(i).fadeOut(400,Easing);i=i+1;
				//$item.eq(i).animate({'opacity':1},800,Easing);
				$item.eq(i).fadeIn(800,Easing);
				i=i+1;
			};
			},300);
		},
		
		pdBanner : function(){
			$(window).bind('load resize',function(){
				var target = $('.collection'),
					block = target.find('.side_nav'),
					p1 = block.find('h3').outerHeight(),
					p2 = block.find('nav').outerHeight(),
					p3 = block.find('.about').outerHeight(),
					p4 = block.find('.banner').find('img').outerHeight(),
					outerHeight = target.find('section').outerHeight(),
					outerHeight = outerHeight * 4 + target.find('section').find('img').height(),
					contact = outerHeight - 99 - p2 - p3,
					paddingTop = contact*0.2;
				block.find('.banner').height(contact).css({'paddingTop':paddingTop});
				block.find('.banner').find('img').height(contact*0.6);
			});
			

		},

		scrollFadein : function(){

		    /* Every time the window is scrolled ... */
		    $(window).bind('scroll load',function(){
		    	 $('.work').find('>img').each( function(i){
		            
		            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
		            var bottom_of_window = $(window).scrollTop() + $(window).height() + 400;
		            
		            /* If the object is completely visible in the window, fade it it */
		            if( bottom_of_window > bottom_of_object ){
		                
		                $(this).animate({'opacity':'1'},800,Easing);
		                    
		            }
		            
		        }); 

		    });
    
		},

		googleMap : function(x,y){
			
			function initialize(){
				var mapOptions = {zoom: 14,center: new google.maps.LatLng(x,y),mapTypeId: google.maps.MapTypeId.ROADMAP};
				var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
				var image = 'images/maplogo.png',myLatLng = new google.maps.LatLng(x,y);
				var beachMarker = new google.maps.Marker({position: myLatLng,map: map,icon: image});
			};google.maps.event.addDomListener(window, 'load', initialize);       
		},
		
		
		prettyPhoto : function(id,val){
			$.fn.prettyPhoto(); 
		},
		
		gotoTag : function(id,val){
			if(val == undefined) val = 0;
			var id = (id)?$(id).offset().top:0,str = id - val;
			$('html, body').animate({scrollTop: str}, 800,Easing);
		},

		openSelect : function(b,t){
			if($('#'+t) && $('#'+t).get(0).style.display == 'block') return;
			if(this.buttom == b) return;
			this.indexSelect = t;
			this.buttom = b;
			this.expandSelect(b,t);
		},
		
		expandSelect : function(b,t){
			var list = $('#'+this.indexSelect);
			$('#'+t).slideToggle();
			
			$(document).bind('mousedown', common.isCloseSelect);
			//$('#'+t).bind('mouseleave', common.isCloseSelect);
		},
		
		isCloseSelect : function(){
			common.closeSelect();
		},
		
		closeSelect : function(){
			$(document).unbind();
			var list = $('#'+this.indexSelect);
			list.delay(300).slideToggle(function(){
				//$('#sub_navs').slideToggle();

			});

			this.buttom = null;
		},
		
		no_submit_btn: function(form){
			if(event.keyCode == 13 && document.activeElement.tagName.toLowerCase() != 'textarea') $(form).find('[rel=submit]').trigger('click');
		},
		
		verifyField : function(target){
			var inputs = (typeof(target) == 'string' ? $('#'+target) : $(target)).find('[rel*="*"]');
			for(var i=0;i<inputs.length;i++){
				var v = inputs.get(i).value;
				var t = inputs.get(i).title == '' ? '此欄位' : inputs.get(i).title;
				 switch(inputs.get(i).name){

					case 'eMail':
						var mail_format = /^(\w+)([\-+.\'][\w]+)*@(\w[\-\w]*\.){1,5}([A-Za-z]){2,6}$/;
						if(!mail_format.test(v)) return this.errorStatus(inputs[i], 'Email格式有誤'); 
						break;
				}
				
				if(inputs.get(i).value == '') return this.errorStatus(inputs.get(i), t+'不得為空!!');

			}
			return true;
		},
	
		errorStatus : function(f, text){
			alert(text);
			if(f) f.focus();
			return false;
		},

		tablePost : function(params, method){
			if ($.hasChanged() && hasChanged){
				bootbox.dialog({
				title: "確定離開當前頁面?",
				message: "當前頁面尚未儲存",
				buttons: {
				cancel: {
				      label: "取消",
				      className: "btn btn-default",
				      callback: function(result) {
				        
				      }
				    },
				    confirm: {
				      label: "確認!",
				      className: "btn green",
				      callback: function(result) {

				      	method = method || "post"; // Set method to post by default if not specified.

					    // The rest of this code assumes you are not using a library.
					    // It can be made less wordy if you use one.
					    var form = document.createElement("form");
					    form.setAttribute("method", method);
					    form.setAttribute("action", '/ADA');
					    params = params?params:[];
					    params['_token'] = $('input[name="_token"]').attr('value');
					    
					    for(var key in params) {
					        if(params.hasOwnProperty(key)) {
					            var hiddenField = document.createElement("input");
					            hiddenField.setAttribute("type", "hidden");
					            hiddenField.setAttribute("name", key);
					            hiddenField.setAttribute("value", params[key]);

					            form.appendChild(hiddenField);
					         }
					    }

					    document.body.appendChild(form);
					   	form.submit();

				      }
				    },
				    
				  }
				});  

			}else{
				method = method || "post"; // Set method to post by default if not specified.

			    // The rest of this code assumes you are not using a library.
			    // It can be made less wordy if you use one.
			    var form = document.createElement("form");
			    form.setAttribute("method", method);
			    form.setAttribute("action", '/ADA');
			    params = params?params:[];
			    params['_token'] = $('input[name="_token"]').attr('value');
			    
			    for(var key in params) {
			        if(params.hasOwnProperty(key)) {
			            var hiddenField = document.createElement("input");
			            hiddenField.setAttribute("type", "hidden");
			            hiddenField.setAttribute("name", key);
			            hiddenField.setAttribute("value", params[key]);

			            form.appendChild(hiddenField);
			         }
			    }

			    document.body.appendChild(form);
			   	form.submit();

			}
			
		},

		searchTable : function(language,table){
			//var o = [];
			var o = new Object();
			 o.language = language ;
			 o.table = table;

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	            }
	        })
	        $.ajax({
				url: '../ADA',
				type: "POST",
				dataType: "json",
				data: o,
				success: function(data){
					//console.log(data);
					//common.finalExcute(data);
					//if(text.isSuccess) common.resetForm(b);
				},complete:function(){

				},error:function(e){
					//console.log(e);
				}
			});

		},

		switchChange : function(table,id,state){
			var o = new Object();
			o.table = table ;
			o.id = id;
			o.published = state?1:0;

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	            }
	        })

	        $.ajax({
				url: 'ADA/switchChange',
				type: "POST",
				dataType: "json",
				data: o,
				success: function(data){
					toastr.success("已儲存顯示狀態");	
					hasChanged = false;
					console.log(data);
				},complete:function(){
					//setTimeout(function(){ common.tablePost({postType:'tableRead',language: language,table:o.table}); }, 1500);
					
				},error:function(e){
					toastr.error('伺服器無法回應,請稍候再試','Inconceivable!')
				}
			});
		},

		multipleCopy: function(b,language,table){
			var o = this.getFormsData($('#tableShow').get(0));
			o.table = table;
				o.id = '';
			var data = $('input[name=id]:checked').serializeArray();
				for (i = 0; i < data.length ; i++) {
					o.id += (i>0)?','+data[i].value:data[i].value;
			};
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
	            }
	        })

	        $.ajax({
				url: 'ADA/multipleCopy',
				type: "POST",
				dataType: "json",
				data: o,
				success: function(data){
					toastr.success("已複製相關資訊");	
					
				},complete:function(){
					setTimeout(function(){ common.tablePost({postType:'tableRead',language: language,table:o.table}); }, 1500);
					
				},error:function(e){
					toastr.error('伺服器無法回應,請稍候再試','Inconceivable!')
				}
			});
		},

		multipleDestroy: function(b,language,table){
			var o = this.getFormsData($('#tableShow').get(0));
				o.table = table;
				o.id = '';
			var data = $('input[name=id]:checked').serializeArray();
				for (i = 0; i < data.length ; i++) {
					o.id += (i>0)?','+data[i].value:data[i].value;
				};
			bootbox.dialog({
			  title: "確定刪除 \""+o.name+"\" ?",
			  message: "確認刪除後將無法回覆",
			  buttons: {
			  	cancel: {
			      label: "取消",
			      className: "btn btn-default",
			      callback: function(result) {
			        
			      }
			    },
			    confirm: {
			      label: "確認!",
			      className: "btn-danger",
			      callback: function(result) {

			        $.ajaxSetup({
			            headers: {
			                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
			            }
			        })

			        $.ajax({
						url: 'ADA/multipleDestroy',
						type: "POST",
						dataType: "json",
						data: o,
						success: function(data){
							
							if(data){
								toastr.success("該筆資料已經刪除並無法回覆");	
							}else{
								toastr.error('查無該筆資料','Inconceivable!')
							}
						},complete:function(){
							setTimeout(function(){ common.tablePost({postType:'tableRead',language: language,table:table}); }, 1500);
							
						},error:function(e){
							//toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
							toastr.error('伺服器無法回應,請稍候再試','Inconceivable!')
						}
					});

			      }
			    },
			    
			  }
			});

		},

		submitDestroy: function(b,language){
			var form = (b.tagName.toLowerCase() == 'form') ? b : $(b).parents('form').get(0);
			if(!this.verifyField(form)) return false;
			var o = this.getFormsData(form);

			bootbox.dialog({
			  title: "確定刪除 \""+o.name+"\" ?",
			  message: "確認刪除後將無法回覆",
			  buttons: {
			  	cancel: {
			      label: "取消",
			      className: "btn btn-default",
			      callback: function(result) {
			        
			      }
			    },
			    confirm: {
			      label: "確認!",
			      className: "btn-danger",
			      callback: function(result) {

			        $.ajaxSetup({
			            headers: {
			                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
			            }
			        })

			        $.ajax({
						url: 'ADA/delete',
						type: "POST",
						dataType: "json",
						data: o,
						success: function(data){
							console.log(data);
							if(data){
								toastr.success("該筆資料已經刪除並無法回覆");	
							}else{
								toastr.error('查無該筆資料','Inconceivable!')
							}
						},complete:function(){
							setTimeout(function(){ common.tablePost({postType:'tableRead',language: language,table:o.table}); }, 1500);
							
						},error:function(e){
							//toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
							toastr.error('伺服器無法回應,請稍候再試','Inconceivable!')
						}
					});

			      }
			    },
			    
			  }
			});
		},

		submitForm: function(b,method){
			var form = (b.tagName.toLowerCase() == 'form') ? b : $(b).parents('form').get(0);
			if(!this.verifyField(form)) return false;
			//tinyMCE.triggerSave();
			var o = this.getFormsData(form);
		

		
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
					
					//if(text.isSuccess) common.resetForm(b);
					//setTimeout(function(){location.reload();}, 1500);
					
				},complete:function(){
					//console.log(o);
				},error:function(e){
					toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
					console.log(o);
				}
			});
			
			//$.post('../../../../ada/create', o, function(text, status, jqXHR){

				//common.finalExcute(text);
				//if(text.isSuccess) common.resetForm(b);
			//}, 'json');
		},
		
		resetForm : function(b){
			var form = $(b).parents('form').get(0);
			$('.sex span').removeClass('active');
			for(var i=0;i<form.length;i++){
				switch(form.elements[i].tagName.toUpperCase()){
					case 'SELECT': form.elements[i].selectedIndex = 0; break;
					default: form.elements[i].value = '';
				};
			};	
			return false;
		},
		
		getFormsData: function(form){
			var o = {};
			var tag = [];
			for(var i=0;i<form.length;i++){
				var f = form.elements[i];
				console.log(f.type.toUpperCase());
				if(f.value == '') continue;
				
				switch(f.type.toUpperCase()){
					case 'RADIO': if(f.checked) o[f.name] = f.value; break;

					case 'SELECT': 
						if(f.selected)o[f.name]= f.value;
					break;

					case 'CHECKBOX': 
						if(f.checked){
							o[f.name]= 1;
						}else{
							o[f.name]= 0;
						};


						//if(!o[f.name]){
						//	o[f.name] = f.value;
						//}else{
						//	o[f.name] += ','+f.value;
						//};
						break;
					case 'SELECT-MULTIPLE': 
						o[f.name] = $('select[name="'+f.name+'"]').val() || [];
						o[f.name] = o[f.name].join();
					break;
					
					default:
						
						o[f.name] = f.value;
				};
			};
			
			return o;
		},
		
		finalExcute: function(o){
			if (o.notice) o.target ? this.errorStatus($('#' + o.target).get(0), o.notice) : alert(o.notice);
			
			switch(o.url){
				case 'reload': location.reload(); break;
				default:
					if(o.url) location.href = o.url;
			}
			if(o.log) console.log(o.log);
			if(o.eval) eval(o.eval);
		},
		
		swayType : function(fix){
			var $block = $('#block'),$carousel = $block.find('#carousel'), $items = $carousel.find('.itemMC'),$control = $(".control"),_length = $items.length,_width = $block.outerWidth(true) +fix,_index = 0,_count = Math.ceil(_length / 3);
				
			$control.click(function(){
				_index = Math.floor(($(this).attr('name') == 'prev' ? _index + 1 -_count : _index - 1) % _count);
				$carousel.stop().animate({left: _index * _width}, 1200, Easing);
			});
		},		
		
		mCustScroll : function(v){
			$("#CustomScrollbar").mCustomScrollbar({
				theme:"",
				mouseWheelPixels:180,
				advanced:{updateOnBrowserResize: true,updateOnContentResize: true}
			});	
		},
		
		fancyLink: function(url, text){
			if(text) alert(text);
			$.fancybox({
				transitionIn: 'elastic', transitionOut: 'elastic', titlePosition: 'over', scrolling: 'auto', 
				showCloseButton: false, showNavArrows: false, padding: 0, margin: 0, autoScale: false, 
				centerOnScroll: true, overlayColor: '#4f4f4f', overlayOpacity: .9,
				onStart: function(){
				}, onComplete: function(){
					common.mCustScroll();
					$('.mCSB_dragger_bar').css({width:5,background:'#5f5f5f',borderRadius:0});
					$('.mCSB_draggerRail').css({width:5,background:'#c5c5c5',borderRadius:0});
				},ajax: {type: 'post', url: url, data: obj, type: 'POST'}, type: 'ajax'
			});
		},
		
		fancyMAP: function(url, text){
			if(text) alert(text);
			$.fancybox({
				transitionIn: 'elastic', transitionOut: 'elastic', titlePosition: 'over', scrolling: false, 
				showCloseButton: false, showNavArrows: false, padding: 0, margin: 0, autoScale: false, 
				centerOnScroll: true, overlayColor: '#4f4f4f', overlayOpacity: .7 ,autoDimensions:true,type: 'iframe',height:'80%',width:'80%', href:url,
				onStart: function(){},
				onCancel: function(){},
				onComplete: function(){},
				onClosed: function(){},
			});
		},
		
		fancyLinkFULL: function(url, text){
			if(text) alert(text);
			$.fancybox({
				transitionIn: 'elastic', transitionOut: 'elastic', titlePosition: 'over', scrolling: false, 
				showCloseButton: false, showNavArrows: false, padding: 0, margin: 0, autoScale: false, 
				centerOnScroll: true, overlayColor: '#4f4f4f', overlayOpacity: .7 ,autoDimensions:true,type: 'iframe',height:'100%',width:'100%', href:url,
				onStart: function(){
					$('#fancybox-outer').css('background', 'transparent');
					$('.fancybox-bg').css('display', 'none');
					$('.opennews').stop().animate({width:0},600,Easing,function(){
						$('#menu').stop().animate({right:-199},800,Easing);
					});
				},
				onCancel: function(){},
				onComplete: function(){
					$(window).resize(function(){ 
						var _windowH = $(window).height();
							_windowW = $(window).width();
						$('#fancybox-overlay').stop().css({width:_windowW, height:_windowH});
						$('#fancybox-wrap').stop().css({width:_windowW, height:_windowH, left: 0});
						$('#fancybox-content').stop().css({width:_windowW, height:_windowH});
					});				
				},onClosed: function(){$('#menu').stop().animate({right:0},800,Easing);},
			});
		},
		
		inxAlbum : function(num,type){
			
			$('.box').stop().animate({opacity:0},400,function(){
				$.ajax({
					url: "model/pagesAjax.php",type: "POST",dataType: "json",data: {fuc:type},
					success: function(data){
						var _total = data.length-1,_count = num + 1
						if(_count > _total){_count = 0;};	
						$('.box').attr("src", 'Uploads'+data[_count].imgURL);
						$('.box').attr("alt", data[_count].Title);
						
						setTimeout(function(){common.inxAlbum(_count,'index');},5500);
					},complete:function(){$('.box').stop().animate({opacity:1},800,Easing);
					},error:function(){alert('ERROR!!!');}
				});
			});
		},

		ajGallery : function(b,num,type){
			$(b).addClass('active').parent('li').siblings('li').find('a').removeClass('active');
			$.ajax({
				url: "model/pagesAjax.php",type: "POST",dataType: "json",data: {fuc:type,ID:num},
				success: function(data){
					var _count = num - 1,
						img = '<img style="position: absolute;display:none;" src="Uploads'+data[_count].imgOrig+'" alt="'+data[_count].name+'" class="ad">'
					$('.pic').append(img);
				},complete:function(){
					common.fullWallpaper('.ad',1440,900);
					$('.pic').find('.ad').eq(0).fadeOut(400,function(){$(this).remove();});
					$('.pic').find('.ad').eq(1).fadeIn(800);
				},error:function(){alert('ERROR!!!');}
			});
		},

		fullWallpaper : function(v,w,h){
			var $v = $(v),r = h / w,fw = $(window).width(),fh = $(window).height();
			if((fh/fw) > r){$v .height(fh);$v .width(fh/r);}else{$v .width(fw);$v .height(fw * r);};
			$v.css({'left':(fw - $v.width())/2,'top':(fh - $v.height())/2});
		},
	};
}();

$(document).ready(common.init);


