<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
$sapi_type = php_sapi_name();
if ($sapi_type=="cgi") 
   header("Status: 404");
else 
   header("HTTP/1.1 404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - страница не найдена");
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col">
			<h3>Данная страница не найдена.</h3>
			
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.map",
					"",
					Array(
						"CACHE_TIME" => "3600",
						"CACHE_TYPE" => "A",
						"COL_NUM" => "1",
						"LEVEL" => "3",
						"SET_TITLE" => "N",
						"SHOW_DESCRIPTION" => "Y"
					)
				);?>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>