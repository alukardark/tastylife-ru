<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$this->setFrameMode(true);
?>
<?

	foreach ($arResult['SECTIONS'] as &$arSection)
	{
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	?>
	<?
		 $arFileTmp = CFile::ResizeImageGet(
            $arElement["DETAIL_PICTURE"],
            array("width" => 250, "height" => 127),
            BX_RESIZE_IMAGE_EXACT,
            true,
            $arWaterMark
        );
	
	?>
			<div class="services_element">
				<div>
					<a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="animation_img">
						<span class="overlay"></span>
						<span class="overlay_name"><?=$arSection["NAME"];?></span>
						<span class="overlay_border"></span>
						<img src="<?=$arSection["PICTURE"]["SRC"];?>" alt="<?=$arSection["NAME"];?>" />
						<!--<span class="link"><i class="fa fa-link"></i></span>-->
					</a>
					<p><a href="<?=$arSection["SECTION_PAGE_URL"];?>"><?=$arSection["NAME"];?></a></p>
				</div>
			</div>
<?
	}		
?>
