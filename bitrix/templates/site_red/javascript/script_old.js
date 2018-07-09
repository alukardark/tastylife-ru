$(document).ready(function(e){
	//автоматически меняем высоту корзины что бы появился скролл
	/*if ($(".products").height() > 300){
		//alert("123");
		$("#products_list_cart").css('height','285px !important;');
	}
	var timerId = setInterval(function() {
  $("#products_list_cart").css('height','285px !important;');
}, 2000);
	//alert($(".products").height());*/
  //2. Получить элемент, к которому необходимо добавить маску
  $("#phone").mask("8(999) 999-9999");


/*Переход по клику В корзину в шапку и вывод корзины*/
$("#in_cart_btn").click(function(){
	$(".background").fadeOut(500);
	$("#buy_add").slideUp("normal");
	$(".top_map").click();
	window.location.href = '?show_cart=1';
	//$(".full_cart").show();
	//alert("123");
	//$("#buy_add").slideUp("normal");
});


$("#xxx").click(function(){
	alert("123");
	$("#products_list_cart").css('height','285px !important;');
	$(".products").css('height','285px !important;');
});
/*Оформление заказа*/
$(".full_order .close").click(function(){
	$(".full_order").hide();
});

/*Меню для мобилки Показать Закрыть*/
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
	//e.preventDefault();
	
	//$("#top_menu2").attr('p_show','1');
	//alert("123");
//	menu.slideToggle();
	//var show = 0;
	//$("#top_menu").css('margin-bottom','50%');
	
});	

/*Смена цены при выборе маленькой и большой пиццы*/
$( ".select_view_pizza" ).change(function() {
	if ($(this).val() > 0){
		var price = "."+$(this).attr("name");
		$(price).text($(this).val());
		var price_for_plus = $(this).val();
		//alert(price_for_plus);
		var id_product = $(this).attr("p_id");
		var button_buy = "#button_buy"+id_product;
		$(button_buy).attr('p_price',($(this).val()));
		var search = "span[p_id_price_product*='.price_product";
		var search2 = search + id_product + "']"	;
		//alert(search2);
		//alert(id_product);
		//ищем плюс и меняем цену
		//ищем минус и меняем цену
		 buy_btns = $(search2);
            buy_btns.each(
                function(){
                    $(this).attr("p_price", price_for_plus);
//alert("123");
                }
            );
	}
//alert($(this).val());
});

/*Выбор способа оплаты при оформлении заказа*/
$( ".payment_select" ).change(function() {
	//alert($(this).attr("p_value"));
	/*$(this).find('option').each(function() {
                            if($(this).prop('selected') == true){ 
                              $value = $(this).attr('p_value');
							//  alert($sort);
                              //$del = $(this).attr('del_id');
                            }
                        });
	if ($value == "yandex"){
		var all_summ = $(".summ_itogo_delivery").text();
			$.ajax({
								 
				   
								 url: "/bitrix/templates/sushi/inc/yandex.php",
								 type: "POST",
								  dataType: "html",
								  data: "all_summ=" + all_summ,
								  success: function(out){
										$(".yandex_oplata_form").html(out);
										$(".yandex_oplata_form").show();
										//alert(all_summ);
										//alert(out);
								  }

								});
	}
	if ($value == "nal"){
		$(".yandex_oplata_form").hide();
	}*/
 
 //setTimeout(yandex, 1000);
 
            //buy_btns.attr("href","javascript:void(0);");
});

function yandex(){
	
  
            buy_btns = $('input[name*="sum"]');
            buy_btns.each(
                function(){
                    $(this).val(1);
					$(this).attr('value', 1);
					alert("123");
                }
            );
		//	alert("123");
}
$("#test").click(function(){
	//alert("123");
	//yandex(); 
	
});



$(".hide_menu").click(function(){
	$(".mobile_menu").hide();
});
/*Корзина*/

