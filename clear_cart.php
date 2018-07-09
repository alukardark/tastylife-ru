<?// подключение служебной части пролога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?> 

<?
session_unset() ;
?>
 
<?// подключение служебной части эпилога  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>