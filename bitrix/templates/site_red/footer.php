<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
if(defined("ERROR_404") && ERROR_404 == "Y" && $APPLICATION->GetCurPage(true) !='/404.php') LocalRedirect('/404.php');
$curPage = $APPLICATION->GetCurPage();
?>

</div>
<div class="hFooter"></div>
</div>
<footer id="footer">


	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 reviews-list">
					<h5>Читай отзывы о нас</h5>
					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"my-reviews",
						array(
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"ADD_SECTIONS_CHAIN" => "N",
							"AJAX_MODE" => "N",
							"AJAX_OPTION_ADDITIONAL" => "",
							"AJAX_OPTION_HISTORY" => "N",
							"AJAX_OPTION_JUMP" => "N",
							"AJAX_OPTION_STYLE" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "Y",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array(
								0 => "",
								1 => "",
							),
							"FILTER_NAME" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "8",
							"IBLOCK_TYPE" => "-",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "Y",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "20",
							"PAGER_BASE_LINK_ENABLE" => "N",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => ".default",
							"PAGER_TITLE" => "Новости",
							"PARENT_SECTION" => "",
							"PARENT_SECTION_CODE" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"PROPERTY_CODE" => array(
								0 => "DATE",
								1 => "NAME",
								2 => "",
							),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_BY2" => "SORT",
							"SORT_ORDER1" => "DESC",
							"SORT_ORDER2" => "ASC",
							"STRICT_SECTION_CHECK" => "N",
							"COMPONENT_TEMPLATE" => "my-reviews"
						),
						false
					);?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 reviews-form">
					<h5>Оставь свой отзыв</h5>
<!--					<div class="reviews-form-cont">-->
<!--						<form action="" method="POST" name="reviews">-->
<!--							<div style="padding: 0" class="col-lg-4 col-md-4 col-sm-4 col-xm-12">-->
<!--								<input class="reviews-name" type="text" name="name" placeholder="Имя">-->
<!--							</div>-->
<!---->
<!--							<div class="col-lg-4 col-md-4 col-sm-4 col-xm-12 parent-order-namber">-->
<!--								<input class="reviews-order-namber" type="text" name="order-namber" placeholder="Номер заказа">-->
<!--							</div>-->
<!--							<div style="padding: 0 0 13px 0" class="col-lg-4 col-md-4 col-sm-4 col-xm-12">-->
<!--								<input class="reviews-email" type="text" name="email" placeholder="E-mail">-->
<!--							</div>-->
<!---->
<!--							<div style="padding: 0 0 13px 0" v class="col-lg-12 col-md-12 col-sm-12 col-xm-12">-->
<!--								<textarea class="reviews-text" name="text" placeholder="Отзыв"></textarea>-->
<!--							</div>-->
<!--							<div style="padding: 0 0 13px 0; text-align: right" class="col-lg-12 col-md-12 col-sm-12 col-xm-12">-->
<!--								<input class="reviews-submit" type="submit" name="submit" value="Отсавить отзыв">-->
<!--							</div>-->
<!--						</form>-->



						<?$APPLICATION->IncludeComponent(
							"axioma:main.feedback",
							"reviews",
							array(
								"AJAX_MODE" => "Y", // [Y|N] При установленной опции для компонента будет включен режим AJAX.
								"AJAX_OPTION_SHADOW" => "N", // [Y|N] Затемнять область
								"AJAX_OPTION_JUMP" => "N", // [Y|N] Если пользователь совершит AJAX-переход, то при установленой опции по окончании загрузки произойдет прокрутка к началу компонента.
								"AJAX_OPTION_STYLE" => "Y", // [Y|N] Если параметр принимает значение "Y", то при совершении AJAX-переходов будет происходить подгрузка и обработка списка стилей, вызванных компонентом.
								"AJAX_OPTION_HISTORY" => "N", //[Y|N] Когда пользователь выполняет AJAX-переходы, то при включенной опции можно использовать кнопки браузера Назад и Вперед.
								"USE_CAPTCHA" => "N", // [Y|N] При отмеченной опции для неавторизованных пользователей будет использоваться CAPTCHA при создании сообщений.
								"OK_TEXT" => "Спасибо, ваше сообщение принято.", // Задается текст сообщения, выводимый пользователю после отправки.
								"EMAIL_TO" => "andrereb1@gmail.com", //Задается E-mail, на который будет отправлено письмо (будет отображен в форме для отправки сообщений в поле Ваш E-mail).
								"REQUIRED_FIELDS" => array( // Указываются поля формы, которые будут обязательными для заполнения.
//									0 => "EMAIL",
//									1 => "MESSAGE",
								),
								"EVENT_MESSAGE_ID" => array( //Указывается почтовый шаблон, на основе которого будут отправляться письма.
									0 => "7",
								)
							),
							false
						);?>

	<!--					</div>-->
				</div>
			</div>
		</div>


		<hr class="footer-hr">



		<div class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 work">
						<?if ($curPage <> "/") {
							$dir = SITE_DIR;
						}else{
							$dir = "/";
						}?>
						<div>
							<a href="<?=$dir?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/footer/logo.php", Array(), Array("MODE" => "html","NAME" => ""));?></a>
						</div>
						<div class="logo-desc">
							Вкусная жизнь в Кемерове
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-4 hidden-xs social">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/footer/social_title.php"
						),
							false,
							array(
								"ACTIVE_COMPONENT" => "Y"
							)
						);?>

						<!-- <div class="icons">
							<a class="soc-vk" href="http://vk.com" target="_blank"></a>
							<a class="soc-fb" href="http://fb.com" target="_blank"></a>
							<a class="soc-instagram" href="https://www.instagram.com/" target="_blank"></a>
						</div> -->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 contacts">
						<div class="phone">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/header/phone.php"
							),
								false,
								array(
									"ACTIVE_COMPONENT" => "Y"
								)
							);?>

							<span class="btn_feedback">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/header/btn_feedback.php"
							),
								false,
								array(
									"ACTIVE_COMPONENT" => "Y"
								)
							);?>
						</span>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 tasty">
						Tasty Life, © 2017
					</div>
					<ul class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pay-list">
						<div class="wrap-policy" style="padding-top: 26px;">
								<a target="_blank" style="color: #6c6c6c;display: block;margin-top: -15px;" href="/privacy-policy/">Политика конфиденциальности</a>
								<a target="_blank" style="color: #6c6c6c;display: block;" href="/copyright/">Информация для правообладателей</a>
						</div>
