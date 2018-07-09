<?
require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent(
	"remstroy:cart.add",
	"cart",
	array(
		"IBLOCK_TYPE" => "webstudiosamovar_sushi", //Сюда ваш тип инфоблока каталога
		"IBLOCK_ID" => "3", //Сюда ваш ID инфоблока каталога
		"POSITION_FIXED" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"DETAIL_URL" => "#SECTION_CODE#",
		"COMPARE_URL" => SITE_DIR."cart/",
		"NAME" => "CATALOG_CART_LIST",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false
);

?>
