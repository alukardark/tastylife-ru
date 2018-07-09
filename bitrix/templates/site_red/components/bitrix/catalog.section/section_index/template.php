<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();$this->setFrameMode(true);?>
<div class="products_index">

	<?
	$linkedItems = [];
	foreach($arResult["ITEMS"] as $arItem):
		$linkedItems[$arItem['ID']]  = $arItem;
	endforeach;
	?>



	<?$i=0;foreach($arResult["ITEMS"] as $arItem): ?>
	<? //if($USER->IsAdmin()) {echo '<pre>'; print_r($arItem); echo '</pre>';} ?>
	<?
	//print_r($arItem["PROPERTIES"]["HIT"]);
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	//s($arItem);
	$img_product_preview = CFile::ResizeImageGet(
		$arItem["PREVIEW_PICTURE"]["ID"],
//		array("width"=>"250","height"=>"250"),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		false,  $arFilters = Array()
	);
	if(!$img_product_preview["src"]){
		$img_product_preview["src"] = $this->GetFolder().'/images/no_photo.png';
	}


	$img_product = CFile::ResizeImageGet(
		$arItem["DETAIL_PICTURE"]["ID"],
		array("width"=>"330","height"=>"320"),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		false,  $arFilters = Array()
	);
	$i++;
	?>

	<div class="services_element">
		<div class="popup-with-order" id="hidden-content-<?=$arItem['ID']?>">
			<div class="popup-header">
				<div class="popup-title"><i class="fa fa-check"></i><p><?=$arItem['NAME']?> в корзине!</p></div>
			</div>
			<div class="popup-descr">С этим блюдом заказывают:</div>
			<div class="services_element_slick">
				<?
				foreach ($arItem['DISPLAY_PROPERTIES']['WITH_ORDER']['VALUE'] as $key_with_order):
					$with_order_summ = $linkedItems[$key_with_order]['PROPERTIES']['PRICE']['VALUE'] * $linkedItems[$key_with_order]['PROPERTIES']['DISCOUNT']['VALUE'] / 100;
					$with_order_price = $linkedItems[$key_with_order]['PROPERTIES']['PRICE']['VALUE'] - $with_order_summ;
