<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?><?$APPLICATION->IncludeComponent(
	"remstroy:cart.result",
	"cart",
	Array(
		"ACTION_VARIABLE" => "action",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"COMPONENT_TEMPLATE" => "cart",
		"DETAIL_URL" => "",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"FIELD_CODE" => array(),
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "webstudiosamovar_sushi",
		"NAME" => "CATALOG_CART_LIST",
		"PRICE_CODE" => array(0=>"PRICE",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PROPERTY_CODE" => array(0=>"PRICE",1=>"PREVIEW_PICTURE",2=>"",),
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_PRICE_COUNT" => "N"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>