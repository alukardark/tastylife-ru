<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 
<?	
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PREVIEW_PICTURE", "PROPERTY_ACTION", "PROPERTY_DISCOUNT");
	$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$count = 0;
	while($ob = $res->GetNextElement())
	{
		 $arFields = $ob->GetFields();
		 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0){
			$count++;
			 $price_product = $arFields["PROPERTY_PRICE_VALUE"];
		 
				 //если товар в акции и со скидкой, меняем его цену
				 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
					 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
					$price_product = $price_product - $discount_summ;
				 }
		 }
	}
?>
<?
	session_start();
	$summ_product = $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][2];
	$all_summ_itogo = intval($_REQUEST["ITOGO"]) - intval($summ_product);
	$arr = array(0, 0, 0, 0);
	$_SESSION['product_in_cart_id'.$_REQUEST["ID"].''] = $arr;
	echo $all_summ_itogo;
?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>