/*Переходим к шагу оформления заказа*/
$("#add_order").click(function(){
	$(".full_cart").hide();
	$(".full_order").show();
	
	//заполняем поле Итого
	//alert($(".itogo_cart").text());
	var itogo_summ = parseInt(nospace($(".itogo_cart").text())) + 500;
	//alert(itogo_summ);
	$(".summ_itogo_delivery").text(itogo_summ);
});

/*Возвращаемся назад в корзину*/
$("#nazad_v_cart").click(function(){
	$(".full_order").hide();
	$(".full_cart").show();
});

//Закрыть корзину на крестик
$(".full_cart .close").click(function(){
	$(".full_cart").hide();
});


$(".cart").click(function(){
	$(".full_cart").show();
	//$(".itogo_cart").text();
	
	//узнаем содержимое корзины
	/*$.ajax({
						 
		   
						 url: "/bitrix/templates/sushi/inc/in_cart_now_product.php",
						 type: "POST",
						  dataType: "html",
						  //data: "ID=" + id_product + "&QUANTITY=" + count_product,
						  success: function(out){
								$("#buy_add").slideDown("normal");
								$(".background").fadeIn(500);
								$(".summ").text(out);
								//alert(out);
						  }

						});*/
});


$(".mask-show").click(function(){
	var class_zoom_product = $(this).attr("p_class");
//	alert(class_zoom_product);
	$(class_zoom_product).show();
	$(".preview").show();
});

$(".mask-zoom").click(function(){
	var class_zoom_product = $(this).attr("p_class");
//	alert(class_zoom_product);
	$(class_zoom_product).hide();
});

/*Уменьшение и увеличение количества товара в списке*/
$(".services_element .minus").click(function(){
	var product = $(this).attr('p_id');
	var count = $(product).text();
	//var count = parseInt($(product).text());
	if (count.length == 6){
		count = count.substring(0, count.length - 5);
	}else{
		count = count.substring(0, count.length - 3);
	}
	if (count > 1){
		var res = parseInt(count) - 1;
		$(product).text(res);
		
		var price_product = res * $(this).attr("p_price");
		var price_product_id = $(this).attr('p_id_price_product');
		$(price_product_id).text(price_product);
	}
	
	//alert(count);
});


/*$("#save_order").click(function(){
	alert("123");
	$(".button2_theme_action").click();
	$(".button2_theme_normal").click();
});

$( ".form" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});


$(".button2_theme_action").click(function(){
	alert("123");
});
$("#btn").click(function(){
	alert("123");
});

$(".button2_theme_normal").click(function(){
	alert("123");
});*/




$(".services_element .plus").click(function(){
	var product = $(this).attr('p_id');
	var count = $(product).text();
	//alert(count.length);
	if (count.length == 6){
		count = count.substring(0, count.length - 5);
	}else{
		count = count.substring(0, count.length - 3);
	}
	
	//alert(count.length);
	var res = parseInt(count) + 1;
	//alert(res);
	$(product).text(res);
	
    var price_product = res * $(this).attr("p_price");
	var price_product_id = $(this).attr('p_id_price_product');
	$(price_product_id).text(price_product);

});


/*Уменьшение и увеличение количества товара в корзине*/
$(".plus_cart").click(function(){
	var product = $(this).attr('p_id');
	var p_product_id = $(this).attr('p_product_id');
	var count = $(product).text();
	var res = parseInt(count) + 1;
	
	var price_product = res * $(this).attr("p_price");
	$(product).text(res);
	
	var minus = 0;
	
	//alert(product);
	//alert(count);
	//alert(price_product);
	
	//var itogo_summ = parseInt($(".itogo_cart").attr("p_all_price"));
	//alert(itogo_summ);
	
	

	$.ajax({
						 
		   
						 url: "#SITE_DIR#add_product.php",
						 type: "POST",
						  dataType: "html",
						  data: "ID=" + p_product_id + "&QUANTITY=" + res+ "&PRICE=" + price_product+ "&MINUS="+minus,
						  success: function(out){
								//$("#buy_add").slideDown("normal");
								//$(".background").fadeIn(500);
								$(".summ").text(out);
								$(".itogo_cart").text(out);
								//alert(out);
						  }

						});
	
});

