<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

require_once 'swiftmailer/swift_required.php';
 
function custom_mail($to, $subject, $msg, $additionalHeaders)
{
     if(strpos($additionalHeaders, "text/plain")){
        $text_type = "text/plain"; 
     }
     else{
        $text_type = "text/html";
     }
    $toList = explode(',',$to);
     
    Swift_Preferences::getInstance()->setCharset('UTF-8');
     
    $transport = Swift_SmtpTransport::newInstance('smtp.yandex.ru')
        ->setPort(465)
        ->setEncryption('ssl')
        ->setUsername('tastylife.site@yandex.ru')
        ->setPassword('pYJ4nN32Lpc4')
    ;
     
    $mailer = Swift_Mailer::newInstance($transport);
     
    $message = Swift_Message::newInstance($subject)
        ->setFrom(array('tastylife.site@yandex.ru' => 'Tasty Life'))
        ->setTo($toList)
        ->setBody($msg,$text_type)
    ;
     
    $result = $mailer->send($message); 
  
}


CModule::includeModule('ws.projectsettings');
function s($array, $user_id = false)
{
	if(intval($user_id))
	{
		global $USER;
		if($USER->GetId() == $user_id)
		{
			echo "<pre>"; print_r($array); echo "</pre>";
		}
	}
	else
	{
		echo "<pre>"; print_r($array); echo "</pre>";
	}
}
  function removeDirectory($dir)
{
    if ($objs = glob($dir."/*")) {
       foreach($objs as $obj) {
         is_dir($obj) ? removeDirectory($obj) : unlink($obj);
       }
    }
    rmdir($dir);
}
// принадлежит ли пользователь группе
function userAccessory($id)
{
	global $USER;
	$arGroups = $USER->GetUserGroupArray();
	foreach($arGroups as $group)
	{
		if($group == $id)
		{
			return 1;
			break;
		}
	}
}

function tovar_sklonenie($number, $endingArray)

{

$number = $number % 100;

if ($number>=11 && $number<=19)

{

$ending=$endingArray[2];

} else 	{

$i = $number % 10;

switch ($i)	{

case (1): $ending = $endingArray[0]; break;

case (2):	case (3):	case (4): $ending = $endingArray[1]; break;

default: $ending=$endingArray[2];	}

}

return $ending;

}


/**
 * Меняет значение параметра в URL.
 * Если параметра нет, то он добавляется в конец URL.
 * Если значение параметра равно NULL, то он вырезается из URL.
 * Так же дописывает или удаляет идентификатор сессии.
 *
 * @param    string        $url         если не задан, то берется из $_SERVER['REQUEST_URI']
 * @param    string/array  $arg         может быть так же ассоциативным массивом,
 *                                      в этом случае третий параметр не используется
 * @param    string/null   $value
 * @param    bool          $is_use_sid  дописывать/вырезать параметр с идентификатором сессии?
 *                                      идентификатор сессии дописывается для только для текущего хоста
 * @return   string
 * @see      http_build_query()
 *
 * @author   Nasibullin Rinat <n a s i b u l l i n  at starlink ru>
 * @charset  ANSI
 * @version  1.2.0
 */

function urlReplaceArg($url, $arg, $value = null, $is_use_sid = false)
{
    static $tr_table = array(
        '\['  => '(?:\[|%5B)',
        '\]'  => '(?:\]|%5D)',
        '%5B' => '(?:\[|%5B)',
        '%5D' => '(?:\]|%5D)',
    );

    if (is_string($arg))    $args = array($arg => $value);
    elseif (is_array($arg)) $args = $arg;
    else
    {
        trigger_error('An array or string type expected in second parameter, ' . gettype($arg) . ' given ', E_USER_WARNING);
        return $url;
    }
    if (! $url) $url = $_SERVER['REQUEST_URI'];
    $original_url = $url;

    /*
    при необходимости дописываем/вырезаем параметр с идентификатором сессси,
    т.к. output_add_rewrite_var() тупо добавит еще один
    May be good idea to make output_REPLACE_rewrite_var() function? :)
    http://bugs.php.net/bug.php?id=43234
    */
    $args[session_name()] = null;
    if ($is_use_sid && session_id())
    {
        $host = parse_url($url, PHP_URL_HOST);
        if (! $host || $host === $_SERVER['HTTP_HOST']) $args[session_name()] = session_id();
    }

    $count = 0;

//echo "<b>$url</b><br>";

    $url = str_replace('?', '?&', $url, $count);
    if ($count > 1)
    {
        trigger_error('Incorrect URL with more then one "?"!', E_USER_WARNING);
        return $original_url;
    }

    foreach ($args as $arg => $value)
    {
        #проверяем название параметра на допустимые символы
        if (! preg_match('/^[^\?&#=\x00-\x20\x7f]+$/s', $arg))
        {
            trigger_error('Illegal characters found in arguments. See second parameter (' . gettype($arg) . ' type given)!', E_USER_WARNING);
            return $original_url;
        }
        $re_arg = strtr(preg_quote($arg, '/'), $tr_table);
        if (preg_match('/(&' . $re_arg . '=)[^\?&#=\x00-\x20\x7f]*/s', $url, $m))
        {
            #заменяем или вырезаем параметр, если он существует
            $v = is_null($value) ? '' : $m[1] . rawurlencode($value);
            $url = str_replace($m[0], $v, $url);
            continue;
        }
        if (is_null($value)) continue; #вырезаем параметр из URL
        #добавляем параметр в конец URL
        $div = strpos($url, '?') !== false ? '&' : '?';
        $url = $url . $div . $arg . '=' . rawurlencode($value);
    }#foreach
    return rtrim(str_replace('?&', '?', $url), '?');
}

