<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$frame = $this->createFrame("news_detail", false)->begin();
?>
<div class="news_detail">
	<article class="news_detail_item" itemscope itemtype="http://schema.org/Article">
		<img src="<?=$arResult["PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" itemprop="image" />
		<div itemprop="description">
			<?//=$arResult["DESCRIPTION"];?>
			<?
				$db_list = CIBlockSection::GetList(Array(SORT=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ID"=>$arResult["ID"]), true,$arSelect=Array("UF_DETAIL_TEXT")); 
				while($ar_result = $db_list->GetNext()){   
							echo $ar_result["UF_DETAIL_TEXT"]; 
					}
			?> 
		</div>
	</article>
</div>
	<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);
?>
	<div class="service_element">
		<h4><?echo $arItem["NAME"]?></h4>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<p><?echo $arItem["PREVIEW_TEXT"];?></p>
		<?endif;?>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=GetMessage("KO_BTN_DETAIL")?></a>
		<hr>
	</div>
<?}
?>
<a href="javascript:history.go(-1);"><?=GetMessage("KO_BACK")?></a>
<?$frame->end();?>