<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?
session_start();
if (CModule::IncludeModule("iblock")):
	
			

?>

		<div>
			<div class="products" id="products_list_cart" >
				<?	 $arSelect = Array("ID", "NAME", "PROPERTY_PRICE", "PREVIEW_PICTURE", "PROPERTY_PRICE_FOR_SMALL_PIZZA", "PROPERTY_DISCOUNT", "PROPERTY_ACTION");
						$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE"=>"Y");
						$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
						
						while($ob = $res->GetNextElement())
						{
						 $arFields = $ob->GetFields();
						 $count_product = 0;
						$price_product = 0;
						$small_pizza_text = "";
						 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][0] > 0){
							 
							 $name_product = $arFields["NAME"];
							 	 $count_product = $count_product + $_SESSION['product_in_cart_id'.$arFields["ID"].''][1];
								 
							 
							 
								 if (empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
									 $price_product = $arFields["PROPERTY_PRICE_VALUE"];
								 }
							 //если маленькая пицца
							 if (!empty($arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"])){
								 //проверяем какая пицца выбрана
							 //если цена в сесси меньше основной, значит пицца выбрана маленькая
							 // $summ_product_small = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
							//$summ_product_big = $_SESSION['product_in_cart_id'.$arFields["ID"].''][1] * $arFields["PROPERTY_PRICE_VALUE"];
								 if ($_SESSION['product_in_cart_id'.$arFields["ID"].''][4] < $arFields["PROPERTY_PRICE_VALUE"] && $summ_product_small < $summ_product_big){
									 $price_product = $arFields["PROPERTY_PRICE_FOR_SMALL_PIZZA_VALUE"];
								 }else{
									 //значит добавлена большая пицца
									  $price_product = $arFields["PROPERTY_PRICE_VALUE"];
								 }
									
							 }
								 
								 //$small_pizza_text = "";
							
							 
							 	if (!empty($arFields["PROPERTY_DISCOUNT_VALUE"])){
									 $discount_summ = $price_product * $arFields["PROPERTY_DISCOUNT_VALUE"] / 100;
									$price_product = $price_product - $discount_summ;
								 }
							 
							 
						 
							// if ($)
							 ?>
							<span id="product<?=$arFields["ID"]?>">
							<div class="clear"></div>
								<div class="product" >
								
										<img src="<?=CFile::GetPath($arFields["PREVIEW_PICTURE"]);?>" width="85" height="79">
									
									<table>
										<tr class="name_table_cart">
											<td>
											<span class="name"><?=$name_product?><?=$small_pizza_text?></span>
											</td>
										</tr>
										<tr class="name_table_cart">
											<td>
												<span class="minus_cart"  p_product_id="<?=$arFields["ID"]?>" p_id="#number_id<?=$arFields["ID"]?>" p_price="<?=$price_product?>"></span>
												<span class="number" id="number_id<?=$arFields["ID"]?>"><?=$_SESSION['product_in_cart_id'.$arFields["ID"].''][1]?></span>
												<span class="plus_cart" p_product_id="<?=$arFields["ID"]?>" p_id="#number_id<?=$arFields["ID"]?>" p_price="<?=$price_product?>"></span>
												<span class="price" style="margin-right: 0px !important;"><?=$price_product?><del><span >Р<?//=GetMessage("ORDER_VAL_RUB_TEXT")?></span></del> за шт.</span> 
												<span class="price all_price_product" ><?=$count_product * $price_product?><del><span >Р<?//=GetMessage("ORDER_VAL_RUB_TEXT")?></span></del></span> 	
										
												<span class="del_product" p_id="#product<?=$arFields["ID"]?>" p_product_id="<?=$arFields["ID"]?>"></span>
												</td>
									</tr>
									</table>	
									
								<div class="clear"></div>	
								</div>
							</span>

						
				<?		 }
						}
				?>
			</div>
		</div>	
		
		
<?		 
		
endif;			
?>

<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>