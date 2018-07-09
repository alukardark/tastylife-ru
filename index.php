<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Доставка вкусной еды из ресторанов Кемерова — Tasty Life");
$APPLICATION->SetTitle("Доставка вкусной еды из ресторанов Кемерова — Tasty Life");
$APPLICATION->SetPageProperty("tags", "Главная");
$APPLICATION->SetPageProperty("keywords", "доставка еды кемерово, доставка пиццы, заказ еды, шашлык, кесадилья, бургер, гриль, курица, свинина, говядина, ягнёнок, рыба, гарнир, паста, сыр, ризотто, пицца, салат, карпаччо, тар-тар, закуска, суп, хлеб, соус, десерт, напитки, mama roma");
$APPLICATION->SetPageProperty("description", "Закажи доставку еды на дом или в офис в Кемерове. Доставка пиццы, бургеров, десертов и других горячих блюд из ресторана «Mama Roma».");
?>
	</div>


	<div class="wrapper_center">
	<div class="wrapper_center first">
	<div class="services">
		<div class="services_center">

			<div class="tabs">

				<ul class="tabs__caption">
					<?
					CModule::IncludeModule("iblock");
					$recomended = 0;
					$iblock_id = 3;
					$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
					$arFilter = Array("IBLOCK_ID"=>$iblock_id, "PROPERTY_RECOMMENDED_VALUE"=>GetMessage("Da"), "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
					while($ob = $res->GetNextElement())
					{
						$arFields = $ob->GetFields();
						$recomended = 1;
						//print_r($arFields);
					}
					?>
<!--					--><?//if ($recomended == 1):?>
<!--						<li>Мы рекомендуем</li>-->

					<li class="tabs__caption-all active">Все</li>
<!--					--><?//endif?>
					<?

					$arFilter = Array('IBLOCK_ID'=>$iblock_id, 'ACTIVE'=>'Y');
					$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter, true);

					while($ar_result = $db_list->GetNext())
					{
						if($ar_result['ELEMENT_CNT']==0){?>
							<li style="display: none;"><?=$ar_result['NAME'];?></li>
						<?}else{?>
						<li><?=$ar_result['NAME'];?></li>
					<?}
						}?>
				</ul>
	<span class="catalog">
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"section_index", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "arrFilter22",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "webstudiosamovar_sushi",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "5000",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "ACTION",
			2 => "VID_PICCI",
			3 => "RECOMMENDED",
			4 => "WITH_ORDER",
			5 => "TYPE_PRODUCT",
			6 => "HIT",
			7 => "OLD_PRICE",
			8 => "PRICE_FOR_PIZZA",
			9 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => $section_id,
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "section_index",
		"DISPLAY_COMPARE" => "N",
		"COMPATIBLE_MODE" => "Y",
		"MESS_BTN_COMPARE" => "Сравнить"
	),
	false
);?>
</span>

				<!--recomended block-->
