<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?
session_start();
 
/*CModule::IncludeModule("iblock");
  
 //echo 1;
 //узнаем цену товара и умножим на количество
 $arSelect = Array("ID", "NAME", "PROPERTY_PRICE");
$arFilter = Array("IBLOCK_ID"=>11, "ID"=>$_REQUEST["ID"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 $price = $arFields["PROPERTY_PRICE_VALUE"]*$_REQUEST["QUANTITY"];
 echo $price;
}*/
CModule::IncludeModule("iblock");
						
						 //узнаем цену товара и умножим на количество
						 $arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PREVIEW_PICTURE", "PROPERTY_PRICE_FOR_SMALL_PIZZA", "PROPERTY_ACTION", "PROPERTY_DISCOUNT");
						$arFilter = Array("IBLOCK_ID"=>3, "ID"=>$_REQUEST["ID"], "ACTIVE"=>"Y");
						$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
						$price = 0;
						$count = 0;
						$all_price = 0;
						$price_product = 0;
						$i = 0;
						while($ob = $res->GetNextElement())
						{
						 $arFields = $ob->GetFields();
						 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0){
							$i++;
							if (empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
									 $price_product = $arFields["PROPERTY_PRICE_VALUE"];
		 
										 //если товар в акции и со скидкой, меняем его цену
										 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
											 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
											$price_product = $price_product - $discount_summ;
										 }
								$price = $price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
							}else{
								
								//  $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
							//	$summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
								
								 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"]){
									 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
								 }else{
									 //значит добавлена большая пицца
									  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
								 }
								// $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
		 
									 //если товар в акции и со скидкой, меняем его цену
									 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
										 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
										$price_product = $price_product - $discount_summ;
									 }
		 
								$price = $price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
							}
							
							$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1]; 
						
						 }
						}
						echo $price;
?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>