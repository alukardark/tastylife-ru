<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="review">
		<div class="review_img">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" tabindex="0" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>" />
			<a class="group1" href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" title="">
				<div class="overlay">
					<img src="/bitrix/templates/sait/css/themes/images/review_img_zoom.png" alt="" />
					<p>���������</p>
				</div>
			</a>
		</div>
		<div class="prev_text">
							<h3><a href="/certificates/"><?echo $arItem["NAME"]?></a></h3>
							<p><?echo $arItem["DETAIL_TEXT"];?></p>
			<p class="sign">
				<?echo $arItem["PREVIEW_TEXT"];?>
			</p>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

