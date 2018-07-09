<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

	<link href="<?=SITE_TEMPLATE_PATH;?>/css.bird/bootstrap.min.css" type="text/css" rel="stylesheet" data-color="true" />
	<link href="<?=SITE_TEMPLATE_PATH;?>/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<style>
		.odrder_finish .fa {
			font-size: 120px;
			color: #70D070;
		}
		.odrder_finish { border: 1px #B8D6B7 solid; padding: 60px 40px; font-size: 18px; margin-top: 30px; border-radius: 3px; }
		.odrder_finish .fa{font-size: 120px;color: #70D070;}
	</style>

<?
$sbHeader = A_Order::sb_orderStatus($n_order);
$sbResult = json_decode($sbHeader['content'], true);
?>
	<div class="odrder_finish">

		<div class="row">
			<div class="col-md-3 text-center hidden-xs">
				<i class="fa fa-check-square-o"></i>
			</div>
			<div class="col-md-9 order-finish_opensans">

					<?CModule::IncludeModule('iblock');
					$orderItemRes = CIBlockElement::GetList(Array("SORT" => "ASC"), Array("IBLOCK_CODE"=> 'webstudiosamovar_sushi_orders', "ACTIVE"=>"Y", 'PROPERTY_n' => $sbResult['OrderNumber']), false, false, Array("NAME", "ID", 'IBLOCK_ID', "PROPERTY_n"));
					while($orderElement = $orderItemRes->GetNextElement())  $orderItems[]= $orderElement->GetFields();


				$ELEMENT_ID = $orderItems[0]['ID'];  // код элемента
				$PROPERTY_CODE = "status";  // код свойства
				$PROPERTY_VALUE = "4";  // значение свойства
				// Установим новое значение для данного свойства данного элемента
				CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, 1, array($PROPERTY_CODE => $PROPERTY_VALUE));
				?>



				<h3 style="margin: 0 0 15px;">Ваш заказ №<?=$sbResult['OrderNumber']?> успешно оплачен</h3>
				В ближайшее время с Вами свяжется менеджер нашей компании и уточнит детали заказа.<br><br><br>
				<a href="/" class="btn btn-default order-finish_home"> На главную </a>
			</div>
		</div>
	</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>