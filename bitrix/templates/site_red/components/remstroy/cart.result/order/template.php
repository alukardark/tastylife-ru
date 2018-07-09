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

// $isAjax = ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["ajax_action"]) && $_POST["ajax_action"] == "Y");
?>

<link href="<?=SITE_TEMPLATE_PATH;?>/css/themes/bootstrap.min.css" type="text/css" rel="stylesheet" data-color="true" />

<?


session_start();
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
	);

// echo "<pre>";
// print_r($arResult);
// // print_r($_SESSION['CATALOG_CART_LIST']);
// echo "</pre>";

$APPLICATION->SetTitle(GetMessage("FAV_TITLE"));
// $APPLICATION->AddChainItem($APPLICATION->GetTitle());

IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/form_modal.php");

// webstudiosamovar_sushi_promokodi_

?>

<!-- 									���������� ������										 -->
<? if (isset($_POST['fio'] )):?>
<?

$skidka = $_POST['skidka'];
$dostavka = $_POST['dostavka'];
$no_dostavka = $_POST['no_dostavka'];

// --------------------------------------  ����� ������

$arSelect = Array("NAME", "ID", "PROPERTY_n");
$arFilter = Array("IBLOCK_CODE"=>"webstudiosamovar_sushi_orders", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("ID" => "DESC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);

$element = $res->GetNext();

$n_order = $element['PROPERTY_N_VALUE']+1;

// --------------------------------------  ��� �������� yandex

$arSelect = Array("NAME", "ID", "PROPERTY_ID_YANDEX");
$arFilter = Array("IBLOCK_CODE"=>"webstudiosamovar_sushi_yandex", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("ID" => "DESC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);

$element = $res->GetNext();

$id_yandex = trim($element['PROPERTY_ID_YANDEX_VALUE']);

// echo $id_yandex;

// --------------------------------------  ������������ ������ ������

	$sum = 0;
	$order_txt = "";

	foreach ($arResult["ITEMS"] as $arElement)
	{

		// ������ ���� �� ���� �� ������ (����� ��������� ������)

		$arElement['PROPERTIES']['PRICE']['VALUE'] =$_SESSION['CATALOG_CART_LIST'][$arParams['IBLOCK_ID']]['ITEMS'][$arElement['ID']]['price'];

$order_txt = $order_txt.$arElement['NAME']."\r\n";
$order_txt = $order_txt.number_format($arElement['PROPERTIES']['PRICE']['VALUE'], 0, '', ' ' ).GetMessage("rub")." X ".$arElement['kol']." ".$arElement['PROPERTIES']['ED_IZM']['VALUE']." -- ".number_format($arElement['kol']*$arElement['PROPERTIES']['PRICE']['VALUE'], 0, '', ' ' ).GetMessage("rub")."\r\n";
$order_txt = $order_txt."\r\n";		

$sum = $sum + $arElement['kol']*$arElement['PROPERTIES']['PRICE']['VALUE'];
$kol_all = $kol_all + $arElement['kol'];
$kol_row ++;

	}	

								if($skidka > 0){
									$sum_old = $sum;
									$sum = $sum-($sum*$skidka/100);
								}	

							$dostavka = $sum > $no_dostavka ? 0 : $dostavka;
							$itog_tovar = $sum;
							$sum = $sum + $dostavka;			

$order_txt = $order_txt."---------------------------------------------------------------------------";		
$order_txt = $order_txt."\r\n";		
$order_txt = $order_txt."\r\n";		
if ($skidka > 0) {
$order_txt = $order_txt. GetMessage("itog").' '.number_format($sum_old, 0, '', ' ' ).GetMessage("rub")."\r\n";		
$order_txt = $order_txt. GetMessage("itog_skidka").' '.number_format($itog_tovar, 0, '', ' ' ).GetMessage("rub").' (-'.$skidka."%)\r\n";	
} else {
$order_txt = $order_txt. GetMessage("itog").' '.number_format($itog_tovar, 0, '', ' ' ).GetMessage("rub")."\r\n";		
}
	
$order_txt = $order_txt. GetMessage("dostavka").' '.number_format($dostavka, 0, '', ' ' ).GetMessage("rub")."\r\n";		
$order_txt = $order_txt. GetMessage("itog_finish").' '.number_format($sum, 0, '', ' ' ).GetMessage("rub")."\r\n";		


// echo "<pre>";
// echo $order_txt ;
// echo "</pre>";


// --------------------------------------  ���������� ������

$date = date($DB->DateFormatToPHP(CSite::GetDateFormat("FULL")), time());

$fio = htmlspecialcharsEx($_POST['fio']);
$company = htmlspecialcharsEx($_POST['company']);
$tel = htmlspecialcharsEx($_POST['tel']);
$mail = htmlspecialcharsEx($_POST['e_mail']);
$adress = htmlspecialcharsEx($_POST['adress']);
$summa = htmlspecialcharsEx($_POST['summa']);
$memo = htmlspecialcharsEx($_POST['memo']);
$id_kupon = htmlspecialcharsEx($_GET['id_kupon']);
$time_dostavki = htmlspecialcharsEx($_POST['time-dostavki']);
$time_hous = htmlspecialcharsEx($_POST['time-hous']);
$time_minutes = htmlspecialcharsEx($_POST['time-minutes']);

if($time_dostavki=='exact_time'){
    $time_dostavki = $time_hous.':'.$time_minutes;
}
//-------------------------------------   add

 CModule::IncludeModule('iblock');
$el = new CIBlockElement;

$PROP = array();
$PROP['date'] = $date;  
$PROP['n'] = $n_order;  
$PROP['fio'] = $fio;  
$PROP['company'] = $company;  
$PROP['tel'] = $tel;  
$PROP['mail'] = $mail;  
$PROP['adress'] = $adress;  
$PROP['sposob_dostavki'] = trim(strip_tags($_POST['sposob-dostavki']));
$PROP['delivery_address'] = trim(strip_tags($_POST['delivery-address']));

if($_POST['sposob-dostavki'] == 'Самовывоз'){
	$_POST['districtsKemerovo'] ='';
}

if(htmlspecialcharsEx($_POST['type_oplata'] == 'cash')){
	$_POST['type_oplata'] = 'Оплата при получении заказа';
	$PROP['type_oplata'] = 'Оплата при получении заказа';
}elseif(htmlspecialcharsEx($_POST['type_oplata'] == 'cart')){
	$_POST['type_oplata'] = 'Онлайн-оплата';
	$PROP['type_oplata'] = 'Онлайн-оплата';
}

$PROP['districtsKemerovo'] = trim(strip_tags($_POST['districtsKemerovo']));
$PROP['order'] = $order_txt;
$arrProp['memo'] = Array("VALUE" => Array ("TEXT" => $memo, "TYPE" => "text"));

$PROP['summa'] = $sum;  
$PROP['kol_all'] = $kol_all;  
$PROP['memo'] = $memo;

$PROP['id_kupon'] = $id_kupon;
$PROP['time'] = $time_dostavki;

$property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_CODE"=>'webstudiosamovar_sushi_orders', "CODE"=>"status"));
$enum_fields = $property_enums->GetNext();
$status_id = $enum_fields["ID"];

$PROP['status'] =  Array("VALUE" => $status_id );


$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // ������� ������� ������� �������������
  "IBLOCK_SECTION_ID" => false,          // ������� ����� � ����� �������
  "IBLOCK_ID"      => 1, //#BRON_IBLOCK_ID#,
  "PROPERTY_VALUES"=> $PROP,
  "NAME"           => GetMessage("title_order_finish_add", Array ("#n#" => $n_order, '#date#' => $date)),
  "ACTIVE"         => "Y",            // �������
  "PREVIEW_TEXT"   => "",
  "DETAIL_TEXT"    => ""
  );

$PRODUCT_ID = $el->Add($arLoadProductArray);

//-------------------------------------   .add

//-------------------------------------   mail


$tel_company = file_get_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'include/contact/phone.php');
$adress_company = file_get_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'include/contact/address.php');
$regim_company = file_get_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'include/contact/time.php');
// $mail__company = file_get_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'include/contact/mail_contacts.php');

