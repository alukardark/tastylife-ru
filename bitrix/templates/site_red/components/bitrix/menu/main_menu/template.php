<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);
$curPage = $APPLICATION->GetCurPage();
?>
<?if (!empty($arResult)):?>
<ul>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
<?if ($curPage <> "/" && $arItem["TEXT"] == GetMessage("INDEX_KO")) {
			$arItem["LINK"] = SITE_DIR;
	}?>
	<?if($arItem["SELECTED"]):?>
		<li class="selected"><a href="<?=$arItem["LINK"]?>" ><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>
</ul>
<?endif?>