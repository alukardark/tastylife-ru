<?
IncludeTemplateLangFile(__FILE__);
$arr_url = explode('/', str_replace ( SITE_DIR,"/", $APPLICATION->GetCurPage(false)));
$url_2 = $arr_url[1];
$url_3 = $arr_url[2];
$url_4 = $arr_url[3];
?>
	<!DOCTYPE HTML>
<html lang="<?=LANGUAGE_ID?>">
	<head>
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5545T3V');</script>
<!-- End Google Tag Manager -->
		<title><?$APPLICATION->ShowTitle();?></title>
		<meta property="og:site_name" content="Ваш сайт" />
		<meta property="og:locale" content="ru_RU" />
		<meta property="og:title" content="<?$APPLICATION->ShowTitle()?>" />
		<meta property="og:image" content="<?=SITE_TEMPLATE_PATH;?>/images/logo.png" />
		<meta name="format-detection" content="telephone=no">
		<link rel="index" title="Ваш сайт" href="/" />
		<meta name="application-name" content="Ваш сайт" />
		<meta name="yandex-verification" content="92b8c405a417dfda" />
		<meta name="google-site-verification" content="i6thMaGH2guOjYvb_lBANaiv5A_e1rMh40_5PIVTx9k" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH;?>/favicon.ico" />
		<link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH;?>/favicon.ico" />
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery-1.10.2.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery-2.1.1.min.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jQueryUI-1.11.2.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/js.cookie.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.bxslider.js"></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.cookie.js"></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/slides.min.jquery.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.bxslider.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/device.js" ></script>
<!--		<script type="text/javascript" src="--><?//=SITE_TEMPLATE_PATH;?><!--/javascript/fancybox.js" ></script>-->
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.easing.1.3.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/libs/slick/slick.min.js" ></script>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/libs/fancybox/jquery.fancybox.min.js" ></script>



		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/javascript/script.js" ></script>
		<script src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.maskedinput.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH;?>/javascript/tabs_localStorage.js"></script>
		<!-- <script src="<?=SITE_TEMPLATE_PATH;?>/javascript/flipclock.js"></script> -->
		<link href="<?=SITE_TEMPLATE_PATH;?>/libs/fancybox/jquery.fancybox.min.css" type="text/css" rel="stylesheet" />

		<link href="<?=SITE_TEMPLATE_PATH;?>/font-awesome.min.css" type="text/css" rel="stylesheet" />

<!--		<link href="--><?//=SITE_TEMPLATE_PATH;?><!--/fancybox.css" type="text/css" rel="stylesheet" />-->

		<!-- <link href="<?=SITE_TEMPLATE_PATH;?>/css/flipclock.css" type="text/css" rel="stylesheet" /> -->

		<link href="<?=SITE_TEMPLATE_PATH;?>/libs/slick/slick.css" type="text/css" rel="stylesheet" />
		<link href="<?=SITE_TEMPLATE_PATH;?>/libs/slick/slick-theme.css" type="text/css" rel="stylesheet" />
		<link href="<?=SITE_TEMPLATE_PATH;?>/bxslider.css" type="text/css" rel="stylesheet" />
		<script src="<?=SITE_TEMPLATE_PATH;?>/javascript/jquery.colorbox.js"></script>
		<link href="<?=SITE_TEMPLATE_PATH;?>/css/themes/styles.css" type="text/css" rel="stylesheet" data-color="true" />

		<link href="<?=SITE_TEMPLATE_PATH;?>/css.bird/my.css" type="text/css" rel="stylesheet" />
		<link href="<?=SITE_TEMPLATE_PATH;?>/css.bird/media.css" type="text/css" rel="stylesheet" />

		<?if($url_2 == 'cart'):?>
			<link href="<?=SITE_TEMPLATE_PATH;?>/css.bird/bootstrap.min.css" type="text/css" rel="stylesheet" data-color="true" />
			<script src="<?=SITE_TEMPLATE_PATH?>/javascript/jqBootstrapValidation-1.3.7.min.js" charset="utf-8"></script>
		<?endif?>



		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?$APPLICATION->ShowHead();?>
		<?if ($APPLICATION->GetCurPage(false)!=SITE_DIR){?>
			<style>
				/*body .wrapper_center{margin:0 auto !important; max-width:1000px;}*/
				/*@media only screen and (max-width: 1200px){*/
					/*body .wrapper_center {*/
						/*margin:0 15px 0!important;*/
					/*}*/
				/*}*/
				body .wrapper_center{margin:0 auto !important; max-width:1040px;}
				@media only screen and (max-width: 1200px){
					body .wrapper_center {
						max-width: 970px;
						margin-right: auto;
						margin-left: auto;
						padding-left: 15px;
						padding-right: 15px;
					}
				}
				.hFooter{
					margin-top: 50px;
				}
				<?if($APPLICATION->GetCurPage() == "/contacts/"){?>
					.hFooter{
						margin-top: 0px;
					}
				<?}?>
			</style>

		<?}?>

		<style>
			.full_cart{
				display: none;
			}
		</style>
	</head>



