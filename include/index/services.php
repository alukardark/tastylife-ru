<div class="wrapper_center">
<div class="wrapper_center first">
<div class="services">
	<div class="services_center">
	<h2><?$APPLICATION->IncludeFile(SITE_DIR."include/index/services_title.php", Array(), Array("MODE" => "html","NAME" => ""));?></h2>
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"services",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "services",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE"
	)
);?>
		

	</div>
</div>
</div>