<!--				--><?//if ($recomended == 1):?>
<!--					<div class="tabs__content">-->
<!--						--><?//
//						global $arrFilter;
//						$arrFilter['PROPERTY_RECOMMENDED_VALUE'] = GetMessage("Da");
//						?>
<!--						--><?//$APPLICATION->IncludeComponent(
//							"bitrix:catalog.section",
//							"section_index",
//							array(
//								"ACTION_VARIABLE" => "action",
//								"ADD_PICT_PROP" => "-",
//								"ADD_PROPERTIES_TO_BASKET" => "Y",
//								"ADD_SECTIONS_CHAIN" => "N",
//								"AJAX_MODE" => "N",
//								"AJAX_OPTION_ADDITIONAL" => "",
//								"AJAX_OPTION_HISTORY" => "N",
//								"AJAX_OPTION_JUMP" => "N",
//								"AJAX_OPTION_STYLE" => "Y",
//								"BACKGROUND_IMAGE" => "-",
//								"BASKET_URL" => "/personal/basket.php",
//								"BROWSER_TITLE" => "-",
//								"CACHE_FILTER" => "N",
//								"CACHE_GROUPS" => "Y",
//								"CACHE_TIME" => "36000000",
//								"CACHE_TYPE" => "A",
//								"DETAIL_URL" => "",
//								"DISABLE_INIT_JS_IN_COMPONENT" => "N",
//								"DISPLAY_BOTTOM_PAGER" => "Y",
//								"DISPLAY_TOP_PAGER" => "N",
//								"ELEMENT_SORT_FIELD" => "sort",
//								"ELEMENT_SORT_FIELD2" => "id",
//								"ELEMENT_SORT_ORDER" => "asc",
//								"ELEMENT_SORT_ORDER2" => "desc",
//								"FILTER_NAME" => "arrFilter",
//								"IBLOCK_ID" => "3",
//								"IBLOCK_TYPE" => "webstudiosamovar_sushi",
//								"INCLUDE_SUBSECTIONS" => "Y",
//								"LABEL_PROP" => "-",
//								"LINE_ELEMENT_COUNT" => "3",
//								"MESSAGE_404" => "",
//								"MESS_BTN_ADD_TO_BASKET" => "В корзину",
//								"MESS_BTN_BUY" => "Купить",
//								"MESS_BTN_DETAIL" => "Подробнее",
//								"MESS_BTN_SUBSCRIBE" => "Подписаться",
//								"MESS_NOT_AVAILABLE" => "Нет в наличии",
//								"META_DESCRIPTION" => "-",
//								"META_KEYWORDS" => "-",
//								"OFFERS_LIMIT" => "5",
//								"PAGER_BASE_LINK_ENABLE" => "N",
//								"PAGER_DESC_NUMBERING" => "N",
//								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
//								"PAGER_SHOW_ALL" => "N",
//								"PAGER_SHOW_ALWAYS" => "N",
//								"PAGER_TEMPLATE" => ".default",
//								"PAGER_TITLE" => "Товары",
//								"PAGE_ELEMENT_COUNT" => "120",
//								"PARTIAL_PRODUCT_PROPERTIES" => "N",
//								"PRICE_CODE" => array(
//									0 => "PRICE",
//								),
//								"PRICE_VAT_INCLUDE" => "Y",
//								"PRODUCT_ID_VARIABLE" => "id",
//								"PRODUCT_PROPERTIES" => array(
//								),
//								"PRODUCT_PROPS_VARIABLE" => "prop",
//								"PRODUCT_QUANTITY_VARIABLE" => "",
//								"PROPERTY_CODE" => array(
//									0 => "ACTION",
//									1 => "RECOMMENDED",
//									2 => "OLD_PRICE",
//									3 => "HIT",
//									4 => "PRICE",
//									5 => "",
//								),
//								"SECTION_CODE" => "",
//								"SECTION_ID" => $_REQUEST["SECTION_ID"],
//								"SECTION_ID_VARIABLE" => "SECTION_ID",
//								"SECTION_URL" => "",
//								"SECTION_USER_FIELDS" => array(
//									0 => "",
//									1 => "",
//								),
//								"SEF_MODE" => "N",
//								"SET_BROWSER_TITLE" => "N",
//								"SET_LAST_MODIFIED" => "N",
//								"SET_META_DESCRIPTION" => "N",
//								"SET_META_KEYWORDS" => "N",
//								"SET_STATUS_404" => "N",
//								"SET_TITLE" => "N",
//								"SHOW_404" => "N",
//								"SHOW_ALL_WO_SECTION" => "Y",
//								"SHOW_PRICE_COUNT" => "1",
//								"TEMPLATE_THEME" => "blue",
//								"USE_MAIN_ELEMENT_SECTION" => "N",
//								"USE_PRICE_COUNT" => "N",
//								"USE_PRODUCT_QUANTITY" => "N",
//								"COMPONENT_TEMPLATE" => "section_index"
//							),
//							false
//						);?>
<!--					</div>-->
<!--				--><?//endif;?>
				<?

				$arFilter = Array('IBLOCK_ID'=>$iblock_id, 'ACTIVE'=>'Y');
				$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter, true);

				while($ar_result = $db_list->GetNext())
				{
					$section_id = $ar_result["ID"];
					//echo $section_id;
					?>
					<div class="tabs__content">
						<?$APPLICATION->IncludeComponent(
							"bitrix:catalog.section",
							"section_index",
							array(
								"ACTION_VARIABLE" => "action",
								"ADD_PICT_PROP" => "-",
								"ADD_PROPERTIES_TO_BASKET" => "Y",
								"ADD_SECTIONS_CHAIN" => "N",
								"AJAX_MODE" => "N",
								"AJAX_OPTION_ADDITIONAL" => "",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"BACKGROUND_IMAGE" => "-",
								"BASKET_URL" => "/personal/basket.php",
								"BROWSER_TITLE" => "-",
								"CACHE_FILTER" => "N",
								"CACHE_GROUPS" => "Y",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "A",
								"DETAIL_URL" => "",
								"DISABLE_INIT_JS_IN_COMPONENT" => "N",
								"DISPLAY_BOTTOM_PAGER" => "Y",
								"DISPLAY_TOP_PAGER" => "N",
								"ELEMENT_SORT_FIELD" => "sort",
								"ELEMENT_SORT_FIELD2" => "id",
								"ELEMENT_SORT_ORDER" => "asc",
								"ELEMENT_SORT_ORDER2" => "desc",
								"FILTER_NAME" => "arrFilter22",
								"IBLOCK_ID" => "3",
								"IBLOCK_TYPE" => "webstudiosamovar_sushi",
								"INCLUDE_SUBSECTIONS" => "Y",
								"LABEL_PROP" => "-",
								"LINE_ELEMENT_COUNT" => "3",
								"MESSAGE_404" => "",
								"MESS_BTN_ADD_TO_BASKET" => "В корзину",
								"MESS_BTN_BUY" => "Купить",
								"MESS_BTN_DETAIL" => "Подробнее",
								"MESS_BTN_SUBSCRIBE" => "Подписаться",
								"MESS_NOT_AVAILABLE" => "Нет в наличии",
								"META_DESCRIPTION" => "-",
								"META_KEYWORDS" => "-",
								"OFFERS_LIMIT" => "5",
								"PAGER_BASE_LINK_ENABLE" => "N",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_TEMPLATE" => ".default",
								"PAGER_TITLE" => "Товары",
								"PAGE_ELEMENT_COUNT" => "120",
								"PARTIAL_PRODUCT_PROPERTIES" => "N",
								"PRICE_CODE" => array(
								),
								"PRICE_VAT_INCLUDE" => "Y",
								"PRODUCT_ID_VARIABLE" => "id",
								"PRODUCT_PROPERTIES" => array(
								),
								"PRODUCT_PROPS_VARIABLE" => "prop",
								"PRODUCT_QUANTITY_VARIABLE" => "",
								"PROPERTY_CODE" => array(
									0 => "ACTION",
									1 => "RECOMMENDED",
									2 => "OLD_PRICE",
									3 => "HIT",
									4 => "PRICE",
									5 => "",
								),
								"SECTION_CODE" => "",
								"SECTION_ID" => $section_id,
								"SECTION_ID_VARIABLE" => "SECTION_ID",
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array(
									0 => "",
									1 => "",
								),
								"SEF_MODE" => "N",
								"SET_BROWSER_TITLE" => "N",
								"SET_LAST_MODIFIED" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_STATUS_404" => "N",
								"SET_TITLE" => "N",
								"SHOW_404" => "N",
								"SHOW_ALL_WO_SECTION" => "Y",
								"SHOW_PRICE_COUNT" => "1",
								"TEMPLATE_THEME" => "blue",
								"USE_MAIN_ELEMENT_SECTION" => "N",
								"USE_PRICE_COUNT" => "N",
								"USE_PRODUCT_QUANTITY" => "N",
								"COMPONENT_TEMPLATE" => "section_index"
							),
							false
						);?>
					</div>
				<?  }

				?>



			</div><!-- .tabs -->





		</div>
	</div>

	<div class="about_company">
		<div class="about_company_center">

			<h1>
				<?$APPLICATION->IncludeFile(SITE_DIR."include/index/about_company.php", Array(), Array("MODE" => "html","NAME" => ""));?>
			</h1>

			<div class="logo">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/header/logo-black.php"
					)
				);?>
			</div>

			<div>
				<?$APPLICATION->IncludeFile(SITE_DIR."include/index/about_company_text.php", Array(), Array("MODE" => "html","NAME" => ""));?>
			</div>

			<div class="delivery-restaurant">
				<p>Доставка из ресторана:</p>
				<img src="<?=SITE_TEMPLATE_PATH?>/css/themes/images/logo-mama-roma.png" alt="logo Mama Roma">
			</div>

		</div>
	</div>

	<div class="clear"></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>