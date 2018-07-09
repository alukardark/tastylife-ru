<?
session_start();

$_SESSION['CATALOG_CART_LIST'][$_GET['block_id']]['ITEMS'][$_GET['id']]['kol'] = $_GET['kol'];

$kol_all = 0;

	foreach($_SESSION['CATALOG_CART_LIST'][$_GET['block_id']]['ITEMS'] as $aritem_)
	{
		$summa_all =  $summa_all + $aritem_['kol']*$aritem_['price'];
		$kol_all = $kol_all + $aritem_['kol'];
	}

	$_SESSION['CATALOG_CART_LIST'][$_GET['block_id']]['kol_all'] = $kol_all;
	$_SESSION['CATALOG_CART_LIST'][$_GET['block_id']]['summa_all'] = $summa_all;

?>