$(".minus_cart").click(function(){
		var product = $(this).attr('p_id');
	var p_product_id = $(this).attr('p_product_id');
	var count = $(product).text();
	//var res = parseInt(count) + 1;
	var price_product = $(this).attr("p_price");
	var minus = 1;
	//$(product).text(res);
	
	
	//alert(product);
	//alert(count);
	//alert(price_product);
	
	//var itogo_summ = parseInt($(".itogo_cart").attr("p_all_price"));
	//alert(itogo_summ);
	
	if (count > 1){
		var res = parseInt(count) - 1;
		$(product).text(res);
		//alert(res);
		$.ajax({
							 
			   
							 url: "#SITE_DIR#add_product.php",
							 type: "POST",
							  dataType: "html",
							  data: "ID=" + p_product_id + "&QUANTITY=" +res+ "&PRICE=" + price_product+ "&MINUS="+minus,
							  success: function(out){
									//$("#buy_add").slideDown("normal");
									//$(".background").fadeIn(500);
									$(".summ").text(out);
									$(".itogo_cart").text(out);
									//	alert(out);
							  }

							});
		
			
			
		
	}

	
	
});

	

	/*Промокод скидка на весь заказ*/
$( ".promo_text" ).change(function() {
 //alert( "Handler for .change() called." );
 var promo_kod = $(this).val();
 var itogo_summ = parseInt($(".itogo_cart").attr("p_all_price"));
//alert(itogo_summ);
 $.ajax({
						 
		   
						 url: "#SITE_DIR#promokod_skidka_cart.php",
						 type: "POST",
						  dataType: "html",
						  data: "promo_kod=" + promo_kod,
						  success: function(out){
								if (out > 0){
									//alert("1");
								//	$(".promo_text").css('border','1px solid #50d64d');
									var skidka = itogo_summ * out / 100;
									itogo_summ = itogo_summ - skidka;
									//alert(res);
									$(".itogo_cart").text(itogo_summ);
								}else{
									//$(".promo_text").css('border','1px solid #f97676');
									$(".itogo_cart").text(itogo_summ);
								}
								//alert(out);
						  }

						});
});

/*Смена количества товара в корзине*/
//del_product

function nospace(str) {  
		var VRegExp = new RegExp(/^(\s|\u00A0)+/g);  
		var VResult = str.replace(VRegExp, '');  
		return VResult  
	}
//Удаление позиции из корзины и ее пересчет
$(".del_product").click(function(){
	var p_id = $(this).attr("p_id");
	var p_product_id = $(this).attr("p_product_id");
	var itogo_summ = parseInt(nospace($(".itogo_cart").text()));
	

	//alert(itogo_summ);
	
	
	//Очищаем позицию в сессии
	$.ajax({
		 

		 url: "#SITE_DIR#del_product_cart.php",
		 type: "POST",
		  dataType: "html",
		  data: "ID=" + p_product_id+"&ITOGO=" + itogo_summ,
		  success: function(out){
			//  alert(out);
			  $(p_id).hide();
			  $(".itogo_cart").text(out);
			  if (out == 0){
				 window.location.href = '/';
				  $(".itogo_block").hide();
				  $(".promo_block").hide();
			  }
			  
				//
		  }

		});
	
});

//Переход в корзину по клику при добавлении товара в корзину

$(".cart").click(function(){
//	alert("123");
//	$("#in_cart_btn").click();
});
	/*Добавление товара в корзину*/
