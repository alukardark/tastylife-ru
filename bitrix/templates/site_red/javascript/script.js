$(document).ready(function(e){


$('.order_form form').append("<span style='display:inline-block;padding-top:5px; text-align:center'>Нажимая на кнопку, вы даете <a target='_blank' href='/personal-information/'> согласие на обработку персональных данных</a></span>");

$('.contact_form #contact_phone').append("<span class='contact_phone-text' style='display: block;float: right;position: relative;top: 9px;text-align: center;'>Нажимая на кнопку, вы даете <a target='_blank' href='/personal-information/'> согласие на обработку персональных данных</a></span>");

	if(!Cookies.get('confform-submit')){
		$('body').append("<div class='cookieswarn'><div class='confform'>Сайт использует cookie и аналогичные технологии для удобного и корректного отображения информации. Пользуясь нашим сервисом, вы соглашаетесь с их использованием.<div class='confform-text'><a class='confform-podr' href='/privacy-policy/' target='_blank'>Подробнее</a><span class='confform-submit'>Хорошо</span></div></div></div>");
	}

	$('.confform-submit').on('click', function(){
		Cookies.set('confform-submit', 'confform-submit', {expires :  365  });
		$('.confform').fadeOut(300);
	});

	var dontScroll = function(){
		$(window).on('scroll load resize orienationchange', function() {

				// var $div = $('.basket-toggle-list-wrap');
				// $div.on('mousewheel DOMMouseScroll', function(e) {
				// 	var d = e.originalEvent.wheelDelta || -e.originalEvent.detail,
				// 		dir = d > 0 ? 'up' : 'down',
				// 		stop = (dir == 'up' && this.scrollTop == 0) || (dir == 'down' && this.scrollTop == this.scrollHeight-this.offsetHeight);
				// 	stop && e.preventDefault();
				// });

				$.fn.isolatedScroll = function() {
					this.on('mousewheel DOMMouseScroll ontouchmove', function (e) {
						var delta = e.wheelDelta || (e.originalEvent && e.originalEvent.wheelDelta) || -e.originalEvent.detail,
							bottomOverflow = (this.scrollTop + $(this).outerHeight() - this.scrollHeight) >= 0,
							topOverflow = this.scrollTop <= 0;

						if ((delta < 0 && bottomOverflow) || (delta > 0 && topOverflow)) {
							e.preventDefault();
						}
					});
					return this;
				};


				if(window.matchMedia('(max-width: 767px)').matches){
					$('.basket-toggle-list-wrap').off('mousewheel DOMMouseScroll');
					$('.basket-toggle').isolatedScroll();
				}else if(window.matchMedia('(min-width: 768px)').matches){
					$('.basket-toggle').off('mousewheel DOMMouseScroll');
					$('.basket-toggle-list-wrap').isolatedScroll();
				}


				// $('.basket-toggle-list-wrap').isolatedScroll();

		})
	}

	// $('.basket-toggle-kol .minus').click(function(){
	// 	var minus = parseInt($(this).next(('.basket-toggle-kol-val')).text());
	// 	if(minus>0){
	// 		$(this).next(('.basket-toggle-kol-val')).text(minus-1);
	// 	}
	// });
	/**************************���������� ������ � �������******************************************/

	var ajaxFunc = function() {
		dontScroll();
		$('.link-nodirect').click(function(e){
			e.preventDefault();

			if($('.summa_all').text()!=='0 р.'){
				$('.basket-toggle').stop().slideToggle();
			}

		});

		 $(document).mouseup(function (e){ // событие клика по веб-документу
		 	var div = $('.basket-toggle'); // тут указываем ID элемента
		 	if (!div.is(e.target) // если клик был не по нашему блоку
		 		&& div.has(e.target).length === 0) { // и не по его дочерним элементам
		 		div.stop().slideUp(); // скрываем его
		 	}
		 })
		$('.basket-toggle-kol .plus').click(function(){
			var plus = parseInt($(this).prev('.basket-toggle-kol-val').text());
			$(this).prev('.basket-toggle-kol-val').text(plus+1);

			var id = $(this).parents('.basket-toggle-el').data('id');
			var kolVal = $(this).prev('.basket-toggle-kol-val').text();

			$.ajax({
				url: "/local/ajax/add_cart.php",
				type: "POST",
				data:  {
					'BasketId': id,
					'kolVal': kolVal,
					// 'totalPrice': totalPrice,
				},
				success: function(out){
					$(".cart_small").html(out);
					ajaxFunc();
				}
			});
		});
		$('.basket-toggle-kol .minus').click(function(){
			var minus = parseInt($(this).next('.basket-toggle-kol-val').text());
			if( $(this).next('.basket-toggle-kol-val').text()>0){
				$(this).next('.basket-toggle-kol-val').text(minus-1);
			}

			var id = $(this).parents('.basket-toggle-el').data('id');
			var kolVal = $(this).next('.basket-toggle-kol-val').text();



			if(parseInt(kolVal)==0){
				$.ajax({
					url: "/local/ajax/add_cart.php",
					type: "POST",
					data:  {
						'dataRemove': id,
						'dataRemoveFlag': true,
					},
					success: function(out){
						$(".cart_small").html(out);
						ajaxFunc();
					}
				});
			}else{
				$.ajax({
					url: "/local/ajax/add_cart.php",
					type: "POST",
					data:  {
						'BasketId': id,
						'kolVal': kolVal,
					},
					success: function(out){
						$(".cart_small").html(out);
						ajaxFunc();
					}
				});
			}
		});



		$('.basket-toggle-remove').click(function(){
			var id = $(this).parents('.basket-toggle-el').data('id');
			var kolVal = $(this).parents('.basket-toggle-el').find('.basket-toggle-kol-val').text();

			$.ajax({
				url: "/local/ajax/add_cart.php",
				type: "POST",
				data:  {
					'dataRemove': id,
					'kolVal': kolVal,
				},
				success: function(out){
					$(".cart_small").html(out);
					ajaxFunc();
					if($('.basket-toggle-list-wrap').find('*').length == 0){
						$('.basket-toggle').stop().slideToggle();
					}
				}
			});
		});
	}

	ajaxFunc();


















	$(".button_buy").click(function(){
		var id_product = $(this).attr("p_id");
		var count_product_id = $(this).attr("p_count");
		var count_product = parseInt($(this).attr('p_count'));
		var price_product = parseInt($(this).attr("p_price"));
		var price_product_plus_count = parseInt($(this).attr("p_price"))*count_product;
		//var name_product = $(this).attr("p_name");
		var show_msg_razmer_pizza = ".show_msg_razmer_pizza"+id_product;
		//alert(id_product);

		//���� ����� ����� ������
		if ($(this).attr("p_buy") == 1){
			//�������� ��������� � ������ ������� �����
			$(show_msg_razmer_pizza).hide();
			//������ � ����� ���������� �� ������ �������
			//������ ������� ���������� ����� � ������ ������ � ������� � ������� � ����� � ������

			//alert(price_product);
			//	alert(price_product_plus_count);
			//��������� ����� � ���������� � �������

			//	alert(count_product);
			$.ajax({
				url: "/local/ajax/add_cart.php",
				type: "GET",
				dataType: "html",
				data: "action=ADD_TO_COMPARE_LIST&id=" + id_product + "&kol=" + count_product+ "&price=" + price_product,
				success: function(out){
					//	alert(out);
					// $("#buy_add").slideDown("normal");
					//$(".background").fadeIn(500);


					//������ �� ���� ����� ������� � �����
					$(".cart_small").html(out);
					ajaxFunc();

					$('.basket-toggle').css('display','none');

					// $.ajax({
					// 	 url: "/in_cart_count_now.php",
					// 	 type: "POST",
					// 	  dataType: "html",

					// 	  success: function(in_cart_count_now){
					// 		//������ � ����� ���������� �� ������ �������
					// 		//������ ������� ���������� ����� � ������ ������ � ������� � ������� � ����� � ������
					// 		$(".cart .count").text(in_cart_count_now);

					// 	  }
					// 	});

				}
			});

		}else{

			//alert(show_msg_razmer_pizza);
			$(show_msg_razmer_pizza).show();

		}




	});






	/*****************������� �� ����� � ������� � ����� � ����� �������**************************/
	$("#in_cart_btn").click(function(){
		// $(".background").fadeOut(500);
		// $("#buy_add").slideUp("normal");
		//������ ������
		//$(".top_map").click();
		//����� �� ����� �������
		// $(".cart").click();
		window.location.href = '/cart/';

	});






	/**********************������� ������� � �����***************************************************/
	$(".cart").click(function(){
		$.ajax({
			url: "/in_cart_now_product.php",
			type: "POST",
			dataType: "html",
			//data: "ID=" + id_product + "&QUANTITY=" + count_product,
			success: function(all_summ_cart){
				if (all_summ_cart > 0){

					//������� �������

					//������������� ����� �����


					//������ �� ���� ���������� �������
					$.ajax({

						url: "/list_cart_products.php",
						type: "POST",
						dataType: "html",
						//data: "ID=" + id_product + "&QUANTITY=" + count_product,
						success: function(out){

							//������ �� ���� ���������� �������
							$(".all_products_ajax").html(out);
							$(".itogo_cart").text(all_summ_cart);
							$(".itogo_cart").attr("p_all_price", all_summ_cart);
							//   $(".cart .count").text("0");
							$(".cart .summ").text(all_summ_cart);


							$(".full_cart").show();
						}
					});
				}
			}


		});
	});

	/********************����� ���� ��� ������ ��������� � ������� �����******************************/

	$( ".select_view_pizza" ).change(function() {
		//alert($(this).val());
		if ($(this).val() > 0){
			var price = "."+$(this).attr("name");
			$(price).text($(this).val());
			var price_for_plus = $(this).val();
			var price_old_for_plus = $(this).attr("p_old_price");
			//alert(price_old_for_plus);
			var id_product = $(this).attr("p_id");
			var button_buy = ".button_buy"+id_product;
			$(button_buy).attr('p_price',($(this).val()));
			var search = "span[p_id_price_product*='.price_product";
			var search2 = search + id_product + "']"	;


			var show_msg_razmer_pizza = ".show_msg_razmer_pizza"+id_product;
			$(show_msg_razmer_pizza).hide();
			//���� ���� � ������ ����
			//���� ����� � ������ ����
			buy_btns = $(search2);
			buy_btns.each(
				function(){
					$(this).attr("p_price", price_for_plus);

					//alert(button_buy2);
					$(button_buy).attr("p_buy", 1);
				}
			);
		}else{
			var id_product = $(this).attr("p_id");
			var button_buy = ".button_buy"+id_product;
			$(button_buy).attr("p_buy", 0);
		}

	});


	/*********************************�������*************************************/


	$("#show_cart").click(function(){
		$.ajax({
			url: "/in_cart_now_product.php",
			type: "POST",
			dataType: "html",
			//data: "ID=" + id_product + "&QUANTITY=" + count_product,
			success: function(all_summ_cart){
				if (all_summ_cart > 0){

					//������� �������

					//������������� ����� �����


					//������ �� ���� ���������� �������
					$.ajax({

						url: "/list_cart_products.php",
						type: "POST",
						dataType: "html",
						//data: "ID=" + id_product + "&QUANTITY=" + count_product,
						success: function(out){

							//������ �� ���� ���������� �������
							$(".all_products_ajax").html(out);
							$(".itogo_cart").text(all_summ_cart);
							//   $(".cart .count").text("0");
							$(".cart .summ").text(all_summ_cart);
							$(".full_cart").show();
						}
					});
				}
			}
		});
	});


	/****************************���������� ������********************************/
	$(".full_order .close").click(function(){
		$(".full_order").hide();
	});


	/*******************************��������� � ���� ���������� ������************************/
	$("#add_order").click(function(){
		$(".full_cart").hide();
		$(".full_order").show();

		//��������� ���� �����
		//alert($(".itogo_cart").text());
		var itogo_summ = parseInt(nospace($(".itogo_cart").text())) + 500;
		//alert(itogo_summ);
		$(".summ_itogo_delivery").text(itogo_summ);
	});


	/**********************������������ ����� � �������**************************/
	$("#nazad_v_cart").click(function(){
		$(".full_order").hide();
		//alert("123");
		$(".full_cart").show();
	});

	/*********************������� ������� �� �������******************************/
	$(".full_cart .close").click(function(){
		$(".full_cart").hide();
	});


	/**********************���������� ���������� ������ � �������*************/

	$(".wrapper").on('click','.plus_cart',function(){
		var product = $(this).attr('p_id');
		var p_product_id = $(this).attr('p_product_id');
		var count = $(product).text();
		var res = parseInt(count) + 1;

		var price_product = res * $(this).attr("p_price");
		$(product).text(res);

		var plus = 1;

		//alert(price_product);
		$.ajax({

			url: "/add_product.php",
			type: "POST",
			dataType: "html",
			data: "ID=" + p_product_id + "&QUANTITY=" + res+ "&PRICE=" + price_product+ "&PLUS="+plus,
			success: function(all_summ_cart){
				//alert(all_summ_cart);
				$("#show_cart").click();
				$(".itogo_cart").attr('p_all_price', all_summ_cart);

				$.ajax({
					url: "/in_cart_count_now.php",
					type: "POST",
					dataType: "html",

					success: function(in_cart_count_now){
						//������ � ����� ���������� �� ������ �������
						//������ ������� ���������� ����� � ������ ������ � ������� � ������� � ����� � ������
						$(".cart .count").text(in_cart_count_now);

					}
				});
			}

		});

	});

	/**********************����������  ���������� ������ � �������*************/

	$(".wrapper").on('click','.minus_cart',function(){
		var product = $(this).attr('p_id');
		var p_product_id = $(this).attr('p_product_id');
		var count = $(product).text();

		var price_product = $(this).attr("p_price");
		var minus = 1;



		if (count > 1){
			var res = parseInt(count) - 1;
			var price_product = res * $(this).attr("p_price");
			$(product).text(res);

			$.ajax({
				url: "/add_product.php",
				type: "POST",
				dataType: "html",
				data: "ID=" + p_product_id + "&QUANTITY=" +res+ "&PRICE=" + price_product+ "&MINUS="+minus,
				success: function(all_summ_cart){
					$("#show_cart").click();
					$(".itogo_cart").attr('p_all_price', all_summ_cart);

					$.ajax({
						url: "/in_cart_count_now.php",
						type: "POST",
						dataType: "html",

						success: function(in_cart_count_now){
							//������ � ����� ���������� �� ������ �������
							//������ ������� ���������� ����� � ������ ������ � ������� � ������� � ����� � ������
							$(".cart .count").text(in_cart_count_now);

						}
					});

				}
			});
		}
	});

	/************************�������� ������ �� ���� �����*************************************/
	$( ".promo_text" ).change(function() {
		//alert( "Handler for .change() called." );
		var promo_kod = $(this).val();
		var itogo_summ = parseInt($(".itogo_cart").attr("p_all_price"));
//alert(itogo_summ);
//alert(promo_kod);
		$.ajax({
			url: "/promokod_skidka_cart.php",
			type: "POST",
			dataType: "html",
			data: "promo_kod=" + promo_kod,
			success: function(out){
				if (out > 0){
					//alert(out);
					//	$(".promo_text").css('border','1px solid #50d64d');
					var skidka = itogo_summ * out / 100;
					itogo_summ = itogo_summ - skidka;
					//alert(res);
					$(".itogo_cart").text(itogo_summ);
					$("#promo_form_hidden").val(out);
					//alert(out);
				}else{
					//$(".promo_text").css('border','1px solid #f97676');
					$(".itogo_cart").text(itogo_summ);
				}
				//alert(out);
			}

		});
	});

	/*****************************����� ���������� ������ � �������************************************/


	function nospace(str) {
		var VRegExp = new RegExp(/^(\s|\u00A0)+/g);
		var VResult = str.replace(VRegExp, '');
		return VResult
	}


	/****************�������� ������� �� ������� � �� ��������*************************/
	$(".wrapper").on('click','.del_product',function(){
		//alert("123");
		$(".itogo_cart").text($(".itogo_cart").attr("p_all_price"));
		var p_id = $(this).attr("p_id");
		var p_product_id = $(this).attr("p_product_id");
		var itogo_summ = parseInt(nospace($(".itogo_cart").text()));
		//alert(itogo_summ);
		var all_summ_itog = 0;
		$(".promo_text").val("");
		// alert(itogo_summ);
		//������� ������� � ������
		$.ajax({


			url: "/del_product_cart.php",
			type: "POST",
			dataType: "html",
			data: "ID=" + p_product_id+"&ITOGO=" + itogo_summ,
			success: function(out){
				//alert(out);
				$(p_id).hide();
				$(".phone .cart").click();
				//	  $(".itogo_cart").text(out);
				//  $(".itogo_cart").attr('p_all_price', out);

				$.ajax({
					url: "/in_cart_count_now.php",
					type: "POST",
					dataType: "html",

					success: function(in_cart_count_now){
						//������ � ����� ���������� �� ������ �������
						//������ ������� ���������� ����� � ������ ������ � ������� � ������� � ����� � ������
						$(".cart .count").text(in_cart_count_now);

					}
				});

				//  all_summ_itog =
				if (out == 0 || out.indexOf("-") > 0){
					//  alert("123");
					// window.location.href = '/';
					//�������� �������, ���� ��� ������ ������� �� ���
					$(".full_cart").hide();
					$(".cart .count").text("0");
					$(".cart .summ").text("0");
					//  $(".itogo_block").hide();
					// $(".promo_block").hide();
				}

				//
			}

		});

	});


	/****************�������� ������*****************/



	/**********************����������  ���������� ������ � ������********************************/

	$(".services_element .minus").click(function(){
		var product = $(this).attr('p_id');
		var count = $(product).text();
		//var count = parseInt($(product).text());
		var count = $(this).next(product).text();
		// if (count.length == 6){
		// 	count = count.substring(0, count.length - 5);
		// }else{
		// 	count = count.substring(0, count.length - 3);
		// }
		if (count > 1){
			var res = parseInt(count) - 1;
			$(product).text(res);
			var p_btn_buy = $(this).attr('p_btn_buy');
			$(p_btn_buy).attr('p_count',res);
			//����� ���� �� �������
			var price_product = res * $(this).attr("p_price");
			var price_product_id = $(this).attr('p_id_price_product');
			$(price_product_id).text(price_product);

			//������ ���� ��� ������
			var price_product = res * $(this).attr("p_old_price");
			var price_product_id = $(this).attr('p_id_old_price_product');
			$(price_product_id).text(price_product);
		}


	});

	/**********************���������� ���������� ������ � ������********************************/

	$(".services_element .plus").click(function(){
		var product = $(this).attr('p_id');
		var count = $(product).text();
		var count = $(this).prev(product).text();

		// if (count.length == 6){
		// 	count = count.substring(0, count.length - 5);
		// }else{
		// 	count = count.substring(0, count.length - 3);
		// }
		//alert(count.length);
		var res = parseInt(count) + 1;
		//alert(res);
		$(product).text(res);
		var p_btn_buy = $(this).attr('p_btn_buy');
		$(p_btn_buy).attr('p_count',res);
		//����� ���� �� �������
		var price_product = res * $(this).attr("p_price");
		var price_product_id = $(this).attr('p_id_price_product');
		$(price_product_id).text(price_product);

		//������ ���� ��� ������
		var price_product = res * $(this).attr("p_old_price");
		var price_product_id = $(this).attr('p_id_old_price_product');
		$(price_product_id).text(price_product);

	});










	$('.preview_img a').fancybox({
		toolbar  : false,
		arrows : false,
		smallBtn : true,
		iframe : {
			preload : false
		}
	})

	$('.button_buy[data-fancybox]').fancybox({
		touch: false,
		afterLoad: function( instance, slide ) {
			$('.services_element_slick').slick('setPosition');
		}
	})
// 	//���������� ������ �� ����� �� ���
// 	$(".mask-show").click(function(){
// 		$('.zoom.tovar_zoom.animate').hide();
// 		var class_zoom_product = $(this).attr("p_class");
// //	alert(class_zoom_product);
// 		$(class_zoom_product).show();
// 		$(".preview").show();
// 	});
//
// //���������� ������ �� ����� �� ���
// 	$(".mask-zoom").click(function(){
// 		var class_zoom_product = $(this).attr("p_class");
// //	alert(class_zoom_product);
// 		$(class_zoom_product).hide();
// 	});
// 	$(document).mouseup(function (e){ // событие клика по веб-документу
// 		var div = $(".zoom.tovar_zoom.animate"); // тут указываем ID элемента
// 		if (!div.is(e.target) // если клик был не по нашему блоку
// 			&& div.has(e.target).length === 0) { // и не по его дочерним элементам
// 			div.stop().hide(); // скрываем его
// 		}
// 	})


	/*�������� �������*/
	/*$("#clear_cart").click(function(){
	 $.ajax({


	 url: "/bitrix/templates/sushi/inc/clear_cart.php",
	 type: "POST",
	 dataType: "html",
	 //  data: "ID=" + id_product + "&QUANTITY=" + count_product+ "&PRICE=" + price_product+"&NAME=" + name_product,
	 success: function(out){
	 window.location.href = '/';
	 }

	 });

	 });*/

















	/***********************�������� �� ������� ����� ���������� ������***********************************/
	/*$(".add_order_popup .exit_form").click(function(){

	 window.location.href = "/";
	 });*/











	/****************************************������****************************************/


	// ������� ����� ".y" ��� ����� �� ����� ������� ����� ".x"
	/* $(document).click(function (event){
	 if (!$( event.target ).is('.full_cart')) {
	 $('.full_cart').hide();
	 }
	 });*/

	$("body").click(function(e) {
		//alert($(e.target).closest("#show_cart").length);
		if($(e.target).closest(".full_cart").length==0 && $(e.target).closest("#show_cart").length == 0  && $(e.target).closest("#nazad_v_cart").length == 0 ) {
			$(".full_cart").hide();
			//$(".full_order").hide();
		}
	});


	//2. �������� �������, � �������� ���������� �������� �����
	$("#phone").mask("8(999) 999-9999");

	$(".hide_menu").click(function(){
		$(".mobile_menu").hide();
	});

	/*���� ��� ������� �������� �������*/
	$("#show_menu_link").click(function(){
		//$(".mobile_menu").show();
	});

	var pull = $('#top_menu');
	var menu = $('#top_menu2 ul');

	$(pull).on('click', function(e) {
		if ($("#top_menu2").attr('p_show') == 1)
		{
			$("#top_menu2").hide();
			$("#top_menu2").attr('p_show','0');

		}else{
			$("#top_menu2").show();
			$("#top_menu2").attr('p_show','1');
		}


	});


	$('.bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 6,
		slideWidth: 147,
		slideHeight: 147,
		slideMargin: 45,
		moveSlides: 1,
	});

	/* ����� �������� ����� */
	$(".header_contact button").click(function(){
		$("#leave_application").slideDown("normal");
		$(".background").fadeIn(500);
	});
	$(".btn_zakaz_zvonok").click(function(){
		$("#leave_application").slideDown("normal");
		$(".background").fadeIn(500);
	});
	$(".btn_zakaz_zvonok").click(function(){
		$("#leave_application").slideDown("normal");
		$(".background").fadeIn(500);
	});
	$(".button_buy").click(function(){
//	$("#buy_add").slideDown("normal");
		//$(".background").fadeIn(500);
	});
    var button__but_click = 0;
    var button__but_flag = false;
    $('.phone-button__but').click(function(){
        if(button__but_click==0){
            $(this).parent().find('.phone-button__phone').css('width','215px');
            button__but_click++;
        }else{
            $(this).parent().find('.phone-button__phone').css('width','0px');
            button__but_click = 0;
            $("#leave_application").slideDown("normal");
            $(".background").fadeIn(500);
        }
    });
    
    $('.phone-button').mouseover(function(){
        button__but_flag = true;
    });
    $('.phone-button').mouseout(function(){
        button__but_flag = false;
    });
    $('body').click(function(){
        if(!button__but_flag){
            $('.phone-button__phone').css('width','0px');
            button__but_click = 0;
        }
    });
    
    if(navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)){
            $('.phone-button').hide();
         }else{
            $('.phone-button').show();
         }
        
	$(".footer_telephone_request").click(function(){
		$("#request_call").slideDown("normal");
		$(".background").fadeIn(500);
	});
	$(".exit_form").click(function(){
		$(".leave_application").slideUp("normal");
		$(".background").fadeOut(500);
		$("#leave_application").slideUp("normal");
		$("#request_call").slideUp("normal");
		$("#buy_add").slideUp("normal");
		$("#add_order_popup").slideUp("normal");
		$("#add_order_popup").hide();
//	alert("123");
	});
	$("#continue_buy").click(function(){

		$(".background").fadeOut(500);

		$("#buy_add").slideUp("normal");
	});

	$("#leave_application").css({"margin-left": "-"+$("#leave_application").outerWidth() / 2+"px","margin-top":"-"+$("#leave_application").outerHeight() / 2+"px"});
	$("#request_call").css({"margin-left": "-"+$("#request_call").outerWidth() / 2+"px","margin-top":"-"+$("#request_call").outerHeight() / 2+"px"});
	$("#buy_add").css({"margin-left": "-"+$("#buy_add").outerWidth() / 2+"px","margin-top":"-"+$("#buy_add").outerHeight() / 2+"px"});
	$("#add_order_popup").css({"margin-left": "-"+$("#add_order_popup").outerWidth() / 2+"px","margin-top":"-"+$("#add_order_popup").outerHeight() / 2+"px"});


	/* �������� ��� �������� �� ������� �������� */
	$("#slides .slide_text .title").addClass("fadeInRight animated_one");
	$("#slides .slide_text .description").addClass("fadeInRight animated_second");
	$("#slides .slide_text .feedback_form_slider").addClass("fadeInRight animated_three");



	/* ������� */
	$("#slides .slide_text").css({"margin-top":"-"+$("#slides .slide_text").height() / 2 +"px"});
	$("#slides .slides_images").css({"width":$(window).width()+"px"});
	// $(window).resize(function(){
	// 	$("#slides .slides_images").css({"width":$(window).width()+"px"});
	// 	$("#slides .slide_text").css({"margin-top":"-"+$("#slides .slide_text").height() / 2 +"px"});
	// 	$(".hFooter").height($("footer").innerHeight());
	// 	$("footer").css("margin-top","-"+$("footer").innerHeight()+"px");
	// });
	$(window).on('load resize',function(){
		$("#slides .slides_images").css({"width":$(window).width()+"px"});
		$("#slides .slide_text").css({"margin-top":"-"+$("#slides .slide_text").height() / 2 +"px"});
		$(".hFooter").height($("footer").innerHeight());
		$("footer").css("margin-top","-"+$("footer").innerHeight()+"px");
	});

	$(".prev, .next").css({"margin-top":"-"+$(".prev").height() / 2+"px"});



	function startLoadingAnimation()
	{
		var imgObj = $(".loadImg");
		var bgObj = $(".load_bg");
		imgObj.fadeIn();
		bgObj.fadeIn();
		imgObj.css({"margin-left": "-"+imgObj.width() / 2+"px", "margin-top": "-"+imgObj.height() / 2+"px"});
	}

	/* ��������� ��������� �� ����������� ��������� */

	var url = window.location.search;
	var arrayVar = (url.substr(1)).split('&');
	var valueAndKey = [];
	var resultArray = [];
	for (i = 0; i < arrayVar.length; i++) {
		valueAndKey = arrayVar[i].split('=');
		resultArray[valueAndKey[0]] = valueAndKey[1];
		if(valueAndKey[0] == "success"){
			$('.dialog').css("display","block").removeClass("dialog-close").addClass("dialog-open");
			$(".background").css("display","block");
			window.history.pushState(null, null, "/index.php");
		}
	}

	/* ���� �� �������� �������� ��������� */
	$(".dialog").css({"margin-left": "-"+$(".dialog").outerWidth() / 2+"px","margin-top":"-"+$(".dialog").outerHeight() / 2+"px"});
	$(".dialog button").click(function(){
		$(".dialog").removeClass("dialog-open").addClass("dialog-close");
		$(".background").fadeOut(500);
		$(".dialog").fadeOut(500);
	});
	$(".background").click(function(){
		$(".dialog").removeClass("dialog-open").addClass("dialog-close");
		$(this).fadeOut(500);
		$(".dialog").fadeOut(500);
		$("#leave_application").slideUp("normal");
		$("#request_call").slideUp("normal");
		$("#buy_add").slideUp("normal");

		$("#add_order_popup").slideUp("normal");
		$("#add_order_popup").hide();
	});

	/* ������������� ���� */