$shop_info =HTMLToTxt($tel_company)."\r\n".HTMLToTxt($adress_company)."\r\n".HTMLToTxt($regim_company)."\r\n".HTMLToTxt($mail_company);

// if(SITE_CHARSET=="windows-1251")
// {
// $fio =iconv( "UTF-8", "CP1251//IGNORE", $fio);
// $company =iconv( "UTF-8", "CP1251//IGNORE",$company);
// $adress =iconv( "UTF-8", "CP1251//IGNORE",$adress);
// $order_txt =iconv( "UTF-8", "CP1251//IGNORE",$order_txt);
// $memo =iconv( "UTF-8", "CP1251//IGNORE",$memo);
// $shop_info =iconv( "UTF-8", "CP1251//IGNORE",$shop_info);
// }

	$arEventFields = array( 
	"n_order"			=>		$n_order,	
	"date_order"		=>		$date,	
	"fio"				=>		$fio,
	"company"			=>		$company,
	"adress"			=>		$adress,
	"tel"				=>		$tel,
	"e_mail"			=>		$mail,
	"order_txt"			=>		$order_txt,
	"memo"				=>		$memo,
	"summa"				=>		number_format($sum, 0, '', ' ' ).GetMessage("rub"),
	"shop_info"			=>		$shop_info,
    
    "id_kupon"          =>      $id_kupon,
    "time"              =>      $time_dostavki,
    
	"sposob_dostavki" => trim(strip_tags($_POST['sposob-dostavki'])),
	"delivery_address" => trim(strip_tags($_POST['delivery-address'])),

	"type_oplata" => trim(strip_tags($_POST['type_oplata'])),

	"districtsKemerovo" => trim(strip_tags($_POST['districtsKemerovo'])),
	); 

