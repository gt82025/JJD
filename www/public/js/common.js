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
            
            /*switch(caseType){
				case 'index': case '':

					
				break;
            };*/
        },

		no_submit_btn: function(form){
			if(event.keyCode == 13 && document.activeElement.tagName.toLowerCase() != 'textarea') $(form).find('[rel=submit]').trigger('click');
		},
		tasteDetial2: function (id) {
			
			
			$tasteDetial = $('.contentDetialbtn');
			$contentDetial = $('.contentDetial');
			$tasteClose = $('.detial .closeBtn');
			$tasteconfirm = $('.btnContainer .confirm');

			//contentDetial.addClass('open');
		
				
				$qty = $('input[name="quantity"]').val();
				$size_id = $('input[name="size"]').val();
				$('#tasteList').html('');
				
				
				$.ajax({
					url: '../api/cart/inside2/'+id,
					type: "get",
					dataType: "json",
					success: function(data){
						var $html = '';
						for (let $i = 0; $i < data.length; $i++) {
							let $number = $i+1;
							$html += '<li>';
							$html += '<div class="head">';
							$html +=        '<p>盒'+$number+'口味</p>';
							$html +=    '</div>';
							$html +=    '<div class="tastContent">';
							$html +=        '<div class="single taste">';
							$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside0.info.cover+'" alt="'+data[$i].inside0.info.name+'">';
							$html +=            '<label class="quantity_main">';
							$html +=                '<input type="number" value="'+data[$i].inside0.qty+'" class="Quantity" readonly>';
							$html +=            '</label>';
							$html +=        '</div>';

							$html +=        '<div class="single taste">';
							$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside1.info.cover+'" alt="'+data[$i].inside1.info.name+'">';
							$html +=            '<label class="quantity_main">';
							$html +=                '<input type="number" value="'+data[$i].inside1.qty+'" class="Quantity" readonly>';
							$html +=            '</label>';
							$html +=        '</div>';

							$html +=        '<div class="single taste">';
							$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside2.info.cover+'" alt="'+data[$i].inside2.info.name+'">';
							$html +=            '<label class="quantity_main">';
							$html +=                '<input type="number" value="'+data[$i].inside2.qty+'" class="Quantity" readonly>';
							$html +=            '</label>';
							$html +=        '</div>';

							$html +=        '<div class="single taste">';
							$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside3.info.cover+'" alt="'+data[$i].inside3.info.name+'">';
							$html +=            '<label class="quantity_main">';
							$html +=                '<input type="number" value="'+data[$i].inside3.qty+'" class="Quantity" readonly>';
							$html +=            '</label>';
							$html +=        '</div>';
							$html +=    '</div>';
							$html +='</li>';
						}
						$('#tasteList').html($html);
						
						$contentDetial.addClass('open');
						$body.addClass('stop-scrolling');
					
					

					},complete:function(){
						//console.log(o);
					},error:function(e){
						
						//console.log(o);
					}
				});

	
			$tasteClose.click(function() {
				$contentDetial.removeClass('open');
				$body.removeClass('stop-scrolling');
			});
		
			//計算盒裝蛋糕內的總合
		

		
	},
		// 全站 商品口味選擇
		tasteDetial: function (sort) {
			
			
				$tasteDetial = $('.contentDetialbtn');
				$contentDetial = $('.contentDetial');
				$tasteClose = $('.detial .closeBtn');
				$tasteconfirm = $('.btnContainer .confirm');

				//contentDetial.addClass('open');
			
					
					$qty = $('input[name="quantity"]').val();
					$size_id = $('input[name="size"]').val();
					$('#tasteList').html('');
					
					
					$.ajax({
						url: '../api/cart/inside/'+sort,
						type: "get",
						dataType: "json",
						success: function(data){
							var $html = '';
							for (let $i = 0; $i < data.length; $i++) {
								let $number = $i+1;
								$html += '<li>';
								$html += '<div class="head">';
								$html +=        '<p>盒'+$number+'口味</p>';
								$html +=    '</div>';
								$html +=    '<div class="tastContent">';
								$html +=        '<div class="single taste">';
								$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside0.info.cover+'" alt="'+data[$i].inside0.info.name+'">';
								$html +=            '<label class="quantity_main">';
								$html +=                '<input type="number" value="'+data[$i].inside0.qty+'" class="Quantity" readonly>';
								$html +=            '</label>';
								$html +=        '</div>';

								$html +=        '<div class="single taste">';
								$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside1.info.cover+'" alt="'+data[$i].inside1.info.name+'">';
								$html +=            '<label class="quantity_main">';
								$html +=                '<input type="number" value="'+data[$i].inside1.qty+'" class="Quantity" readonly>';
								$html +=            '</label>';
								$html +=        '</div>';

								$html +=        '<div class="single taste">';
								$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside2.info.cover+'" alt="'+data[$i].inside2.info.name+'">';
								$html +=            '<label class="quantity_main">';
								$html +=                '<input type="number" value="'+data[$i].inside2.qty+'" class="Quantity" readonly>';
								$html +=            '</label>';
								$html +=        '</div>';

								$html +=        '<div class="single taste">';
								$html +=            '<img src="'+location.protocol+'//'+location.hostname+data[$i].inside3.info.cover+'" alt="'+data[$i].inside3.info.name+'">';
								$html +=            '<label class="quantity_main">';
								$html +=                '<input type="number" value="'+data[$i].inside3.qty+'" class="Quantity" readonly>';
								$html +=            '</label>';
								$html +=        '</div>';
								$html +=    '</div>';
								$html +='</li>';
							}
							$('#tasteList').html($html);
							
							$contentDetial.addClass('open');
							$body.addClass('stop-scrolling');
						
						

						},complete:function(){
							//console.log(o);
						},error:function(e){
							
							//console.log(o);
						}
					});

		
				$tasteClose.click(function() {
					$contentDetial.removeClass('open');
					$body.removeClass('stop-scrolling');
				});
			
				//計算盒裝蛋糕內的總合
			

			
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
					
				},complete:function(){
					//console.log(o);
				},error:function(e){
					toastr.error('伺服器無法回應,請稍候再試','Inconceivable!');
					console.log(o);
				}
			});
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
		
		

	};
}();

$(document).ready(common.init);


