<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?

CModule::IncludeModule("iblock");


$arSelect = Array("ID", "NAME", "PROPERTY_PROCENT", "PROPERTY_CODE");
$arFilter = Array("IBLOCK_ID"=>4, "ACTIVE"=>"Y", "PROPERTY_CODE"=>intval($_REQUEST["promo_kod"]));
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$price = 0;
while($ob = $res->GetNextElement())
{
	 $arFields = $ob->GetFields();
	 $procent_value = $arFields["PROPERTY_PROCENT_VALUE"];
}
if ($procent_value > 0){
	echo $procent_value;
}else{
	echo 0;
}

?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>