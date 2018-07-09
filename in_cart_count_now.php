<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?
session_start();
 
CModule::IncludeModule("iblock");
						
	 //узнаем цену товара и умножим на количество
	 $arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PREVIEW_PICTURE", "PROPERTY_PRICE_FOR_SMALL_PIZZA");
	$arFilter = Array("IBLOCK_ID"=>3,  "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$price = 0;
	$count = 0;
	$all_price = 0;
	$i = 0;
	while($ob = $res->GetNextElement())
	{
	 $arFields = $ob->GetFields();
	 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0){
		$i++;
		$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1]; 
	
	 }
	}
	echo $count;
?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>