$(".button_buy").click(function(){
	var id_product = $(this).attr("p_id");
	var count_product_id = $(this).attr("p_count");
	var count_product = parseInt($(count_product_id).text());
	var price_product = $(this).attr("p_price");
	//var name_product = $(this).attr("p_name");              
					
	//alert(price_product);								
						
	$.ajax({
	 

	 url: "#SITE_DIR#add_product.php",
	 type: "POST",
	  dataType: "html",
	  data: "ID=" + id_product + "&QUANTITY=" + count_product+ "&PRICE=" + price_product,
	  success: function(out){
			$("#buy_add").slideDown("normal");
			$(".background").fadeIn(500);
			$(".summ").text(out);
		//	$(".phone").attr('id','href_show_cart');
			//alert(out);
	  }

	});

});




$('.bxslider').bxSlider({
	minSlides: 1,
	maxSlides: 6,
	slideWidth: 147,
	slideHeight: 147,
	slideMargin: 45,
	moveSlides: 1,
});

/* Форма обратной связи */
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


/* Анимация для слайдера на главной странице */
$("#slides .slide_text .title").addClass("fadeInRight animated_one");
$("#slides .slide_text .description").addClass("fadeInRight animated_second");
$("#slides .slide_text .feedback_form_slider").addClass("fadeInRight animated_three");



/* Слайдер */
$("#slides .slide_text").css({"margin-top":"-"+$("#slides .slide_text").height() / 2 +"px"});
$("#slides .slides_images").css({"width":$(window).width()+"px"});
$(window).resize(function(){
	$("#slides .slides_images").css({"width":$(window).width()+"px"});
	$("#slides .slide_text").css({"margin-top":"-"+$("#slides .slide_text").height() / 2 +"px"});
	$(".hFooter").height($("footer").innerHeight());
	$("footer").css("margin-top","-"+$("footer").innerHeight()+"px");
});
$(".prev, .next").css({"margin-top":"-"+$(".prev").height() / 2+"px"});



/* В проектах показать еще элементы */
$(".projects").on('click', 'button', function(){
	startLoadingAnimation();
	$.ajax({
		async: false,
		type: "POST",
		url: $(this).attr("data-site-id")+"ajax_script/projects.php",
		data: "ajax_array="+$(this).attr("data-all-count")+"&section_id="+$(this).attr("data-section-id"),
		dataType: "html",
		success:function(data){
			setTimeout(function(){
				$(".projects").html("");
				$(".loadImg").hide();
				$(".projects").html(data);
			}, 1000);
		} 
	});
});

function startLoadingAnimation()
{
	var imgObj = $(".loadImg");
	var bgObj = $(".load_bg");
	imgObj.fadeIn();
	bgObj.fadeIn();
	imgObj.css({"margin-left": "-"+imgObj.width() / 2+"px", "margin-top": "-"+imgObj.height() / 2+"px"});
}


/* Блок конечной суммы в калькуляторе */
$(".calculator tbody .column_5 input").keyup(function(){
	var total_price = 0;
	$(".calculator tbody .column_5 input").each(function(){
		var count = $(this).val();
		var price = parseInt($(this).attr("data-price"));
		total_price = total_price + (price * count);
		$(".total_price span").text(total_price);
		$(".total_price_bottom span").text(total_price);
	});
});
$(".calculator tbody .column_5 input").keyup(function(){
	var count = $(this).val();
	var price = parseInt($(this).attr("data-price"));
	var parent = $(this).parentsUntil("tbody");
	$("> .column_6 span", parent).text(count * price +" руб.");
});


/* Проверяем корректно ли отправилось сообщение */
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

/* Блок об успешной отправки сообщения */
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

/* Фиксированное меню */
var $menu = $("#top_menu");
$(window).scroll(function(){
	if((device.windows() || device.fxos()) && $(window).width() > '1023') {
		if ( $(this).scrollTop() > 180 && $menu.hasClass("default") ){
			$menu.removeClass("default").addClass("fixed_menu");
		} else if($(this).scrollTop() <= 180 && $menu.hasClass("fixed_menu")) {
			$menu.removeClass("fixed_menu").addClass("default");
		}
	}
});

