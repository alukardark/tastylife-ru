<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();$this->setFrameMode(true);?>

<div class="wrap-main-slider">
<div class="main-slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="main-slider-init" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC'];?>)">
<!--			<h2 class="slide_text_title">--><?//=$arItem['PREVIEW_TEXT']?><!--</h2>-->
		</div>
	<?endforeach;?>
</div>
	<h2 class="slide_text_title">Доставка вкусного<br>из ресторанов Кемерова</h2>
	<div class="slide_text_logos">
		<div class="slide-logo-item logo-mama-roma"></div>
	</div>
	<div class="slide_text_scribble"></div>
</div>