<body itemscope itemtype="http://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5545T3V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper">
<?
session_start();
$APPLICATION->ShowPanel();
CModule::IncludeModule("iblock");
?>
	<div class="background"></div>
	<div class="dialog">
		<p><?=GetMessage("SENT_MASSAGE");?></p>
		<button><?=GetMessage("CLOSE");?></button>
	</div>
	<!--Форма в шапке по клику на Заказать звонок-->
	<div id="leave_application" class="order_form">
		<p class="exit_form"></p>
		<p class="big_text_form"><?=GetMessage("ADD_PHONE");?></p>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.feedback",
			"leave_application",
			array(
				"COMPONENT_TEMPLATE" => "leave_application",
				"USE_CAPTCHA" => "N",
				"OK_TEXT" => GetMessage("MSG_FEED_THKS"),
				"EMAIL_TO" => COption::GetOptionString("main", "email_from"),
				"REQUIRED_FIELDS" => array(
				),
				"EVENT_MESSAGE_ID" => array(
					0 => "8",
				)
			),
			false
		);?>
	</div>



	<div id="buy_add" class="order_form">
		<p class="exit_form"></p>
		<p class="big_text_form">
		<p class="big_text_form"><?=GetMessage("ADD_PRODUCT");?></p>

		<input type="submit" id="continue_buy" value="<?=GetMessage("CONTINUE_BUY");?>">
		<input type="submit" id="in_cart_btn" value="<?=GetMessage("IN_CART_BUY");?>">

	</div>


<?

