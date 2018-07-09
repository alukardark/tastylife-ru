<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Контакты — Tasty Life");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("tags", "Контакты");
$APPLICATION->SetPageProperty("keywords", "Закажи доставку еды на дом или в офис в Кемерове. Доставка пиццы, бургеров, десертов и других горячих блюд из ресторана «Mama Roma».");
$APPLICATION->SetPageProperty("description", "доставка еды кемерово, доставка пиццы, заказ еды, шашлык, кесадилья, бургер, гриль, курица, свинина, говядина, ягнёнок, рыба, гарнир, паста, сыр, ризотто, пицца, салат, карпаччо, тар-тар, закуска, суп, хлеб, соус, десерт, напитки, mama roma");
?><!--Первая карта-->
<div class="wrapper_center">
	<div class="contact">
		<div class="contact_info">
			<table style="width:90%;">
			<tbody>
			<tr>
				<td colspan="2">
					<div style="text-align: center;">
 <img width="270" src="/upload/medialibrary/af0/af0d81e4633ccacb2c849d67c0a30fbe.jpg">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/4d5/4d528c4519e40815afbe01d67c1c8db4.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Весенняя, 19</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 670-580</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 11:00-22:30</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/d91/d91daebfd08e647f6248673f20047ae0.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Строителей, 32/2</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 670-580</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 11:00-22:30</span>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class="contact_map">
			<p class="big_map">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => "yandex_map",
		"CONTROLS" => array(0=>"ZOOM",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.35199298363569;s:10:\"yandex_lon\";d:86.11700664439947;s:12:\"yandex_scale\";i:12;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:3:\"LON\";d:86.07823555192788;s:3:\"LAT\";d:55.35163454179532;s:4:\"TEXT\";s:139:\"Mama Roma###RN###Весенняя, 19 ###RN###+7 (3842) 752‒766###RN######RN###ПН-ПТ 08:00 – 24:00###RN###СБ-ВС 11:00 – 24:00\";}i:1;a:3:{s:3:\"LON\";d:86.168282813492;s:3:\"LAT\";d:55.343675571351;s:4:\"TEXT\";s:163:\"Mama Roma###RN###Бульвар строителей 32/2  ###RN###+7 (3842) 37‒09‒32###RN######RN###ПН-ПТ 08:00 – 24:00###RN###СБ-ВС 11:00 – 24:00\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_DBLCLICK_ZOOM",1=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
		<div class="clear">
		</div>
		<div class="small_map2">
			<p class="small_map2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.11576042991836;s:10:\"yandex_lon\";d:39.030994726441286;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.030994726441286;s:3:\"LAT\";d:45.115760429899176;s:4:\"TEXT\";s:26:\"г.Краснодар,ул.Комарова,32\";}}}",
		"MAP_HEIGHT" => "250",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
	</div>
</div>
<!--Конец первой карты-->
<!--Вторая карта-->
<div class="wrapper_center">
	<div class="contact" style="margin-top:50px;">
		<div class="contact_info">
			<table style="width:90%;">
			<tbody>
			<tr>
				<td colspan="2">
					<div style="text-align: center;">
 <img width="270" src="/upload/medialibrary/535/535e5e106635eb5f1a33062fe9067adb.jpg">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/4d5/4d528c4519e40815afbe01d67c1c8db4.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>50 лет Октября, 21</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 670-580</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 11:00-01:00</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/d91/d91daebfd08e647f6248673f20047ae0.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Строителей, 32/2</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 670-580</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 11:00-01:00</span>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class="contact_map">
			<p class="big_map">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => "yandex_map",
		"CONTROLS" => array(0=>"ZOOM",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.345244458620016;s:10:\"yandex_lon\";d:86.11845054682286;s:12:\"yandex_scale\";i:12;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:3:\"LON\";d:86.079820664556;s:3:\"LAT\";d:55.34646227526;s:4:\"TEXT\";s:131:\"People`s, гриль-бар###RN###50 лет Октября, 21###RN###+7 (3842) 670—580###RN######RN###ПН-ВС 11:00 – 01:00\";}i:1;a:3:{s:3:\"LON\";d:86.16822808937;s:3:\"LAT\";d:55.343669252865;s:4:\"TEXT\";s:142:\"People`s, гриль-бар###RN###Бульвар строителей 32/2 ###RN###+7 (3842) 67‒05‒80###RN######RN###ПН-ВС 11:00-1:00\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_DBLCLICK_ZOOM",1=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
		<div class="clear">
		</div>
		<div class="small_map2">
			<p class="small_map2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.11576042991836;s:10:\"yandex_lon\";d:39.030994726441286;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.030994726441286;s:3:\"LAT\";d:45.115760429899176;s:4:\"TEXT\";s:26:\"г.Краснодар,ул.Комарова,32\";}}}",
		"MAP_HEIGHT" => "250",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
	</div>
</div>
<!--Конец второй карты-->
<!--Третья карты-->
<div class="wrapper_center">
	<div class="contact" style="margin-top:50px;">
		<div class="contact_info">
			<table style="width:90%;">
			<tbody>
			<tr>
				<td colspan="2">
					<div style="text-align: center;">
 <img width="270" src="/upload/medialibrary/a78/a78164409eafcbca5a6a00f302a5e3ed.jpg">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/4d5/4d528c4519e40815afbe01d67c1c8db4.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Ленинградский, 28в</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 49‒05‒59</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 08:00-23:00</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/d91/d91daebfd08e647f6248673f20047ae0.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Советский, 32</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 45‒23‒65</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 08:00-23:00</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/97c/97c4a426d0c594df9a5c603931dbcdb6.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Шахтёров, 54</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 45‒23‒55</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 08:00-22:00</span>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class="contact_map">
			<p class="big_map">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"yandex_map", 
	array(
		"COMPONENT_TEMPLATE" => "yandex_map",
		"CONTROLS" => array(
			0 => "ZOOM",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.383963163216286;s:10:\"yandex_lon\";d:86.1228431312157;s:12:\"yandex_scale\";i:11;s:10:\"PLACEMARKS\";a:3:{i:0;a:3:{s:3:\"LON\";d:86.176426435965;s:3:\"LAT\";d:55.348212720101;s:4:\"TEXT\";s:124:\"KFC, ресторан быстрого питания###RN###+7 (3842) 49‒05‒59###RN######RN###ПН-ВС 08:00 – 23:00\";}i:1;a:3:{s:3:\"LON\";d:86.075648034393;s:3:\"LAT\";d:55.358044991591;s:4:\"TEXT\";s:124:\"KFC, ресторан быстрого питания###RN###+7 (3842) 45‒23‒65###RN######RN###ПН-ВС 08:00 – 23:00\";}i:2;a:3:{s:3:\"LON\";d:86.117481846558;s:3:\"LAT\";d:55.399680683224;s:4:\"TEXT\";s:124:\"KFC, ресторан быстрого питания###RN###+7 (3842) 45‒23‒55###RN######RN###ПН-ВС 08:00 – 22:00\";}}}",
		"MAP_HEIGHT" => "385",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		)
	),
	false
);?>
			</p>
		</div>
		<div class="clear">
		</div>
		<div class="small_map2">
			<p class="small_map2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.11576042991836;s:10:\"yandex_lon\";d:39.030994726441286;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.030994726441286;s:3:\"LAT\";d:45.115760429899176;s:4:\"TEXT\";s:26:\"г.Краснодар,ул.Комарова,32\";}}}",
		"MAP_HEIGHT" => "250",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
	</div>
</div>
<!--Конец третьей карты-->
<!--Четвёртая карта-->
<div class="wrapper_center">
	<div class="contact" style="margin-top:50px;">
		<div class="contact_info">
			<table style="width:90%;">
			<tbody>
			<tr>
				<td colspan="2">
					<div style="text-align: center;">
 <img width="270" src="/upload/medialibrary/62a/62ac83a603cabfde034a6483f3b66963.jpg">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/4d5/4d528c4519e40815afbe01d67c1c8db4.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Советский, 43</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 34‒98‒11</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 10:00-22:00</span>
				</td>
			</tr>

			</tbody>
			</table>
		</div>
		<div class="contact_map">
			<p class="big_map">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"yandex_map", 
	array(
		"COMPONENT_TEMPLATE" => "yandex_map",
		"CONTROLS" => array(
			0 => "ZOOM",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.357596410752826;s:10:\"yandex_lon\";d:86.07488242327875;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:86.07488242327875;s:3:\"LAT\";d:55.35759641075862;s:4:\"TEXT\";s:104:\"МЯСОROOB, бургерная###RN###+7 (3842) 34‒98‒11###RN######RN###ПН-ВС  10:00 – 22:00\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		)
	),
	false
);?>
			</p>
		</div>
		<div class="clear">
		</div>
		<div class="small_map2">
			<p class="small_map2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.11576042991836;s:10:\"yandex_lon\";d:39.030994726441286;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.030994726441286;s:3:\"LAT\";d:45.115760429899176;s:4:\"TEXT\";s:26:\"г.Краснодар,ул.Комарова,32\";}}}",
		"MAP_HEIGHT" => "250",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
	</div>
</div>
<!--Конец четвертой карты-->
<!--Пятая карта-->
<div class="wrapper_center">
	<div class="contact" style="margin-top:50px;">
		<div class="contact_info">
			<table style="width:90%;">
			<tbody>
			<tr>
				<td colspan="2">
					<div style="text-align: center;">
 <img width="270" src="/upload/medialibrary/193/193aace62781cbe5c45688ade2931927.jpg">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/4d5/4d528c4519e40815afbe01d67c1c8db4.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Советский, 43</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 34‒98‒11</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">ПН–ВС 08:00-22:00</span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					 &nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">
 <img width="35" src="/upload/medialibrary/d91/d91daebfd08e647f6248673f20047ae0.jpg" height="35" style="margin-left: 10px;"><span style="margin-left: 10px; font-size: 16px;"><b>Весенняя, 2</b></span><br>
 <img width="15" src="/upload/medialibrary/919/919c1179a0bb793895efd42f820eab58.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">+7 (3842) 58‒23‒42</span><br>
 <img width="15" src="/upload/medialibrary/c34/c3410bb561e778165c6f1650ab26cb31.jpg" height="15" style="margin-left: 55px;"><span style="margin-left: 10px; font-size:14px; padding-top: 10px;">
 ПН-ПТ 08:00 — 22:00</span></br>
 <span style="margin-left: 85px; font-size:14px; padding-top: 10px;">СБ-ВС 09:00 — 22:00</br>
 </span>
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		<div class="contact_map">
			<p class="big_map">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"yandex_map", 
	array(
		"COMPONENT_TEMPLATE" => "yandex_map",
		"CONTROLS" => array(
			0 => "ZOOM",
		),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.35880105318223;s:10:\"yandex_lon\";d:86.08064497351099;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:2:{i:0;a:3:{s:3:\"LON\";d:86.075257932541;s:3:\"LAT\";d:55.357211345408;s:4:\"TEXT\";s:128:\"LеМур, сеть кофеен-кондитерских###RN###+7 (3842) 34‒98‒11###RN######RN###ПН-ВС 08:00 – 22:00\";}i:1;a:3:{s:3:\"LON\";d:86.085451492065;s:3:\"LAT\";d:55.360047867573;s:4:\"TEXT\";s:169:\"LеМур, сеть кофеен-кондитерских###RN###+7 (3842) 58‒23‒42###RN######RN###ПН-ПТ 08:00 – 22:00###RN###СБ-ВС 09:00 – 22:00\";}}}",
		"MAP_HEIGHT" => "300",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(
			0 => "ENABLE_DBLCLICK_ZOOM",
			1 => "ENABLE_DRAGGING",
		)
	),
	false
);?>
			</p>
		</div>
		<div class="clear">
		</div>
		<div class="small_map2">
			<p class="small_map2">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"yandex_map",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.11576042991836;s:10:\"yandex_lon\";d:39.030994726441286;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.030994726441286;s:3:\"LAT\";d:45.115760429899176;s:4:\"TEXT\";s:26:\"г.Краснодар,ул.Комарова,32\";}}}",
		"MAP_HEIGHT" => "250",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
	)
);?>
			</p>
		</div>
	</div>
