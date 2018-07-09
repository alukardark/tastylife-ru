<?// РїРѕРґРєР»СЋС‡РµРЅРёРµ СЃР»СѓР¶РµР±РЅРѕР№ С‡Р°СЃС‚Рё РїСЂРѕР»РѕРіР°  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?
session_start();
 
CModule::IncludeModule("iblock");
$all_summ = htmlspecialcharsbx($_REQUEST["all_summ"]);

?>
<iframe class="yandex_oplata_form" frameborder="0" allowtransparency="true" scrolling="no" 
src="https://money.yandex.ru/quickpay/shop-widget
?account=410011258410422
&quickpay=shop
&payment-type-choice=on
&mobile-payment-type-choice=on&writer=seller
&targets=<?=$zakaz_number?>&targets-hint=&default-sum=<?=htmlspecialcharsbx($all_summ)?>&button-text=01&successURL=" width="450" height="213"></iframe>

 
<?// РїРѕРґРєР»СЋС‡РµРЅРёРµ СЃР»СѓР¶РµР±РЅРѕР№ С‡Р°СЃС‚Рё СЌРїРёР»РѕРіР°  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>