$dir = $APPLICATION->GetCurPage();
$curPage = $APPLICATION->GetCurPage();
?>
	<header id="header">

		<div class="container menu-header hidden-xs" id="logo_header">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 work hidden-xs">
					<?if ($curPage <> "/") {
						$dir = SITE_DIR;
					}else{
						$dir = "/";
					}?>
					<div class="logo">
						<a href="<?=$dir?>">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => SITE_DIR."include/header/logo.php"
								)
							);?>
						</a>
					</div>
				</div>
			</div>
		</div>


		<div class="container-fluid header_top_">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-3 col-sm-3 col-xs-4 work">
						<div class="logo">
							<a href="<?=$dir?>">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR."include/header/logo.php"
									)
								);?>
							</a>
						</div>
						<div class="logo-desc">Вкусная жизнь в Кемерове</div>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2 hidden-xs wrap-clock">
						<div class="clock-title">Заказов сегодня</div>

						<?
						$arFilter = Array("IBLOCK_ID"=>10, "ID"=>59);
						$res = CIBlockElement::GetList(Array(), $arFilter);
						if ($ob = $res->GetNextElement()){
							$arFields = $ob->GetFields();
							$arProps = $ob->GetProperties();
						}
						?>


						<div id="clock"><?=$arProps['TOTAL']['VALUE']?></div>
					</div>
					<div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 hidden-xs  social">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/header/work.php"
						),
							false,
							array(
								"ACTIVE_COMPONENT" => "Y"
							)
						);?>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-4 contacts my-contacts hidden-xs">

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
						</div>

						<div class="btn_feedback">
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
						</div>


					</div>


				</div>
			</div>

		</div>
		<nav id="top_menu" class="default">
			<a href="#" id="mobile_menu_new"><?=GetMessage("MENU")?></a>
		</nav>

		<nav id="top_menu2" class="default2">
			<a href="#" id="mobile_menu"><?=GetMessage("MENU")?></a>
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
		</nav>


		<div class="visible-xs">

			<div class="col-md-12 logo_mobile text-center">   <!-- new!! -->
				<?if ($curPage <> "/") {
					$dir = SITE_DIR;
				}else{
					$dir = "/";
				}?>
				<div class="logo">
					<a href="<?=$dir?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/header/logo.php"
							)
						);?>
					</a>
				</div>
			</div>

		</div>



		<!-- new!! -->

		<div class="tel_mobile visible-xs">
   	<span>
   		<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/header/phone-click.php"
		),
			false,
			array(
				"ACTIVE_COMPONENT" => "Y"
			)
		);?>
   		</span>
		</div>
		<!-- .new!! -->

		<div class="container menu-header">
			<div class="row">
				<!--меню в шапке начало-->
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 social my-social">
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
				</div>
				<!--меню в шапке конец-->

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 contacts">



					<?// -------------------------------------------  Корзина ?>
					<div class="default_cart">
						<div class="cart" <?if($url_2 == 'cart'):?>style=" opacity: .3"<?endif?>>
							<?if($url_2 !== 'cart'):?>
								<div class="cart_small shopping-cart">

									<?

									if($_SESSION['CATALOG_CART_LIST'][3]['kol_all'] > 0)
									{
										$kol_all = $_SESSION['CATALOG_CART_LIST'][3]['kol_all'];
										$summa_all = $_SESSION['CATALOG_CART_LIST'][3]['summa_all'];
										?>
										<!--										<a  href="/cart/"><span class="kol_all">--><?//=$kol_all?><!--</span>--><?//=GetMessage("ORDER_CART_TEXT")?><!--: </a><span class="summa_all">--><?//=$summa_all?><!-- р.</span>-->
										<a class="link-nodirect" href="#"><span class="kol_all"><?=$kol_all?></span><?=GetMessage("ORDER_CART_TEXT")?></a><span class="link-nodirect-colon">:</span><span class="summa_all"><?=$summa_all?> р.</span>

									<?} else {?>
										<!--										<a  href="/cart/"><span class="kol_all">0</span>--><?//=GetMessage("ORDER_CART_TEXT")?><!--: </a><span class="summa_all">0 р.</span>-->
										<a class="link-nodirect link-nodirect-empty" href="#"><span class="kol_all">0</span><?=GetMessage("ORDER_CART_TEXT")?></a><span class="link-nodirect-colon">:</span><span class="summa_all">0 р.</span>
									<?}?>
									<div class="basket-toggle" style="display: none;">
										<div class="basket-toggle-list">
											<div class="basket-toggle-list-wrap">
												<?//print_r($_SESSION['CATALOG_CART_LIST'][3])?>
												<?
												foreach($_SESSION['CATALOG_CART_LIST'][3]['ITEMS'] as $item){?>
													<?
													if(!$item['pict']){
														$item['pict'] = __DIR__.'/css/images/no_photo.png';
													}
													?>
													<div class="basket-toggle-el" data-id="<?=$item['ID']?>">
														<div class="basket-toggle-img" style="background-image: url(<?=$item['pict']?>);">Картинка </div>
														<div class="basket-toggle-rightWrap">
															<div class="basket-toggle-name"><?=$item['NAME']?></div>
															<div class="basket-toggle-kol">
																<span class="minus"></span>
																<span class="basket-toggle-kol-val"><?=$item['kol']?></span>
																<span class="plus"></span>

	<!--															<div class="basket-toggle-price-one">--><?//=$item['price']?><!-- р. <span>за шт.</span></div>-->
																<div class="basket-toggle-price"><?=$item['kol']*$item['price']?> р.</div>
																<span data-remove="<?=$item['ID']?>" class="basket-toggle-remove"></span>
															</div>
														</div>
													</div>
													<?
												}
												?>
											</div>
											<?if($_SESSION['CATALOG_CART_LIST'][3]['summa_all']>0){?>
												<form action="/cart/order/" method="GET">
													<div class="col-md-6 basket-toggle-left-wrap">
														<div class="basket-toggle-saleTitle">Скидка на заказ</div>
														Если у вас есть промо-код введите его в поле ниже и получите скидку на весь заказ.
														<input type="text" value="" name="id_kupon" style="text-align: left; padding-left: 10px; height: 33px; font-size: 20px;" class="form-control-sale  form-control input_kupon mobile_full_size">
													</div>
													<div class="col-md-6  basket-toggle-right-wrap">
														<div class="basket-toggle-allPrice">Итого: <span><?=$_SESSION['CATALOG_CART_LIST'][3]['summa_all']?> р.</span></div>
														<a href="/cart/" class="btn btn-default btn-lg  mobile_btn_order link-in-cart">Перейти в корзину</a>
														<button  type="submit" class=" btn btn-default btn-lg  mobile_btn_order"><i class="fa fa-check"></i> Оформить заказ </button>
													</div>
												</form>
											<?}?>

										</div>
									</div>
								</div>

							<?else:?>
								<?if($url_3 == 'order'):?>
									<?=GetMessage("ORDER_TEXT")?>
								<?else:?>
									<?=GetMessage("ORDER_CART_TEXT_EMPTY")?>
								<?endif?>
							<?endif?>

							<?// -------------------------------------------  .Корзина ?>
						</div>
					</div>
                   
				</div>
	</header>