// new!!


	var $menu = $("#header");
	// $(window).scroll(function(){
	// 	if($(window).width() > '760') {
	// 		// if((device.windows() || device.fxos()) && $(window).width() > '1023') {
	// 		// alert($(window).scrollTop());
	// 		if ($(window).scrollTop() > 152) {
	// 			$menu.removeClass("default").addClass("fixed_menu");
	// 			$(".header_top_").hide();
	// 			$("#header").css('height','auto');
	// 			//$(".menu-header").css('margin-top','5px');
	// 		} else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed_menu")) {
	// 			$menu.removeClass("fixed_menu").addClass("default");
	// 			$(".header_top_").show();
	// 			$("#header").css('height','auto');
	// 			//$(".menu-header").css('margin-top','18px');
	// 		}
	// 	}
	// 	// }
	// });
	$(window).on('load scroll', function(){
		if($(window).width() > '760') {
			// if((device.windows() || device.fxos()) && $(window).width() > '1023') {
			// alert($(window).scrollTop());
			if ($(window).scrollTop() > 152) {
				$('body').css('margin-top','202px')
				$menu.removeClass("default").addClass("fixed_menu");
				$(".header_top_").hide();
				$("#header").css('height','auto');
				//$(".menu-header").css('margin-top','5px');
			} else if($(this).scrollTop() <= 218 && $menu.hasClass("fixed_menu")) {
				$('body').css('margin-top','0')
				$menu.removeClass("fixed_menu").addClass("default");
				$(".header_top_").show();
				$("#header").css('height','auto');
				//$(".menu-header").css('margin-top','18px');
			}
		}
	})


	/* ��������� ������ */
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.top_map');
	$(window).scroll(function(){
		if( $(this).scrollTop() > offset )
        { 
            $back_to_top.addClass('cd_is_visible'); 
            $('.phone-button').css({
                                    'opacity':'1',
                                    'z-index': '0',
                                    'transition-delay':'0.2s',
                                    'transition-duration':'0s'
                                    });
            /*function delay_timer(){
                $('.phone-button').css({
                                    'transition-delay':'0s',
                                    'transition-duration': '0.3s'
                                    });
            }
            setTimeout(delay_timer,500);*/
        } else {
            $back_to_top.removeClass('cd_is_visible cd_fade_out');
            $('.phone-button').css({
                                        'opacity':'0',
                                        'transition-delay':'0s',
                                        'transition-duration':'0.3s',
                                        'z-index': '-999'
                                        //'overflow': 'hidden'
                                    });
          /*  function delay_timer2(){
                $('.phone-button').width(0);
            }
            setTimeout(delay_timer2,300);*/
        } 
		if( $(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd_fade_out');
		}
	});
    $('.phone-button').css({
                                    'opacity':'0',
                                    'z-index': '-999'
                                    });
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
				scrollTop: 0 ,
			}, scroll_top_duration
		);
	});





	$('#slides').slides({
		preload: true,
		preloadImage: '/bitrix/templates/site/css/themes/images/slider/loading.gif',
		play: 5000,
		hoverPause: false,
		animationComplete: function(current){if (window.console && console.log) {};}
	});


	var pull = $('#mobile_menu');
	var menu = $('header nav ul');
	$(pull).on('click', function(e) {
//	alert("123");
		e.preventDefault();
		menu.slideToggle();
	});




	/* ���� ������������ ����� */
	$('.style-switcher .switch').click(function(e){
		e.preventDefault();
		var styleswitcher = $(this).closest('.style-switcher');
		if(styleswitcher.hasClass('active')){
			styleswitcher.animate({left: '-' + styleswitcher.outerWidth() + 'px'}, 300).removeClass('active');
		}
		else{
			styleswitcher.animate({left: '0'}, 300).addClass('active');
			var pos = styleswitcher.offset().top;
			if($(window).scrollTop() > pos){
				$('html, body').animate({scrollTop: pos}, 500);
			}
		}
	});
	$('.style-switcher .options li').click(function(e){
		$(this).addClass('active').siblings().removeClass('active');
		var name_color = $("> a",this).attr("data-option-value");
		//alert(name_color);
		var link_color = "/bitrix/templates/site_green/css/themes/styles_"+name_color+".css";
		$("[data-color = 'true']").attr("href",link_color);
		$.cookie('color_theme', name_color, { expires: 7, path: '/' });
	});

});