if (CModule::IncludeModule("main"))
{	
// CEvent::Send("REMSTROY_NEW_ORDER", SITE_ID, $arEventFields);
CEvent::sendImmediate("SAMOVAR_SUSHI_NEW_ORDER", SITE_ID, $arEventFields);
CEvent::sendImmediate("SAMOVAR_SUSHI_NEW_ORDER_ADMIN", SITE_ID, $arEventFields);
		// echo "ok"; 
	//endif; 
}
?>

<div class="odrder_finish">
<?
	$arFilter = Array("IBLOCK_ID"=>10, "ID"=>59);
	CModule::IncludeModule("iblock");
	$res = CIBlockElement::GetList(Array(), $arFilter);
	if ($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arFields['TIMESTAMP_X'] = str_replace(".", "-",  $arFields['TIMESTAMP_X']);
	}

if (CModule::IncludeModule("iblock")):
	$el = new CIBlockElement;
	$PROP = array(
		"TOTAL"    =>  $arProps['TOTAL']['VALUE'],
		"TOTAL_REAL"    =>  $arProps['TOTAL_REAL']['VALUE'],
		"NINE"    =>  $arProps['NINE']['VALUE'],
		"ELEVEN"    =>  $arProps['ELEVEN']['VALUE'],
		"THIRTEEN"    =>  $arProps['THIRTEEN']['VALUE'],
		"SEVENTEEN"    =>  $arProps['SEVENTEEN']['VALUE'],
		"NINETEEN"    =>  $arProps['NINETEEN']['VALUE'],
		"LAST_TIME"    =>  $arFields['TIMESTAMP_X']
	);
	$arLoadProductArray = Array(
		"CODE"    => 'counter',
		"ACTIVE_FROM"    => "",
		"IBLOCK_SECTION_ID" => "",
		"IBLOCK_ID"      => 10,
		"PROPERTY_VALUES"=> $PROP,
		"NAME"           => 'Счетчик',
		"ACTIVE"         => "N",
	);


	$arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
	$arLoadProductArray['PROPERTY_VALUES']["TOTAL_REAL"] = $arProps['TOTAL_REAL']['VALUE']+1;
	$PRODUCT_ID = $el->Update(59, $arLoadProductArray);
	endif;


	?>










	<div class="row">
		<div class="col-md-3 text-center hidden-xs">
		<i class="fa fa-check-square-o"></i>	
		</div>

		<div class="col-md-9 order-finish_opensans">


			<h3 style="margin: 0 0 15px;"><?=GetMessage("title_order_finish", Array ("#n#" => $n_order))?></h3>

			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_DIR."/include/forms/order/odrder_finish.php"
					)
					);?>
					<br><br>

					<?if($_POST['type_oplata'] !== 'Оплата при получении заказа'):?>
					
						<?$sbSum = round(str_replace(" ","", $sum) * 100);
						$sbHeader = A_Order::sb_orderRegister($n_order, $sbSum, 'http://'.$_SERVER['HTTP_HOST'].'/bitrix/pay_result/', array('sessionTimeoutSecs' => 60 * 60 * 4));
						$sbResult = json_decode($sbHeader['content'], true);


						unset($_SESSION['CATALOG_CART_LIST']);

						if (isset($sbResult) && $sbResult['errorCode'] == 0) {
							LocalRedirect($sbResult['formUrl']);
						} else {
							echo "<p>«К сожалению, что-то пошло не так» errorCode:".$sbResult['errorCode']."</p>";
						}?>
					<?else:?>
						<a href="<?=SITE_DIR?>" class="btn btn-default order-finish_home"> <?=GetMessage('home')?> </a> 
					<?endif?>
				</div>
			</div>
		</div>

		<script>
		$(document).ready(function(e){
			var all_summ = $(".all_price").val();
			//alert(all_summ);
			var zakaz_number = $(".zakaz_number").val();
				$.ajax({
									 
					   
									 url: "/yandex.php",
									 type: "POST",
									  dataType: "html",
									  data: "all_summ=" + all_summ + "&zakaz_number="+zakaz_number,
									  success: function(out){
											$(".yandex_oplata_form").html(out);
											$(".yandex_oplata_form").show();
											//alert(all_summ);
											//alert(out);
									  }

									});
		});
		</script>

