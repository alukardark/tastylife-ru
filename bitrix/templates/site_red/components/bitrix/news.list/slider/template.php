<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();$this->setFrameMode(true);?>
	<?//if($USER->IsAdmin()) {echo '<pre>'; print_r($arResult); echo '</pre>';} ?>
<div class="slides_container">
	<?foreach($arResult["ITEMS"] as $arItem):?>

		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		
		$slider = CFile::ResizeImageGet(
			$arItem["PREVIEW_PICTURE"],
			array("width"=>"2000","height"=>"550"),
			BX_RESIZE_IMAGE_PROPORTIONAL, 
			false,  $arFilters = Array()
		);
		$slider2 = CFile::ResizeImageGet(
			$arItem["DETAIL_PICTURE"],
			array("width"=>"465","height"=>"443"),
			BX_RESIZE_IMAGE_PROPORTIONAL, 
			false,  $arFilters = Array()
		);
		?>
		<div>
			
				<img class="slides_images" src="<?=$slider["src"];?>" alt="<?=$arItem["NAME"];?>" />

			
			<div class='slide_text' style="text-align: center;">
			
					<div class="center_slide_text">
				
					<div class='title'><a href="<?=$arItem["PROPERTIES"]["SLIDER_URL"]["VALUE"];?>"><?=$arItem["PREVIEW_TEXT"];?></a></div>
					<div class='description'><a href="<?=$arItem["PROPERTIES"]["SLIDER_URL"]["VALUE"];?>"><?=$arItem["DETAIL_TEXT"];?></a></div>
					<button class="btn_zakaz_zvonok_slider">
						<a href="<?=$arItem["PROPERTIES"]["SLIDER_URL"]["VALUE"];?>"><span><?=GetMessage("DETAIL_BUTTON_KO");?></span></a>
					</button>
					<div class="row"></div>

					<!-- <ul class="" style=" text-align: center; margin-top: 40px; border: red 1px solid; position: relative !important; display: block;"> -->
				
				<table style="margin-top: 40px; /*border: red 1px solid;*/ margin: auto ; margin-top: 60px; ">
				<tr>
				<?if($arItem["PROPERTIES"]["PICT_1"]["VALUE"] && $arItem["PROPERTIES"]["TEXT_1"]["VALUE"]):?>
				<!-- <li class="slider_img_text"> -->
				<th>
					<?
					$URL = CFile::GetPath($arItem["PROPERTIES"]["PICT_1"]["VALUE"]);
					?>
					<img src="<?=$URL?>" alt="">
				</th>	
				<td style="padding-right: 40px">
					<?=$arItem["PROPERTIES"]["TEXT_1"]["~VALUE"]?>
				<!-- </li > -->
				</td>

				<?endif?>	

				<?if($arItem["PROPERTIES"]["PICT_2"]["VALUE"] && $arItem["PROPERTIES"]["TEXT_2"]):?>
				<!-- <li class="slider_img_text"> -->
				<th style="border-left: 1px white solid;">

					<?
					$URL = CFile::GetPath($arItem["PROPERTIES"]["PICT_2"]["VALUE"]);
					?>
					<img src="<?=$URL?>" alt="">
				</th>
				<td style="padding-right: 40px">
					<?=$arItem["PROPERTIES"]["TEXT_2"]["~VALUE"]?>
   				</td>
				<?endif?>	


				<?if($arItem["PROPERTIES"]["PICT_3"]["VALUE"] && $arItem["PROPERTIES"]["TEXT_3"]["VALUE"]):?>
				<!-- <li class="slider_img_text"> -->
					<th style="border-left: 1px white solid;">
					<?
					$URL = CFile::GetPath($arItem["PROPERTIES"]["PICT_3"]["VALUE"]);
					?>
					<img src="<?=$URL?>" alt="">
				</th>
				<td>
					<?=$arItem["PROPERTIES"]["TEXT_3"]["~VALUE"]?>
				<!-- </li > -->
				<?endif?>	
			</td>

				<!-- </ul>	 -->
				</tr>
				</table>

				</div>

			</div>
			<div class="slider_background_black"></div>
		</div>
	<?endforeach;?>
</div>
<a href="#" class="prev"></a>
<a href="#" class="next"></a>