$(function(){
	$('.reviews-list-cont').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		swipe: false
	});

	$('.main-slider').slick({
		dots: false,
		infinite: true,
		speed: 500,
		swipe: false,
		dotts: false
	});

	$('.services_element_slick').slick({
		dots: false,
		infinite: true,
		speed: 500,
		swipe: true,
		dotts: false,
		slidesToShow: 3,
		slidesToScroll: 1,






		responsive: [
			{
				breakpoint: 1201,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 791,
				settings: {
					slidesToShow:1,
				}
			}
		]

	});




	var el = document.getElementById('clock');


	function spanize(el) {
		el.innerHTML =  el.innerHTML.replace(/(.)/g, '<span>$1</span>');
	}

	setTimeout(function() {
		if(parseInt($('#clock').text())<=9){
			spanize(el);
			$('#clock').prepend('<span>0</span><span>0</span>');
		}else if(parseInt($('#clock').text())<=99){
			spanize(el);
			$('#clock').prepend('<span>0</span>');
		}else{
			spanize(el);
		}
		$('#clock').css({
			'visibility':'visible',
			'opacity':'1',
		});
	}, 100);

	$('form .mask-phone').mask('+7(999)-999-99-99', { 'placeholder': '+7(___)-___-__-__' });
});

// $(document).ready(function(){
// 	$('input.reviews-submit').click(function(){
// 		$.getJSON('/ajax/reviews.php', {
// 			name:$('input.reviews-name').val(),
// 			email:$('input.reviews-email').val(),
// 			orderNamber:$('input.reviews-order-namber').val(),
// 			reviewsText:$('input.reviews-text').val(),
// 		}, function(data){
// 			if (data.status=='ok'){
// 				alert('ОК!');
// 			} else {
// 				alert(data.msg);
// 			}
// 		});
// 	});
// });

$(window).load(function(){
	$(document).on('click', '.button_buy', function (e) {
		e.preventDefault();
		var id = $(this).data('p_id'),
			it = $(this);
		$("body").append(
			"<div class='add_animate' style='top:" + e.clientY + "px;left:" + e.clientX + "px;'></div>"
		);
		var end_position_top = $(".shopping-cart")[0].offsetTop;
		var end_position_left = $(".shopping-cart").offset().left;
		$(".add_animate").animate(
			{"left": end_position_left + "px", "top": end_position_top + "px"},
			400,
			function () {
				$(this).remove();
			}
		);
	});
});
