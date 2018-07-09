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

	<div class="new">
		<div class="cert_img">
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" title="<?echo $arItem["NAME"]?>" alt="<?echo $arItem["NAME"]?>" />
			</a>
			
		</div>
		<div class="prev_text">
			<h3><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h3>
			<p><?echo TruncateText($arItem["PREVIEW_TEXT"], 50);?></p>
		</div>
		<div class="clear"></div>
	</div>
	
	
<?endforeach;?>


