<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "О нас  — Tasty Life");
$APPLICATION->SetTitle("О нас");
$APPLICATION->SetPageProperty("tags", "О нас");
$APPLICATION->SetPageProperty("keywords", "доставка еды кемерово, доставка пиццы, заказ еды, шашлык, кесадилья, бургер, гриль, курица, свинина, говядина, ягнёнок, рыба, гарнир, паста, сыр, ризотто, пицца, салат, карпаччо, тар-тар, закуска, суп, хлеб, соус, десерт, напитки, mama roma");
$APPLICATION->SetPageProperty("description", "Закажи доставку еды на дом или в офис в Кемерове. Доставка пиццы, бургеров, десертов и других горячих блюд из ресторана «Mama Roma».");
?>

<?$APPLICATION->IncludeFile(SITE_DIR."include/company.php", Array(), Array("MODE" => "html","NAME" => ""));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>  