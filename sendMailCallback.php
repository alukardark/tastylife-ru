<?
define("NO_KEEP_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?
if(SITE_CHARSET=="windows-1251")
{
	$_REQUEST["name"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["name"]);
	$_REQUEST["description"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["description"]);
	$_REQUEST["phone"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["phone"]);
	$_REQUEST["email_from"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["email_from"]);
	$_REQUEST["p_name"] = iconv("UTF-8", "WINDOWS-1251", $_REQUEST["p_name"]);
}
$arEventFields = array(
	"AUTHOR" => $_REQUEST["name"],
	"AUTHOR_PHONE" => $_REQUEST["phone"],
	"AUTHOR_EMAIL"   => $_REQUEST["email"],
	"TEXT"   => $_REQUEST["description"],
	"NAME_SERVICE"   => $_REQUEST["p_name"],
	
	"EMAIL_TO"   => COption::GetOptionString("main", "email_from"),
);
$arFields = CEvent::SendImmediate("FEEDBACK_FORM", "s1", $arEventFields, "Y", $_REQUEST["event_message_id"]);

if (CModule::IncludeModule("iblock")):
	$el = new CIBlockElement;
	$PROP = array(
		"NAME"    =>  $arEventFields["AUTHOR"],
		"PHONE"    =>  $arEventFields["AUTHOR_PHONE"],
	);
	$arLoadProductArray = Array(
		"CODE"    => mt_rand(),
		"ACTIVE_FROM"    => "",
		"IBLOCK_SECTION_ID" => "",
		"IBLOCK_ID"      => 9,
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => $PROP['NAME'],
		"ACTIVE"         => "N",
		"PREVIEW_TEXT"   => $arFields["TEXT"],
		"DETAIL_TEXT"    => ""
	);
	$PRODUCT_ID = $el->Add($arLoadProductArray);
endif;
?>