<!--						<li><img src="--><?//=SITE_TEMPLATE_PATH?><!--/css/themes/images/logo-visa.png" alt="logo-visa"></li>-->
<!--						<li><img src="--><?//=SITE_TEMPLATE_PATH?><!--/css/themes/images/logo-mastercard.png" alt="mastercard"></li>-->
<!--						<li><img src="--><?//=SITE_TEMPLATE_PATH?><!--/css/themes/images/logo-yandex.png" alt="yandex"></li>-->
<!--						<li><img src="--><?//=SITE_TEMPLATE_PATH?><!--/css/themes/images/logo-paypal.png" alt="paypal"></li>-->
					</ul>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 axioma">
						<a title="Создание, продвижение, администрирование сайтов" href="https://www.web-axioma.ru" target="_blank">Axioma</a>
					</div>
				</div>
			</div>

		</div>

</footer>

<div class="phone-button">
    <div class="phone-button__phone">
        <?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => SITE_DIR."include/header/phone-click.php"
								)
							);?>
    </div>
    <button class="phone-button__but"></button>
</div>


<a href="#" class="top_map"></a>
<!--mobile_menu-->
<div class="mobile_menu">

	<?$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"main_menu",
		array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_TIME" => "360000",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "4",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			"COMPONENT_TEMPLATE" => "main_menu",
			"MENU_THEME" => "site"
		),
		false
	);?>
	<p class="hide_menu"><?=GetMessage("HIDE_MENU")?></p>
</div>
<!--<span class="gift"></span>-->
<input type="hidden" id="show_cart">
<link async href="<?=SITE_TEMPLATE_PATH;?>/jquery.mCustomScrollbar.css" type="text/css" rel="stylesheet" />


<script async src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
	(function($){
		$(window).load(function(){
			var timerId = setInterval(function() {
				$(".products").mCustomScrollbar({
					theme:"dark-thick"
				});
			}, 1);
			//alert("123");


		});
	})(jQuery);
</script>
</body>


</html>