// ------------------------------------------------   Количесво товара на странице

function kol_tovar_page()

{
if (isset($_GET['kol']) )
{
    $_SESSION['kol_tovar_page_catalog'] = $_GET['kol'];
} else {
    if( !isset($_SESSION['kol_tovar_page_catalog'])) $_SESSION['kol_tovar_page_catalog'] = 30;
}

$kol_tovar_page_catalog_temp = $_SESSION['kol_tovar_page_catalog'];

// echo $kol_tovar_page_catalog_temp;

return $kol_tovar_page_catalog_temp;

}


// ------------------------------------------------   Количесво товара на странице

function type_show_catalog()

{
if (isset($_GET['type_show']) )
{
    $_SESSION['type_show'] = $_GET['type_show'];
} else {
    if( !isset($_SESSION['type_show'])) $_SESSION['type_show'] = "pl";
}

$type_show_temp = $_SESSION['type_show'];

// echo $kol_tovar_page_catalog_temp;

return $type_show_temp;

}

// ----------------------------------------------------------  Склонение товаров

function sklonenie_tovarov($number, $endingArray)

{

$number = $number % 100;

if ($number>=11 && $number<=19)

{

$ending=$endingArray[2];

} else  {

$i = $number % 10;

switch ($i) {

case (1): $ending = $endingArray[0]; break;

case (2):   case (3):   case (4): $ending = $endingArray[1]; break;

default: $ending=$endingArray[2];   }

}

return $ending;

}










if($_POST['zakaz_number']){
    die(print_r($_POST));
}



class A_Order {

    const SBERBANK_LOGIN_API = 'Tasty-Life-api';
    const SBERBANK_LOGIN_OPERATOR = 'Tasty-Life-operator';
    const SBERBANK_PASSWORD = 'Tasty-Life';
    const SBERBANK_REST_URL = 'https://3dsec.sberbank.ru/payment/rest';

    protected static $fromAdmin = false;
    protected static $table = 'mod_orders';


    /**
     * Регистрирует заказ в системе СБЕРБАНКА
     * @param int $orderId - Id заказа на стороне ИМ
     * @param int $amount - Сумма платежа в копейках
     * @param string $returnUrl - Адрес, на который требуется перенаправить пользователя в случае успешной оплаты
     * @param array $extParams - дополнительные параметры. Могут перезатирать предыдущие значения
     * @return array
     */
    public static function sb_orderRegister($orderId, $amount, $returnUrl, $extParams = array())
    {
        $url = self::SBERBANK_REST_URL . '/register.do';


        $params = array();
        $params['orderNumber'] = $orderId;
        $params['amount'] = $amount;
        $params['returnUrl'] = $returnUrl;
        $params = array_merge($params, $extParams);

        $result = self::_getWebPageByCURL($url, $params);
        return $result;
    }

    public static function sb_orderStatus($orderId, $extParams = array())
    {
        $url = self::SBERBANK_REST_URL . '/getOrderStatus.do';

        $params = array();
        $params['orderNumber'] = $orderId;
        $params['orderId']= $_GET['orderId'];
        $params = array_merge($params, $extParams);

        $result = self::_getWebPageByCURL($url, $params);
        return $result;
    }


    /**
     * Собирает запрос для обращения на указанный url по работе со СБЕРБАНКОМ.
     * Используется cURL + протокол TLS v1.2
     * @param string $url
     * @param array $params
     * @return array
     */
    private static function _getWebPageByCURL($url, $params)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true, // return web page
            CURLOPT_HEADER => false, // don't return headers
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false, // Disabled SSL Cert checks
            CURLOPT_SSLVERSION => 6 //Integer NOT string TLS v1.2
        );

        $params['userName'] = self::SBERBANK_LOGIN_API;
        $params['password'] = self::SBERBANK_PASSWORD;
        $url = $url . '?' . http_build_query($params);


        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        $header['errno'] = $err;
        $header['errmsg'] = $errmsg;
        $header['content'] = $content;
        return $header;
    }

}




?>