</div>
<!--Конец пятой карты-->

<div name="other_contacts">
	<h2 style="margin-top: 65px;">Дополнительные контактные данные</h2>
	<div style="display: flex; min-height: 150px; flex-wrap: wrap; justify-content: space-around; align-items: center; padding: 0 2%; background-color: #ffffff; margin-bottom: 0px;">
		 <!--Первый элемент.-->
		<div style="display: flex; align-items: center; margin: 20px 0;">
			<div style="flex-grow: 1; width: 300px; height: 290px; border: 1px solid #c6c6c6; padding: 10px;">
				<table style="width: 100%; margin: 20px;">
				<tbody>
				<tr>
					<td style="width: 26%;">
 <img src="/upload/medialibrary/d94/d9466dadad56c22a415b7b67ddccef0e.jpg" style="width: 100%;">
					</td>
					<td style="vertical-align: middle; text-align: left;">
						<p style="margin-top: 0; margin-left: 20px;">
 <b style="text-transform: uppercase;">Банкетный сервис</b><br>
							 Заказ выездных<br>
							 банкетов
						</p>
					</td>
				</tr>
				</tbody>
				</table>
				<p style="margin-top: 10px; padding-left: 20px; padding-right: 20px;">
 <b>Контактное лицо:</b><br>
					 Юлия Ульященко — Директор по операционной деятельности<br>
 <br>
 <b>Тел.:</b> +7 (3842) 68-08-58<br>
 <b>E-mail:</b> <a href="mailto:ops@tastylife.ru" title="Написать письмо">ops@tastylife.ru</a>
				</p>
			</div>
		</div>
		 <!--Второй элемент.-->
		<div style="display: flex; align-items: center; margin: 20px 0;">
			<div style="flex-grow: 1; width: 300px; height: 290px; border: 1px solid #c6c6c6; padding: 10px;">
				<table style="width: 100%; margin: 20px;">
				<tbody>
				<tr>
					<td style="width: 26%;">
 <img src="/upload/medialibrary/6e8/6e8c15f67c9cdf31148a3e13b3dac97c.jpg" style="width: 100%;">
					</td>
					<td style="vertical-align: middle; text-align: left;">
						<p style="margin-top: 0; margin-left: 20px;">
 <b style="text-transform: uppercase;">Заказ подарочных сертификатов</b>
						</p>
					</td>
				</tr>
				</tbody>
				</table>
				<p style="margin-top: 10px; padding-left: 20px; padding-right: 20px;">
					 Обратись в один из наших ресторанов и закажи подарочный набор или сертификат, в честь предстоящего праздника.
				</p>
			</div>
		</div>
		 <!--Четвертый элемент.-->
		<div style="display: flex; align-items: center; margin: 20px 0;">
			<div style="flex-grow: 1; width: 300px; height: 290px; border: 1px solid #c6c6c6; padding: 10px;">
				<table style="width: 100%; margin: 20px;">
				<tbody>
				<tr>
					<td style="width: 26%;">
 <img src="/upload/medialibrary/fe5/fe589d386553ae483e1f6a62b8574f6d.jpg" style="width: 100%;">
					</td>
					<td style="vertical-align: middle; text-align: left;">
						<p style="margin-top: 0; margin-left: 20px;">
 <b style="text-transform: uppercase;">Коммерческий<br>
							 отдел</b>
						</p>
					</td>
				</tr>
				</tbody>
				</table>
				<p style="margin-top: 10px; padding-left: 20px; padding-right: 20px;">
 <b>Контактное лицо:</b><br>
					 Юлия Ульященко — Директор по операционной деятельности<br>
 <br>
 <b>Тел.:</b> +7 (3842) 68-08-58<br>
 <b>E-mail:</b> <a href="mailto:ops@tastylife.ru" title="Написать письмо">ops@tastylife.ru</a>
				</p>
			</div>
		</div>
		 <!--Третий элемент.-->
		<div style="display: flex; align-items: center; margin: 20px 0;">
			<div style="flex-grow: 1; width: 300px; height: 290px; border: 1px solid #c6c6c6; padding: 10px;">
				<table style="width: 100%; margin: 20px;">
				<tbody>
				<tr>
					<td style="width: 26%;">
 <img src="/upload/medialibrary/9ee/9eecaaf9bb7f58a572177e4d2509ce42.jpg" style="width: 100%;">
					</td>
					<td style="vertical-align: middle; text-align: left;">
						<p style="margin-top: 0; margin-left: 20px;">
 <b style="text-transform: uppercase;">Отдел кадров</b>
						</p>
					</td>
				</tr>
				</tbody>
				</table>
				<p style="margin-top: 10px; padding-left: 20px; padding-right: 20px;">
 <b>Контактное лицо:</b><br>
					 Екатерина Зарецкая — Директор по персоналу<br>
 <br>
 <b>Тел.:</b> +7 (923) 605-01-61<br>
 <b>E-mail:</b> <a href="mailto:hr.dir@tastylife.ru" title="Написать письмо">hr.dir@tastylife.ru</a>
				</p>
			</div>
		</div>
		 <!--Пятый элемент.-->
		<div style="display: flex; align-items: center; margin: 20px 0;">
			<div style="flex-grow: 1; width: 300px; height: 290px; border: 1px solid #c6c6c6; padding: 10px;">
				<table style="width: 100%; margin: 20px;">
				<tbody>
				<tr>
					<td style="width: 26%;">
 <img src="/upload/medialibrary/aac/aac11b12f4bb3cec8263c7c22230116b.jpg" style="width: 100%;">
					</td>
					<td style="vertical-align: middle; text-align: left;">
						<p style="margin-top: 0; margin-left: 20px;">
 <b style="text-transform: uppercase;">Техническая поддержка</b>
						</p>
					</td>
				</tr>
				</tbody>
				</table>
				<p style="margin-top: 10px; padding-left: 20px; padding-right: 20px;">
 <b>Контактное лицо:</b><br>
					 Виталий Шевченко — Системный администратор<br>
 <br>
 <b>E-mail:</b> <a href="mailto:shevv@mail.ru" title="Написать письмо">shevv@mail.ru</a>
				</p>
			</div>
		</div>
		 <!--Шестой элемент.-->
<div style="display: flex; align-items: center; margin: 0px 0;">
			<div style="flex-grow: 1; width: 300px; height: 10px;">
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="contact_form">
	<div class="wrapper_center clearfix">
		<div class="form_title">
			<p>
				 Обратный звонок
			</p>
			 Представьтесь, мы вам перезвоним.
		</div>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"contact_email",
	Array(
		"COMPONENT_TEMPLATE" => "contact_email",
		"EMAIL_TO" => COption::GetOptionString("main","email_from"),
		"EVENT_MESSAGE_ID" => array(0=>"10",),
		"OK_TEXT" => ",   .",
		"REQUIRED_FIELDS" => array(),
		"USE_CAPTCHA" => "N"
	)
);?>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>