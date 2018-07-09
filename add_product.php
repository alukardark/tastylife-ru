<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 



<?

//добавление товара в корзину
if ($_REQUEST["BUY"] == 1):

session_start();
$_SESSION["new_order"] = 1;
//получаем текущее количество товара в сессии
if ($_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][1] > 0){
	//если товар уже есть в сессии
	
	//получаем текущее количества товара в сессии
	$quantity = $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][1];
	
	//добавляем количество указанное в инпуте к текущему количеству в сессии
	$quantity = $quantity + $_REQUEST["QUANTITY"];
	
	//строим массив из Id Товара количества цены и наименования
 $arr = array($_REQUEST["ID"], $quantity, $_REQUEST["PRICE"], $_REQUEST["NAME"], $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][4]);
//	
	$_SESSION['product_in_cart_id'.$_REQUEST["ID"].''] = $arr;

	//тут мы перебираем все товары инфоблока и сравниваем их с товарами в тек. сессии и выдергиваем цены текущие
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PROPERTY_PRICE_FOR_SMALL_PIZZA", "PROPERTY_DISCOUNT", "PROPERTY_ACTION");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$price = 0;
	$count = 0;
	$all_price = 0;
	$price_product = 0;
	while($ob = $res->GetNextElement())
	{
	 $arFields = $ob->GetFields();
	 
	 
	 
	 //тут товар смотрим, если он не пицца большая или мальенкая
	 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
		 
		 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][2] < $arFields["PROPERTY_PRICE_VALUE"]){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
		 
		 
		//получаем цену товара и скалывадем ее
		$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	//	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	 }
	 
	 
	 
	 
	  //тут товар смотрим, если он пицца большая или мальенкая
	 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && !empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
		 //получаем цену товара и скалывадем ее
		 
		 //если товар со скидкой, то считаем по новой цене со скидкой
		 //if ($arFields["PROPERTY_DISCOUNT_VALUE"] > 0){
			 
		// }else{}
	//	 $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
	//	$summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
		
		 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"] ){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
		 
		 
		$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
		//$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	 }
	}
 
		//echo 2;
}else{
	//если товар новый и его нет в сессии
	
	//количество указанное в поле инпута при добавлении товара в корзину
	$quantity = $_REQUEST["QUANTITY"];
	//строим массив из Id Товара количества цены и наименования
	
	$arr = array($_REQUEST["ID"], $quantity, $_REQUEST["PRICE"], $_REQUEST["NAME"], $_REQUEST["PRICE_PRODUCT"]);
	//записываем массив в сессию
	$_SESSION['product_in_cart_id'.$_REQUEST["ID"].''] = $arr;
	//тут мы перебираем все товары инфоблока и сравниваем их с товарами в тек. сессии и выдергиваем цены текущие
	CModule::IncludeModule("iblock");
	$discount_price = 0;
	$arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PROPERTY_PRICE_FOR_SMALL_PIZZA", "PROPERTY_DISCOUNT", "PROPERTY_ACTION");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$price = 0;
	$count = 0;
	$all_price = 0;
	$price_product = 0;
	while($ob = $res->GetNextElement())
	{
	 $arFields = $ob->GetFields();
	
	 
	
	 
	 
	 //тут товар смотрим, если он не пицца большая или мальенкая
	 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
		 
		  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
		  //костыли
		//  $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $_SESSION['product_in_cart_id'.$arFields["ID"].''][2];
		//  $summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
		/*  if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][2] < $arFields["PROPERTY_PRICE_VALUE"]){
				 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
			 }else{
				 //значит добавлена большая пицца
				  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
			 }*/
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
		 
		//получаем цену товара и скалывадем ее
		$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
		
	//	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	 }
	  //тут товар смотрим, если он пицца большая или мальенкая
	 
		 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && !empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
			 //получаем цену товара и скалывадем ее
			//  $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
		//  $summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
			  if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"] ){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
			 
			 //если товар в акции и со скидкой, меняем его цену
			 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
				 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
				$price_product = $price_product - $discount_summ;
			 }
			 
			 
			$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
			
			//$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
		 }
	}
}
 



	
 


//$quantity = intval($count) + intval($quantity);

$result = $all_price;
echo str_replace(" ","",$result);

endif;





//увеличение количества товара в корзине
if ($_REQUEST["PLUS"] == 1):

session_start();
//получаем текущее количество товара в сессии
if ($_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][1] > 0){
	$quantity = $_REQUEST["QUANTITY"];
}else{
	$quantity = $_REQUEST["QUANTITY"];
}
 


 $arr = array($_REQUEST["ID"], $quantity, $_REQUEST["PRICE"], $_REQUEST["NAME"], $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][4]);
CModule::IncludeModule("iblock");
  $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''] = $arr;


$arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PROPERTY_PRICE_FOR_SMALL_PIZZA", "PROPERTY_ACTION", "PROPERTY_DISCOUNT");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$price = 0;
$count = 0;
$all_price = 0;
$price_product = 0;
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
	 
	   if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][2] < $arFields["PROPERTY_PRICE_VALUE"]){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
		 
		 
	$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
 }
 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && !empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
	 
	 
	 // $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
			//					$summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
	 
	    if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"]  ){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
		 
		 
		 
	$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
 }
	
 
}
$result = $all_price;
echo str_replace(" ","",$result);

endif;





//уменьшение количества в корзине
if ($_REQUEST["MINUS"] == 1):

session_start();
//получаем текущее количество товара в сессии
if ($_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][1] > 0){
	$quantity = $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][1] -1;
}else{
	$quantity = $_REQUEST["QUANTITY"];
}
 


 $arr = array($_REQUEST["ID"], $quantity, $_REQUEST["PRICE"], $_REQUEST["NAME"], $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''][4]);
CModule::IncludeModule("iblock");
  $_SESSION['product_in_cart_id'.$_REQUEST["ID"].''] = $arr;


$arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PROPERTY_ACTION", "PROPERTY_DISCOUNT", "PROPERTY_PRICE_FOR_SMALL_PIZZA");
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$price = 0;
$count = 0;
$all_price = 0;
$price_product = 0;
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
	 
	   if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][2] < $arFields["PROPERTY_PRICE_VALUE"]){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
	$all_price = $all_price + $price_product *$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
	
//	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
 }
 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0 && !empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
	 
	//   $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
	//	$summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
	 
	   if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"]  ){
					 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
				 }else{
					 //значит добавлена большая пицца
					  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
				 }
		 
		 //если товар в акции и со скидкой, меняем его цену
		 if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
			 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
			$price_product = $price_product - $discount_summ;
		 }
	 
	$all_price = $all_price + $price_product*$_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
//	$count = $count + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
 }
	
 
}
$result = $all_price;
//echo $result;
echo str_replace(" ","",$result);
//echo $count;

endif;
?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>