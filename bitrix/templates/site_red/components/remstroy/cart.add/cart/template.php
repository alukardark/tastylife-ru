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

$kol_all = $_SESSION['CATALOG_CART_LIST'][$arParams['IBLOCK_ID']]['kol_all'];
$summa_all = $_SESSION['CATALOG_CART_LIST'][$arParams['IBLOCK_ID']]['summa_all'];

$this->setFrameMode( true );

$itemCount = count($arResult);
	
$isAjax = (isset($_REQUEST["ajax_action"]) && $_REQUEST["ajax_action"] == "Y");
$idCompareCount = 'compareList'.$this->randString();
$obCompare = 'ob'.$idCompareCount;
$idCompareTable = $idCompareCount.'_tbl';
$idCompareRow = $idCompareCount.'_row_';
$idCompareAll = $idCompareCount.'_count';
$mainClass = 'bx_catalog-compare-list_sravn';
if ($arParams['POSITION_FIXED'] == 'Y')
{
	$mainClass .= ' fix '.($arParams['POSITION'][0] == 'bottom' ? 'bottom' : 'top').' '.($arParams['POSITION'][1] == 'right' ? 'right' : 'left');
}
// $style = ($itemCount == 0 ? ' style="display: none;"' : '');
$style = '';
?><div id="<? echo $idCompareCount; ?>" class="<? echo $mainClass; ?> "<? echo $style; ?>><?
unset($style, $mainClass);
if ($isAjax)
{
	$APPLICATION->RestartBuffer();
}
$frame = $this->createFrame($idCompareCount)->begin('');
?>
<?
	?>

<!--	<span class="kol_all">--><?//=$kol_all?><!--</span>-->
<!--	<a href="/cart/">--><?//=GetMessage("ORDER_CART_TEXT")?>
<!--		<span class="summa_all">--><?//=$summa_all?><!--</span><i class="fa fa-rub"></i>-->
<!--	</a>-->
	<a class="link-nodirect <?if($kol_all==0){echo 'link-nodirect-empty';}?>" href="#"><span class="kol_all"><?=$kol_all?></span><?=GetMessage("ORDER_CART_TEXT")?>: </a><span class="summa_all"><?=$summa_all?> р.</span>
	<div class="basket-toggle">
		<?
			if($_POST['BasketId']){
				$_SESSION['CATALOG_CART_LIST'][3]['ITEMS'][$_POST['BasketId']]['kol'] = $_POST['kolVal'];
			}
		?>
		<div class="basket-toggle-list">
			<div class="basket-toggle-list-wrap">
<!--			--><?//print_r($_GET)?>
<!--			--><?//print_r($_SESSION['CATALOG_CART_LIST'][3])?>
				<?
				foreach($_SESSION['CATALOG_CART_LIST'][3]['ITEMS'] as &$item){?>

					<?
						if(!$item['pict']){
							$item['pict'] = $this->GetFolder().'/images/no_photo.png';
						}
					?>

					<div class="basket-toggle-el" data-id="<?=$item['ID']?>">
						<div class="basket-toggle-img" style="background-image: url(<?=$item['pict']?>);">Картинка </div>
						<div class="basket-toggle-rightWrap">
							<div class="basket-toggle-name"><?=$item['NAME']?></div>
							<div class="basket-toggle-kol">
								<span class="minus"></span>
								<span class="basket-toggle-kol-val"><?=$item['kol']?></span>
								<span class="plus"></span>

	<!--							<div class="basket-toggle-price-one">--><?//=$item['price']?><!-- р. <span>за шт.</span></div>-->
								<div class="basket-toggle-price"><?=$item['kol']*$item['price']?> р.</div>
								<span data-remove="<?=$item['ID']?>" class="basket-toggle-remove"></span>
							</div>
						</div>
					</div>

					<?
				}
				?>
			</div>


			<?if($_SESSION['CATALOG_CART_LIST'][3]['summa_all']>0){?>
				<form action="/cart/order/" method="GET">
					<div class="col-md-6 basket-toggle-left-wrap">
						<div class="basket-toggle-saleTitle">Скидка на заказ</div>
						Если у вас есть промо-код введите его в поле ниже и получите скидку на весь заказ.
						<input type="text" value="" name="id_kupon" style="text-align: left;padding-left: 10px; height: 33px; font-size: 20px;" class="form-control-sale  form-control input_kupon mobile_full_size">
					</div>
					<div class="col-md-6  basket-toggle-right-wrap">
						<div class="basket-toggle-allPrice">Итого: <span><?=$_SESSION['CATALOG_CART_LIST'][3]['summa_all']?> р.</span></div>
						<a href="/cart/" class="btn btn-default btn-lg  mobile_btn_order link-in-cart">Перейти в корзину</a>
						<button  type="submit" class=" btn btn-default btn-lg  mobile_btn_order"><i class="fa fa-check"></i> Оформить заказ </button>
					</div>
				</form>
			<?}?>
		</div>
	</div>

	<?