/* Вернуться наверх */
var offset = 300,
offset_opacity = 1200,
scroll_top_duration = 700,
$back_to_top = $('.top_map');
$(window).scroll(function(){
	( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd_is_visible') : $back_to_top.removeClass('cd_is_visible cd_fade_out');
	if( $(this).scrollTop() > offset_opacity ) { 
		$back_to_top.addClass('cd_fade_out');
	}
});
$back_to_top.on('click', function(event){
	event.preventDefault();
	$('body,html').animate({
		scrollTop: 0 ,
		}, scroll_top_duration
	);
});


$(".projects_photo a").fancybox();


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

/* фиксированное поле с калькулятором */		
var a = document.querySelector('.calculator .total_price'), b = null;  // селектор блока, который нужно закрепить
if(a){
	window.addEventListener('scroll', Ascroll, false);
	document.body.addEventListener('scroll', Ascroll, false);  // если у html и body высота равна 100%
	function Ascroll() {
	  if (b == null) {  // добавить потомка-обёртку, чтобы убрать зависимость с соседями
		var Sa = getComputedStyle(a, ''), s = '';
		for (var i = 0; i < Sa.length; i++) {  // перечислить стили CSS, которые нужно скопировать с родителя
		  if (Sa[i].indexOf('padding') == 0) {
			s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
		  }
		}
		b = document.createElement('div');  // создать потомка
		//b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
		a.insertBefore(b, a.firstChild);  // поместить потомка в цепляющийся блок первым
		var l = a.childNodes.length;
		for (var i = 1; i < l; i++) {  // переместить во вновь созданного потомка всех остальных потомков (итого: создан потомок-обёртка, внутри которого по прежнему работают скрипты)
		  b.appendChild(a.childNodes[1]);
		}
		//a.style.height = b.getBoundingClientRect().height + 'px';  // если под скользящим элементом есть другие блоки, можно своё значение
		//a.style.padding = '0';
		//a.style.border = '0';
	  }
	  if (a.getBoundingClientRect().top <= 0) { // elem.getBoundingClientRect() возвращает в px координаты элемента относительно верхнего левого угла области просмотра окна браузера
		b.className = 'total_fixed_price';
	  } else {
		b.className = '';
	  }
	  window.addEventListener('resize', function() {
		a.children[0].style.width = getComputedStyle(a, '').width
	  }, false);  // если изменить размер окна браузера, измениться ширина элемента
	}
}


/* Блок переключения цвета */
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
	var link_color = "/bitrix/templates/sushi/css/themes/styles_"+name_color+".css";
	$("[data-color = 'true']").attr("href",link_color);
	$.cookie('color_theme', name_color, { expires: 7, path: '/' });
});

});

/*Скрипт увеличения фотки по клику*/

$(document).ready(function(){
	//Examples of how to assign the Colorbox event to elements
	$(".group1").colorbox({rel:'group1'});
	$(".group2").colorbox({rel:'group2', transition:"fade"});
	$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
	$(".group4").colorbox({rel:'group4', slideshow:true});
	$(".ajax").colorbox();
	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
	$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	$(".inline").colorbox({inline:true, width:"50%"});
	$(".callbacks").colorbox({
		onOpen:function(){ alert('onOpen: colorbox is about to open'); },
		onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
		onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
		onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
		onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
	});

	$('.non-retina').colorbox({rel:'group5', transition:'none'})
	$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
	
	//Example of preserving a JavaScript event for inline calls.
	$("#click").click(function(){ 
		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
		return false;
	});
});
/* Подстановка высоты footer и hFooter */
$(".hFooter").height($("footer").innerHeight());
$("footer").css("margin-top","-"+$("footer").innerHeight()+"px");

/*Очистить корзину*/
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
		