<?php
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('BX_NO_ACCELERATOR_RESET', true);
define('CHK_EVENT', true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

@set_time_limit(0);
@ignore_user_abort(true);

//CAgent::CheckAgents();
//define("BX_CRONTAB_SUPPORT", true);
//define("BX_CRONTAB", true);
//CEvent::CheckEvents();
//
//if(CModule::IncludeModule('sender'))
//{
//    \Bitrix\Sender\MailingManager::checkPeriod(false);
//    \Bitrix\Sender\MailingManager::checkSend();
//}



$arFilter = Array("IBLOCK_ID"=>10, "ID"=>59);
CModule::IncludeModule("iblock");
$res = CIBlockElement::GetList(Array(), $arFilter);
if ($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();

    $arFields['TIMESTAMP_X'] = str_replace(".", "-",  $arFields['TIMESTAMP_X']);

//    echo 'Всего: '.$arProps['TOTAL']['VALUE'];
//    echo "<br>";
//    echo 'Всего реальных заказов: '.$arProps['TOTAL_REAL']['VALUE'];
//    echo "<br>";
//    echo '9.00-10.59 (1 заказ в * минут): '.$arProps['NINE']['VALUE'];
//    echo "<br>";
//    echo '11.01-12.59 (1 заказ в * минут): '.$arProps['ELEVEN']['VALUE'];
//    echo "<br>";
//    echo '13.01-16.59 (1 заказ в * минут): '.$arProps['THIRTEEN']['VALUE'];
//    echo "<br>";
//    echo '17.01-18.59 (1 заказ в * минут): '.$arProps['SEVENTEEN']['VALUE'];
//    echo "<br>";
//    echo '19.01-21.59 (1 заказ в * минут): '.$arProps['NINETEEN']['VALUE'];
//    echo "<br>";
//    echo 'Время последней записи: '.$arFields['TIMESTAMP_X'];
//    echo "<br>";

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

    $old_date =  new DateTime($arFields['TIMESTAMP_X']);
    $new_date = new DateTime(date("d-m-Y H:i:s"));
    $interval = $old_date->diff($new_date);
    echo $interval->format('%d-%m-%Y %H:%I:%S');





    if(date('H')>=9 && date('H')<11) {

        if($interval->format("%I") >= $arProps['NINE']['VALUE']){
            $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
            $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
        }

    }elseif(date('H')>=11 && date('H')<13){

        if($interval->format("%I") >= $arProps['ELEVEN']['VALUE']){
            $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
            $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
        }

    }elseif(date('H')>=13 && date('H')<17){

        if($interval->format("%I") >= $arProps['ELEVEN']['VALUE']){
            $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
            $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
        }

    }elseif(date('H')>=17 && date('H')<19){

        if($interval->format("%I") >= $arProps['SEVENTEEN']['VALUE']){
            $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
            $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
        }

    }elseif(date('H')>=19 && date('H')<22){

        if($interval->format("%I") >= $arProps['NINETEEN']['VALUE']){
            $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = $arProps['TOTAL']['VALUE']+1;
            $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
        }
    }elseif(date('H')>=0){
        $arLoadProductArray['PROPERTY_VALUES']["TOTAL"] = 0;
        $PRODUCT_ID = $el->Update(59, $arLoadProductArray);
    }

endif;



//require($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/tools/backup.php");