//				$linkedItems[$key_with_order]["ID"] = $linkedItems[$key_with_order]["ID"]*1050;
//				print_r($linkedItems[$key_with_order]["ID"]);
					?>
					<div class="services_element">
						<div class="product">
							<div class="preview_img">
								<?if($linkedItems[$key_with_order]['PREVIEW_PICTURE']['SRC'] != $this->GetFolder().'/images/no_photo.png'){?>
<!--									<a href="--><?//=$linkedItems[$key_with_order]['PREVIEW_PICTURE']['SRC']?><!--">-->
										<span>
											<div class="preview_img_new_style" style='background: url(<?=$linkedItems[$key_with_order]['PREVIEW_PICTURE']['SRC']?>) center/cover no-repeat'></div>
										</span>
<!--									</a>-->
								<?}else{?>
									<span>
										<div class="preview_img_new_style" style='background: url(<?=$linkedItems[$key_with_order]['PREVIEW_PICTURE']['SRC']?>) center/cover no-repeat'></div>
									</span>
								<?}?>
							</div>
							<p class="name"><?=$linkedItems[$key_with_order]['NAME']?></p>
							<div class="preview" title="<?=$linkedItems[$key_with_order]['PREVIEW_TEXT']?>">
								<?=$linkedItems[$key_with_order]['PREVIEW_TEXT']?>
							</div>

							<?if($linkedItems[$key_with_order]['PROPERTIES']['DISCOUNT']['VALUE']){?>
								<span class="oldprice">
								<span class="old_price_product"><?=$linkedItems[$key_with_order]['PROPERTIES']['PRICE']['VALUE']?></span><span> р.</span>
							</span>
							<?}?>

							<p class="price">
								<span class="price_product<?=$linkedItems[$key_with_order]["ID"]?>"><?=$with_order_price?></span>
								<span> р.</span>
							</p>
							<div class="count">
								<?if (!empty($linkedItems[$key_with_order]["PROPERTIES"]["DISCOUNT"]["VALUE"])){?>
									<span p_price="<?=$with_order_price;?>"
										  p_old_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>" p_id_old_price_product=".old_price_product<?=$linkedItems[$key_with_order]["ID"]?>"
										  p_id_price_product=".price_product<?=$linkedItems[$key_with_order]["ID"]?>" p_btn_buy=".button_buy<?=$linkedItems[$key_with_order]["ID"]?>" class="minus" p_id=".number<?=$linkedItems[$key_with_order]["ID"]?>">
							</span>

									<span class="number<?=$linkedItems[$key_with_order]["ID"]?> number" id="count<?=$linkedItems[$key_with_order]["ID"]?>">1</span>

									<span class="plus" p_id_price_product=".price_product<?=$linkedItems[$key_with_order]["ID"]?>"  p_id_old_price_product=".old_price_product<?=$linkedItems[$key_with_order]["ID"]?>" p_id=".number<?=$linkedItems[$key_with_order]["ID"]?>"
										  p_old_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>" p_btn_buy=".button_buy<?=$linkedItems[$key_with_order]["ID"]?>" p_price="<?=$with_order_price;?>">
							</span>

									<span class="button_buy button_buy<?=$linkedItems[$key_with_order]["ID"]?>" p_buy=1 id="" p_id="<?=$linkedItems[$key_with_order]["ID"]?>" p_name="<?=$linkedItems[$key_with_order]["NAME"]?>"
										  p_price="<?=$with_order_price;?>" p_count="1"><?=GetMessage("BTN_BUY")?>
							</span>
								<?}else{?>
									<span p_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>"
										  p_old_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>" p_id_old_price_product=".old_price_product<?=$linkedItems[$key_with_order]["ID"]?>"
										  p_id_price_product=".price_product<?=$linkedItems[$key_with_order]["ID"]?>" p_btn_buy=".button_buy<?=$linkedItems[$key_with_order]["ID"]?>" class="minus" p_id=".number<?=$linkedItems[$key_with_order]["ID"]?>"></span>

									<span class="number<?=$linkedItems[$key_with_order]["ID"]?> number" id="count<?=$linkedItems[$key_with_order]["ID"]?>">1</span>

									<span class="plus" p_id_price_product=".price_product<?=$linkedItems[$key_with_order]["ID"]?>"  p_id_old_price_product=".old_price_product<?=$linkedItems[$key_with_order]["ID"]?>" p_id=".number<?=$linkedItems[$key_with_order]["ID"]?>"
										  p_old_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>" p_btn_buy=".button_buy<?=$linkedItems[$key_with_order]["ID"]?>" p_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>"></span>


									<span class="button_buy button_buy<?=$linkedItems[$key_with_order]["ID"]?>" p_buy=1 id="" p_id="<?=$linkedItems[$key_with_order]["ID"]?>" p_name="<?=$linkedItems[$key_with_order]["NAME"]?>"
										  p_price="<?=$linkedItems[$key_with_order]["PROPERTIES"]["PRICE"]["VALUE"];?>" p_count="1"><?=GetMessage("BTN_BUY")?></span>

								<?}?>
							</div>
						</div>
					</div>
					<?
				endforeach;
				?>
			</div>
			<div class="popup-close" data-fancybox-close>Продолжить покупки</div>
			<a href="/cart/" class="btn btn-default btn-lg  mobile_btn_order link-in-cart">Перейти в корзину</a>

		</div>

		<?if ($arItem["PROPERTIES"]["HIT"]["VALUE"] == GetMessage("Da")):?>
			<div class="hit"></div>
		<?endif;?>
		<?if ($arItem["PROPERTIES"]["ACTION"]["VALUE"] == GetMessage("Da")):?>
			<div class="action2"></div>
		<?endif;?>
		<?if ($arItem["PROPERTIES"]["RECOMMENDED"]["VALUE"] == GetMessage("Da")):?>
			<div class="recomended"></div>
		<?endif;?>

		<div class="product">
			<div class="preview_img">
				<?if($img_product_preview["src"] != $this->GetFolder().'/images/no_photo.png'){?>
<!--					<a href="--><?//=$img_product_preview["src"]?><!--">-->
					<span>
						<!--<img src="--><?//=$img_product_preview["src"]?><!----><?////=$arItem["PREVIEW_PICTURE"]["SRC"];?><!--" alt="--><?//=$arItem["NAME"];?><!--"  />-->
						<div class="preview_img_new_style" style='background: url(<?=$img_product_preview["src"]?>) center/cover no-repeat'></div>
					</span>
<!--					</a>-->
				<?}else{?>
					<span>
						<div class="preview_img_new_style" style='background: url(<?=$img_product_preview["src"]?>) center/cover no-repeat'></div>
					</span>
				<?}?>
			</div>
			<?
			$style = "";
			if ($i <= 3){
				$style="top: -85px !important; ";
			}
			?>
			<div class="mask mask-show"  p_class=".zoom-zoom-kolya-heiter<?=$arItem["ID"]?>"></div>
			<!--<span class="link"><i class="fa fa-link"></i></span>-->
			<p class="name"><?=$arItem["NAME"];?></p>
			<div class="preview" title="<?=strip_tags($arItem["PREVIEW_TEXT"]);?>"><?=TruncateText($arItem["~PREVIEW_TEXT"], 80);?></div>
			<p class="view">
				<?
				//discount_price
				if (!empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])){
					$discount_summ = $arItem["PROPERTIES"]["PRICE"]["VALUE"] * $arItem["PROPERTIES"]["DISCOUNT"]["VALUE"] / 100;
					$discount_summ_option = $arItem["PROPERTIES"]["PRICE"]["VALUE"] - $discount_summ;

					$discount_summ = $arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"] * $arItem["PROPERTIES"]["DISCOUNT"]["VALUE"] / 100;
					$discount_summ_for_small_pizza_option = $arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"] - $discount_summ;
				}
				?>
				<?if ($arItem["PROPERTIES"]["TYPE_PRODUCT"]["VALUE"] == GetMessage("NAME_PIZZA") && !empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])){?>

					<select class="select_view_pizza" p_id="<?=$arItem["ID"]?>" p_small_price="<?=$arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"]?>"
							p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?>" name="price_product<?=$arItem["ID"]?>">
						<option><?=GetMessage("SELECT_PIZZA")?></option>
						<option view="small" value="<?=$discount_summ_for_small_pizza_option?>" p_old_price="<?=$arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"]?>"><?=GetMessage("SMALL_PIZZA")?></option>
						<option value="<?=$discount_summ_option?>" p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?>"><?=GetMessage("BIG_PIZZA")?></option></select>
					<span class="show_msg_razmer_pizza show_msg_razmer_pizza<?=$arItem["ID"]?>" ><?=GetMessage("MSG_SELECT_PIZZA")?></span>

				<?}elseif ($arItem["PROPERTIES"]["TYPE_PRODUCT"]["VALUE"] == GetMessage("NAME_PIZZA") && empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])){?>

					<select class="select_view_pizza" p_id="<?=$arItem["ID"]?>" p_small_price="<?=$arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"]?>"
							p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"]?>" name="price_product<?=$arItem["ID"]?>">
						<option><?=GetMessage("SELECT_PIZZA")?></option>
						<option view="small" value="<?=$arItem["PROPERTIES"]["PRICE_FOR_SMALL_PIZZA"]["VALUE"]?>"><?=GetMessage("SMALL_PIZZA")?></option>
						<option value="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>"><?=GetMessage("BIG_PIZZA")?></option></select>
					<span class="show_msg_razmer_pizza show_msg_razmer_pizza<?=$arItem["ID"]?>" ><?=GetMessage("MSG_SELECT_PIZZA")?></span>

				<?}?>
			</p>
			<?
			$discount_price = 0;
			if (!empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])){
				$discount_summ = $arItem["PROPERTIES"]["PRICE"]["VALUE"] * $arItem["PROPERTIES"]["DISCOUNT"]["VALUE"] / 100;
				$discount_price = $arItem["PROPERTIES"]["PRICE"]["VALUE"] - $discount_summ;?>
				<span class="oldprice" ><span class="old_price_product<?=$arItem["ID"]?>"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?></span>
				<span ><?=GetMessage("RUB")?></span></span></p>
				<p class="price"><span class="price_product<?=$arItem["ID"]?>"><?=$discount_price?></span><span ><?=GetMessage("RUB")?></span>


			<?}else{?>
				<p class="price"><span class="price_product<?=$arItem["ID"]?>"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?></span><span ><?=GetMessage("RUB")?></span></p>
			<?}?>
			<?
			//can buy if product pizza
			if ($arItem["PROPERTIES"]["TYPE_PRODUCT"]["VALUE"] == GetMessage("NAME_PIZZA")){
				$buy = 0;
			}else{
				$buy = 1;
			}

			?>
			<div class="count">
				<?
				if (!empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"])){
				//$arItem["PROPERTIES"]["PRICE"]["VALUE"] = $discount_price;


				?>
				<span p_price="<?=$discount_price;?>"
					  p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>"
					  p_id_price_product=".price_product<?=$arItem["ID"]?>" p_btn_buy=".button_buy<?=$arItem["ID"]?>" class="minus" p_id=".number<?=$arItem["ID"]?>"></span>

				<span class="number<?=$arItem["ID"]?> number" id="count<?=$arItem["ID"]?>">1</span>

				<span class="plus" p_id_price_product=".price_product<?=$arItem["ID"]?>"  p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>" p_id=".number<?=$arItem["ID"]?>"
					  p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_btn_buy=".button_buy<?=$arItem["ID"]?>" p_price="<?=$discount_price;?>"></span>

				<a <?if($arItem['DISPLAY_PROPERTIES']['WITH_ORDER']){?> data-fancybox <?}?> data-src="#hidden-content-<?=$arItem['ID']?>" href="javascript:;" class="button_buy button_buy<?=$arItem["ID"]?>" p_buy=<?=$buy?> id="" p_id="<?=$arItem["ID"]?>" p_name="<?=$arItem["NAME"]?>"
																							p_price="<?=$discount_price;?>" p_count="1"><?=GetMessage("BTN_BUY")?></a></div>

			<?}else{?>

			<span p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>"
				  p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>"
				  p_id_price_product=".price_product<?=$arItem["ID"]?>" p_btn_buy=".button_buy<?=$arItem["ID"]?>" class="minus" p_id=".number<?=$arItem["ID"]?>"></span>

			<span class="number<?=$arItem["ID"]?> number" id="count<?=$arItem["ID"]?>">1</span>

					<span class="plus" p_id_price_product=".price_product<?=$arItem["ID"]?>"  p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>" p_id=".number<?=$arItem["ID"]?>"
						  p_old_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_btn_buy=".button_buy<?=$arItem["ID"]?>" p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>"></span>


			<a <?if($arItem['DISPLAY_PROPERTIES']['WITH_ORDER']){?> data-fancybox <?}?> data-src="#hidden-content-<?=$arItem['ID']?>" href="javascript:;" class="button_buy button_buy<?=$arItem["ID"]?>" p_buy=<?=$buy?> id="" p_id="<?=$arItem["ID"]?>" p_name="<?=$arItem["NAME"]?>"
																						p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_count="1"><?=GetMessage("BTN_BUY")?></a></div>

	<?}?>



		<?// ($i == 1):?>
		<div style="<?=$style?>" class="zoom tovar_zoom animate zoom-zoom-kolya-heiter<?=$arItem["ID"]?>">
			<div class="pic" >
				<img src="<?=$img_product["src"];?>" alt="<?=$arItem["NAME"];?>" title="<?=$arItem["NAME"];?>">


			</div>
			<div class="mask mask-zoom" p_class=".zoom-zoom-kolya-heiter<?=$arItem["ID"]?>"></div>
			<!--<span class="link"><i class="fa fa-link"></i></span>-->
			<p class="name"><?=$arItem["NAME"];?></p>
			<div class="preview" title="<?=strip_tags($arItem["PREVIEW_TEXT"]);?>"><?=$arItem["~PREVIEW_TEXT"];?></div>
			<div class="view" style="display: none">

				<?if ($arItem["PROPERTIES"]["TYPE_PRODUCT"]["VALUE"] == GetMessage("NAME_PIZZA")):?>
					<select><option ><?=GetMessage("SELECT_PIZZA")?></option><option><?=GetMessage("SMALL_PIZZA")?></option><option><?=GetMessage("BIG_PIZZA")?></option></select>
					<span  class="show_msg_razmer_pizza show_msg_razmer_pizza<?=$arItem["ID"]?>" ><?=GetMessage("MSG_SELECT_PIZZA")?></span>
				<?endif;?>
			</div>
			<?if (!empty($arItem["PROPERTIES"]["DISCOUNT"]["VALUE"]) ){
				$discount_summ = $arItem["PROPERTIES"]["PRICE"]["VALUE"] * $arItem["PROPERTIES"]["DISCOUNT"]["VALUE"] / 100;$discount_price = $arItem["PROPERTIES"]["PRICE"]["VALUE"] - $discount_summ;?>
				<span class="oldprice" ><span class="old_price_product<?=$arItem["ID"]?>"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?></span>
						<span ><?=GetMessage("RUB")?></span></span></p>
				<p class="price"><span class="price_product<?=$arItem["ID"]?>"><?=$discount_price?></span><span ><?=GetMessage("RUB")?></span>


			<?}else{?>
				<p class="price"><span class="price_product<?=$arItem["ID"]?>"><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?></span><span ><?=GetMessage("RUB")?></span></p>
			<?}?>
			<div class="count" style="display: none;">
				<span p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_old_price="<?=$arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"];?>" p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>" p_id_price_product=".price_product<?=$arItem["ID"]?>" class="minus" p_id=".number<?=$arItem["ID"]?>"></span>
				<span class="number<?=$arItem["ID"]?> number" id="count<?=$arItem["ID"]?>">1</span>
				<span class="plus" p_id_price_product=".price_product<?=$arItem["ID"]?>" p_id_old_price_product=".old_price_product<?=$arItem["ID"]?>" p_id=".number<?=$arItem["ID"]?>" p_old_price="<?=$arItem["PROPERTIES"]["OLD_PRICE"]["VALUE"];?>" p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>"></span>
				<?
				//can buy if product pizza
				if ($arItem["PROPERTIES"]["TYPE_PRODUCT"]["VALUE"] == GetMessage("NAME_PIZZA")){
					$buy = 0;
				}else{
					$buy = 1;
				}

				?>

				<span class="button_buy" p_buy="<?=$buy?>" p_id="<?=$arItem["ID"]?>" p_name="<?=$arItem["NAME"]?>" p_price="<?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?>" p_count="#count<?=$arItem["ID"]?>"><?=GetMessage("BTN_BUY")?></span></div>
		</div>
		<?//endif;?>
	</div>
</div>
<?endforeach;?>
</div>

<script>

</script>