<?
// unset($_SESSION['CATALOG_CART_LIST']);

// echo "<pre>";
// print_r($_SESSION['CATALOG_CART_LIST']);
// echo "</pre>";


?>

<?if ($APPLICATION->GetCurPage(false) == SITE_DIR){?>
	<div class="container-fluid">

		<div class="row">

			<div id="slides">
				<?$APPLICATION->IncludeComponent("bitrix:news.list", "slider-my", Array(
					"COMPONENT_TEMPLATE" => "slider",
					"IBLOCK_TYPE" => "webstudiosamovar_sushi",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => "5",	// Код информационного блока
					"NEWS_COUNT" => "",	// Количество новостей на странице
					"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
					"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
					"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"FILTER_NAME" => "",	// Фильтр
					"FIELD_CODE" => array(	// Поля
						0 => "PREVIEW_PICTURE",
						1 => "DETAIL_PICTURE",
						2 => "",
					),
					"PROPERTY_CODE" => array(	// Свойства
						0 => "SLIDER_URL",
						1 => "TEXT_1",
						2 => "TEXT_2",
						3 => "TEXT_3",
						4 => "PICT_1",
						5 => "PICT_2",
						6 => "PICT_3",
					),
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
					"DISPLAY_DATE" => "N",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"SET_STATUS_404" => "Y",	// Устанавливать статус 404
					"SHOW_404" => "N",	// Показ специальной страницы
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
					"PAGER_TITLE" => "Новости",	// Название категорий
				),
					false,
					array(
						"ACTIVE_COMPONENT" => "Y"
					)
				);?>

			</div>
		</div>
	</div>
<?}?>

	<div class="wrapper_center">
<?if ($APPLICATION->GetCurPage(false)!=SITE_DIR){?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"START_FROM" => "0",	
		"PATH" => "",
		"SITE_ID" => "s1",	
	),
	false
);?>
<h1><?$APPLICATION->ShowTitle(false);?></h1>
<?}?>