//foreach ($_SESSION['CATALOG_CART_LIST'][$arParams['IBLOCK_ID']]['ITEMS'] as &$item){
//	$item['kol'] = $item['kol']-2;
//}

	?>
<?
return;
?>

<a href="<?=SITE_DIR?>cart/">

	<div  class="cart_kol" style=" ">
	<i class="fa fa-shopping-cart"></i>
    <span class="kol" id="<? echo $idCompareAll; ?>"><? echo $kol_all ?></span>		

	</div>

	<?if($summa_all > 0):?>
   <div class="cart_summa"> <?=number_format($summa_all, 0, '', ' ' )?><i class="fa fa-rub"></i></div>
   <?endif?>
</a>
<?
?>

</div>

<?
if (!empty($arResult))
{
?><div class="bx_catalog_compare_form" style="display: none;">
<table id="<? echo $idCompareTable; ?>" class="compare-items">
<thead><tr><td align="center" colspan="2"><?=GetMessage("CATALOG_COMPARE_ELEMENTS")?></td></tr></thead>
<tbody><?
	foreach($arResult as $arElement)
	{
		?><tr id="<? echo $idCompareRow.$arElement['PARENT_ID']; ?>">
			<td><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></td>
			<td><noindex><a href="javascript:void(0);"  data-id="<? echo $arElement['PARENT_ID']; ?>" rel="nofollow"><?=GetMessage("CATALOG_DELETE")?></a></noindex></td>
		</tr><?
	}
?>
</tbody>
</table>
</div><?
}
$frame->end();
if ($isAjax)
{
	die();
}
$currentPath = CHTTP::urlDeleteParams(
	$APPLICATION->GetCurPageParam(),
	array(
		$arParams['PRODUCT_ID_VARIABLE'],
		$arParams['ACTION_VARIABLE'],
		'ajax_action'
	),
	array("delete_system_params" => true)
);

$jsParams = array(
	'VISUAL' => array(
		'ID' => $idCompareCount,
	),
	'AJAX' => array(
		'url' => $currentPath,
		'params' => array(
			'ajax_action' => 'Y'
		),
		'templates' => array(
			'delete' => (strpos($currentPath, '?') === false ? '?' : '&').$arParams['ACTION_VARIABLE'].'=DELETE_FROM_COMPARE_LIST&'.$arParams['PRODUCT_ID_VARIABLE'].'='
		)
	),
	'POSITION' => array(
		'fixed' => $arParams['POSITION_FIXED'] == 'Y',
		'align' => array(
			'vertical' => $arParams['POSITION'][0],
			'horizontal' => $arParams['POSITION'][1]
		)
	)
);
?></div>
<script type="text/javascript">
var <? echo $obCompare; ?> = new JCCatalogCompareList(<? echo CUtil::PhpToJSObject($jsParams, false, true); ?>)
</script>