<!-- <br>
<i class="fa fa-check-circle-o"></i>
<br>
<i class="fa fa-exclamation-circle"></i>
</div>
123123 -->

<?
unset($_SESSION['CATALOG_CART_LIST']);
?>

<?return;?>

<?endif?>
	
<!-- 									�����										 -->

<div class="row form_zakaz">
<div class="col-md-6">
	              <form name="sentMessage" id="callback_zakaz_<?=$id?>"  class="form-horizontal" novalidate action="" method="post">
					
					<?
// ----------  �������� ������ �� �����-����

					$rsUser = CSite::GetList($by="sort", $order="desc", Array());
					$arUser = $rsUser->Fetch();


					$iblock_skidka = 'webstudiosamovar_sushi_promokodi_'. $arUser['LID'];

					CModule::IncludeModule('iblock');
					$arSelect = Array("ID", "NAME", "PROPERTY_CODE", "PROPERTY_PROCENT");
					$arFilter = Array("IBLOCK_CODE"=> $iblock_skidka, "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);

					while($element = $res->GetNextElement())  $arItem[]= $element->GetFields();
					// $element = $res->GetNextElement();
					// $arItem[]= $element->GetFields();

					// echo "<pre>";
					// print_r($arItem);
					// echo "</pre>";

					$skidka = 0;

					foreach($arItem as $key => $fields)
					{

						if (trim($fields['PROPERTY_CODE_VALUE']) == $_GET['id_kupon']) {
							$skidka =  $fields['PROPERTY_PROCENT_VALUE'];
						}
					// echo $fields['PROPERTY_CODE_VALUE'];

					}

					unset($arItem);

// ----------  �������� ��������

					$iblock_skidka = 'webstudiosamovar_sushi_dostavka';
					// $iblock_skidka = 'webstudiosamovar_sushi_dostavka_'. $arUser['LID'];

					CModule::IncludeModule('iblock');
					$arSelect = Array("ID", "NAME", "PROPERTY_DOSTAVKA", "PROPERTY_NO_DOSTAVKA");
					$arFilter = Array("IBLOCK_CODE"=> $iblock_skidka, "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);

					$element = $res->GetNextElement();
					$arItem[]= $element->GetFields();


					$dostavka = $arItem[0]['PROPERTY_DOSTAVKA_VALUE'];
					$no_dostavka = $arItem[0]['PROPERTY_NO_DOSTAVKA_VALUE'];

					// echo "<pre>";
					// print_r($arItem);
					// echo "</pre>";

					// echo $dostavka;



					?>

					<input type="hidden" value="<?=$skidka?>" name="skidka">
					<input type="hidden" value="<?=$dostavka?>" name="dostavka">
					<input type="hidden" value="<?=$no_dostavka?>" name="no_dostavka">


	              	<?$APPLICATION->IncludeComponent(
	              		"bitrix:main.include",
	              		"",
	              		Array(
	              			"AREA_FILE_SHOW" => "file",
	              			"EDIT_TEMPLATE" => "",
	              			"PATH" => SITE_DIR."/include/forms/order/text_top.php"
	              			)
	              			);?>



	                        <div id="contacts">
	                            <!-- Alignment -->
	                              <div id="success_zakaz_<?=$id?>"></div> <!-- For success/fail messages -->
	
	                                <div class="form-group control-group">
	                                
	                                  <label class="control-label"><?=GetMessage('form_fio')?> <i class="fa fa-asterisk"></i></label>
	                                  <div class="controls">
	                                    <input type="text" class="form-control"
	                                    name = "fio"
	                                    id="name_zakaz_<?=$id?>"
	                                    value = ""
	                                    required
	                                    data-validation-required-message="<?=GetMessage('form_fio_error')?>" />
		                                    <p class="help-block"></p>
	                                  </div>
	                                  </div>
	
<!--	                                <div class="form-group control-group">-->
<!--	                                  <label class="control-label">--><?//=GetMessage('form_company')?><!--</label>-->
<!--	                                  <div class="controls">-->
<!--	                                      <input type="text" name = "company" class="form-control" value = "" />-->
<!--	                                  </div>-->
<!--	                                </div>-->

	                                <div class="form-group control-group">
	                                  <label class="control-label"><?=GetMessage('form_tel')?> <i class="fa fa-asterisk"></i></label>
	                                  <div class="controls">
										  <input type="text"
												 name = 'tel'
												 class="form-control mask-phone"
												 value = ""
												 id="phone_zakaz_<?=$id?>" required
												 data-validation-required-message="<?=GetMessage('form_tel_error')?>" />
<!--	                                    <input type="text"-->
<!--	                                    name = 'tel'-->
<!--	                                    class="form-control mask-phone"-->
<!--	                                    data-validation-regex-regex="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$"-->
<!--	                                    data-validation-regex-message="--><?//=GetMessage('form_tel_error_1')?><!--"-->
<!--	                                    value = ""-->
<!--	                                    id="phone_zakaz_--><?//=$id?><!--" required-->
<!--	                                    data-validation-required-message="--><?//=GetMessage('form_tel_error')?><!--" />-->
	                                  </div>
	                                </div>
	
	                                <div class="form-group control-group">
	                                  <label class="control-label"><?=GetMessage('form_email')?> <i class="fa fa-asterisk"></i></label>
	                                  <div class="controls">
	
	                                      <input 
	                                     type="text"
										 name = "e_mail"	
	                                     class="form-control"
	                                     value = ""
	                                     id="email_zakaz_<?=$id?>" required
	                                     data-validation-email-message="<?=GetMessage('form_mail_error')?>"
	                                     data-validation-required-message="<?=GetMessage('form_mail_error_1')?>"
	                                     /> 
	                                  </div>
	                                </div>

<div class="form-group control-group radio-wrap">
	<label class="control-label sposob-dostavki">Способ получения заказа</label>
	<div class="radio sposob-dostavki">
		<label><input id="kuryerom" type="radio" name="sposob-dostavki" value="Доставка" class="" checked>Доставка</label>
	</div>




	<div class="form-group control-group radio-wrap form-radio-districts" style="margin-top: 10px;">
		<select name="districtsKemerovo" class="form-control form-select-districts">
	<?

	CModule::IncludeModule('iblock');
	$districtItemRes = CIBlockElement::GetList(Array("SORT" => "ASC"), Array("IBLOCK_CODE"=> 'districtsKemerovo', "ACTIVE"=>"Y"), false, false, Array("NAME", "ID", 'IBLOCK_ID', "PROPERTY_MINPRICE"));
	while($districtElement = $districtItemRes->GetNextElement())  $districtItems[]= $districtElement->GetFields();
	foreach ($districtItems as $districtItem):?>
		<option data-minprice="<?=$districtItem['PROPERTY_MINPRICE_VALUE']?>" value="<?=$districtItem['NAME']?>"><?=$districtItem['NAME']?></option>
	<?endforeach?>
		</select>

		<p class="error-price">Закажите ещё на <span class="shortage-price"></span> для доставки в выбранный район. Дополните <a href="/cart/">корзину</a>, либо заберите заказ самостоятельно.</p>
	</div>


















	<div class="radio sposob-dostavki">
		<label><input id="samovyvoz" type="radio" name="sposob-dostavki"  value="Самовывоз" class="">Самовывоз</label>
	</div>
</div>

<div class="form-group control-group radio-wrap">
	<label class="control-label delivery-clock time-label" style="text-align: left">Время доставки</label>
	<div class="radio time-dostavki">
		<label><input type="radio" name="time-dostavki" value="В ближайшее время" checked>В ближайшее время</label>
	</div>
	<div class="radio time-dostavki">
		<label><input type="radio" name="time-dostavki"  value="exact_time">Указать точное время</label>
	</div>
</div>

<div class="form-group control-group radio-wrap form-radio-select">
	<select name="time-hous" class="form-control form-select-time">
    <?
    for($h = 1; $h < 24; $h++){
        if($h < 10){
            $s = '0'.$h;
        }elseif($h != 24){
            $s = $h;
        }else{
            $s = '00';
        }
    ?>
        <option value="<?=$s?>"><?=$s?></option>
    <?}?>
    </select> часов
    <select name="time-minutes" class="form-control form-select-time">
    <?
    for($m = 0; $m < 60; $m++){
        if($m < 10){
            $s = '0'.$m;
        }else{
            $s = $m;
        }
    ?>
        <option value="<?=$s?>"><?=$s?></option>
    <?}?>
    </select> минут
</div>


<div class="form-group control-group adress-marginbottom">
	<label class="control-label delivery-address" style="text-align: left">Адрес пункта выдачи</label>
	<?
	$delivery_address = WS_PSettings::getFieldValue('delivery-address', array());
	foreach($delivery_address as $delivery_address_item){?>
		<div class="radio delivery-address">
			<label><input type="radio" name="delivery-address"  value="<?=$delivery_address_item?>" class=""><?=$delivery_address_item?></label>
		</div>
	<?}?>
</div>


	                                <div class="form-group control-group form-adress">
	                                  <label class="control-label"><?=GetMessage('form_adress')?></label>
	                                  <div class="controls">
	                                      <input type="text" name = "adress" class="form-control" value = "" /> 
	                                  </div>
	                                </div>

	                                <div class="form-group control-group">
	                                  <label class="control-label">Комментарий к заказу</label>
	                                  <div class="controls">
	                                  <textarea name="memo" rows="5" cols="100" class="form-control" id="mess_zakaz_<?=$id?>" style="resize:none" ></textarea>
	                                    <div class="help-block"></div></div>
	                                  </div>

	                                  <?// -----------------------------  ������ ������?>
	                           	<div class="form-group control-group radio-wrap">
								<label class="control-label"><?=GetMessage('form_type_opl')?></label>
								<div class="radio">
									<label>
										<input type="radio" name="type_oplata" id="optionsRadios1" value="cash" checked="">Оплата при получении заказа <br>
										<span style="color:#989898">(Безналичный и наличный расчет)</span>
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="type_oplata" id="optionsRadios2" value="cart">Онлайн-оплата
										<br>
										<span style="color:#989898">(VISA, Mastercard, Яндекс.Деньги, PayPal)</span>
									</label>
								</div>
								</div>
	                                  <?// -----------------------------  �������� ?>

	                      <!-- </div> -->
	<hr>
	<button type="submit" class="my-big-btn btn btn-default btn-lg" style="margin: 10px 0 40px"><i class="fa fa-check"></i> <?=GetMessage('form_order')?></button>
    <img class="load-mage" style="display: none; margin-left: 20px; margin-bottom: 30px;" src="<?=SITE_TEMPLATE_PATH;?>/css.bird/images/load.gif" />
	              </div>
				<span style='
						margin-top: -15px;
						text-align: left;
						display: block;
				'>Нажимая на кнопку, вы даете <a target='_blank' href='/personal-information/'> согласие на обработку персональных данных</a></span>
					  <i class="fa fa-asterisk"></i> <?=GetMessage('form_get_')?>
				
	              </form>

	</div>

	<div class="col-md-5 col-md-offset-1">

		<div class="row">	
			
			<div class="col-md-6 col-sm-6 col-xs-6 "><h3 style="margin: 0 0 15px"><?=GetMessage('you_order')?></h3></div>
			<div class="col-md-6  col-sm-6 col-xs-6 text-right" style="padding-top: 5px;"><i class="fa fa-level-up"></i> <a href="<?=SITE_DIR?>cart"><?=GetMessage('you_order_edit')?></a></div>

		</div>


		<table class="table table-bordered"> 

	<?
	$sum = 0;
	foreach ($arResult["ITEMS"] as $arElement)
	{
				// ������ ���� �� ���� �� ������ (����� ��������� ������)

		$arElement['PROPERTIES']['PRICE']['VALUE'] =$_SESSION['CATALOG_CART_LIST'][$arParams['IBLOCK_ID']]['ITEMS'][$arElement['ID']]['price'];
		?>
		<tr>
		<td class="name" colspan="3"><?=$arElement["NAME"]?></td>
		</tr>
		<tr>
		<td class="num text-center"><?=number_format($arElement['PROPERTIES']['PRICE']['VALUE'], 0, '', ' ' )?> <span>р.</span></td>
		<td class="num text-center"><?=$arElement['kol']?> <?=$arElement['PROPERTIES']['ED_IZM']['VALUE']?></td>
		<td class="num text-center"><?=number_format($arElement['kol']*$arElement['PROPERTIES']['PRICE']['VALUE'], 0, '', ' ' )?> <span>р.</span></td>
		</tr>
								<?
								$sum = $sum + $arElement['kol']*$arElement['PROPERTIES']['PRICE']['VALUE'];
								$kol_row ++;

							}

								if($skidka > 0){
									$sum_old = $sum;
									$sum = $sum-($sum*$skidka/100);
								}	

							$dostavka = $sum > $arItem[0]['PROPERTY_NO_DOSTAVKA_VALUE'] ? 0 : $dostavka;					
							?>

		<tr class="cart_itog">
			<td class="text-right order_td_top" colspan="2"> <?=GetMessage("itog")?></td>
			<td class="text-center order_td_top" >
			
			<?if($skidka > 0):?>
			<span id="total"><?=number_format($sum, 0, '', ' ' )?></span> <span>р.</span>
			<span class="old_price"><span style="text-decoration: line-through"><?=number_format($sum_old, 0, '', ' ' )?></span> <span>р.</span>(-<?=$skidka?>%) </span>
			<?else:?>
			<span id="total"><?=number_format($sum, 0, '', ' ' )?></span> <span>р.</span>
			<?endif?>

			</td>
		</tr>

		<?if(!empty($arItem[0]['PROPERTY_DOSTAVKA_VALUE']) || $arItem[0]['PROPERTY_DOSTAVKA_VALUE']!=0){?>
			<tr class="cart_itog">
				<td class="text-right" colspan="2"> <?=GetMessage("dostavka")?></td>
				<td class="text-center">
				<span id="total"><?=number_format($dostavka, 0, '', ' ' )?></span> <span>р.</span>
				</td>
			</tr>
		<?}?>	

		<!--		<tr class="cart_itog">-->
<!--			<td class="text-right order_td_bottom" colspan="2"> --><?//=GetMessage("k_oplate")?><!--</td>-->
<!--			<td class="text-center order_td_bottom">-->
<!--			<span id="total">--><?//=number_format($dostavka+$sum, 0, '', ' ' )?><!--</span> <span>р.</span>-->
<!--			</td>-->
<!--		</tr>-->		
</table>
					<?if($kol_row <= 5):?>
	              	<?
	              	$APPLICATION->IncludeComponent(
	              		"bitrix:main.include",
	              		"",
	              		Array(
	              			"AREA_FILE_SHOW" => "file",
	              			"EDIT_TEMPLATE" => "",
	              			"PATH" => SITE_DIR."/include/forms/order/oplata_dostavka.php"
	              			)
	              			);?>
					<?endif?>

	</div>
</div>
					<?if($kol_row > 5):?>
	              	<?
	              	$APPLICATION->IncludeComponent(
	              		"bitrix:main.include",
	              		"",
	              		Array(
	              			"AREA_FILE_SHOW" => "file",
	              			"EDIT_TEMPLATE" => "",
	              			"PATH" => SITE_DIR."/include/forms/order/oplata_dostavka.php"
	              			)
	              			);?>
					<?endif?>
<script>
        /*
          Jquery Validation using jqBootstrapValidation
           example is taken from jqBootstrapValidation docs
           */
           $(function() {
            
            /***< настравиваем инпуты с временем доставки >***/
            var time = new Date();
            var hours = time.getHours();
            var minutes = time.getMinutes();
            
            for(i_select=0;i_select<hours;i_select++){
                $('.form-select-time option').eq(i_select).addClass('deletus-select');
            }
            $('.form-select-time option.deletus-select').remove();
            $('.form-radio-select').css('display','none');
            for(i_select=0;i_select<minutes;i_select++){
                $('.form-select-time').eq(1).find('option').eq(i_select).attr('disabled','disabled').addClass('dis-selectus');
            }
            $('.form-select-time').eq(1).find('option').eq(i_select).attr('selected','selected');
            $('.form-select-time').eq(0).on('change',function(){
                if($(this).val() == hours+1){
                    $('.dis-selectus').attr('disabled','disabled');
                    $('.form-select-time').eq(1).find('option').eq(i_select).removeAttr('selected').attr('selected','selected');
                }else{
                    $('.dis-selectus').removeAttr('disabled');
                }
            });
            
            $('.time-dostavki input').eq(0).on('click',function(){
                $('.form-radio-select').css('display','none');
            });
            $('.time-dostavki input').eq(1).on('click',function(){
                $('.form-radio-select').css('display','inline-block');
            });
            /***</ настравиваем инпуты с временем доставки >***/
            
            /***< при отправке заказа (показываем анимацию загрузки) >***/
            $('form[name="sentMessage"]').submit(function(){
                function sub_load(){
                    if(!$('ul[role="alert"]').is('ul') && !$('.shortage-price').is(":visible")){
						$('form[name="sentMessage"] button[type="submit"]').hide();
						$('form[name="sentMessage"] .load-mage').show();
						$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
					}else{
						$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
					}
                }
                setTimeout(sub_load,100);
            });
            /***</ при отправке заказа >***/
            
           	$('.delivery-address').css('display', 'none');
			$('.sposob-dostavki input').eq(0).on('click', function(){
				$('.form-adress').css('display', 'block');
				$('.delivery-address').css('display', 'none').find('input').removeAttr('checked');
                $('.time-label').html('Время доставки');
				$('.form-radio-districts ').css('display', 'block');
			});
			$('.sposob-dostavki input').eq(1).on('click', function(){
				$('.form-adress').css('display', 'none').find('input').val('');
				$('.delivery-address').css('display', 'block');
                $('.time-label').html('Время самовывоза');
				$('.form-radio-districts ').css('display', 'none');
			});


			var minPrice = $('.form-select-districts').children(":selected").data('minprice');
				var shortagePrice = parseInt( $('.shortage-price').text().replace(' ','') );
				var totalPrice = parseInt($ ('.text-center.order_td_top #total').text().replace(' ','') );
				if(minPrice>totalPrice){
					shortagePrice = minPrice-totalPrice
					$('.error-price').show();
					$('.shortage-price').text(shortagePrice + " р.");
				}else{
					$('.error-price').hide();
				}


				$('.form-select-districts').on('change', function () {
				var minPrice = $(this).children(":selected").data('minprice');
				var shortagePrice = parseInt( $('.shortage-price').text().replace(' ','') );
				var totalPrice = parseInt($ ('.text-center.order_td_top #total').text().replace(' ','') );
				if(minPrice>totalPrice){
					shortagePrice = minPrice-totalPrice
					$('.error-price').show();
					$('.shortage-price').text(shortagePrice + " р.");
				}else{
					$('.error-price').hide();
				}
				if($('.shortage-price').is(":visible")){
   	 				$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
		   			return false;
			 	}else{
			   		$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
				}
			});
		    $('form[name="sentMessage"]').submit(function() {
		   		if($('.shortage-price').is(":visible")){
   	 				$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
		   			return false;
			   }else{
			   		$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
			   }
		   });

			if($('.shortage-price').is(":visible")){
				$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
				return false;
		   }else{
		   		$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
			}

			$('.radio.sposob-dostavki label').change(function(){
				if($('.shortage-price').is(":visible")){
					$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
					return false;
			   }else{
			   		$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
				}
			});

			$('form[name="sentMessage"] input[type="text"]').keyup(function(){
					setTimeout(function(){
						if(!$('ul[role="alert"]').is('ul') && !$('.shortage-price').is(":visible")){
							$('form[name="sentMessage"] button[type="submit"]').removeClass('gray-btn-error');
						}else{
							$('form[name="sentMessage"] button[type="submit"]').addClass('gray-btn-error');
						}
					},100);
				});


			   

           	$("#callback_zakaz_<?=$id?>").find('textarea,input,select').jqBootstrapValidation(
           	{
           		preventSubmit: true,
           		submitError: function($form, event, errors) {
              // something to have when submit produces an error ?
              // Not decided if I need it yet
          },
          filter: function() {
          	return $(this).is(":visible");
          },
      });

           	$("a[data-toggle=\"tab\"]").click(function(e) {
           		e.preventDefault();
           		$(this).tab("show");
           	});
           });

           /*When clicking on Full hide fail/success boxes */
           $('#name_zakaz').focus(function() {
           	$('#success_zakaz').html('');
           });

       </script>