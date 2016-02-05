<?php
header('Content-type: text/html; charset=utf-8');
//https://identity.beeline.ru/identity/fpcc
//Redirect to: https://identity.beeline.ru/identity/connect/authorize
//?scope=openid+selfservice_identity+usss_token+profile
//&response_type=id_token
//&client_id=quantumartapp
//&state=5e3cd0f5603e4c2eac76f5cda78f5d82
//&nonce=a9e91b88d8174aa5b712e0b4b24dc0a9
//&response_mode=form_post
//&acr_values=fpcc-password:EAAAAAbSt586X7bGKKtW7kWoQSS%2ffM1JGiA5vhKZTxXLyFKu+fpcc-remember_me:False
//&login_hint=9654320190
//&redirect_uri=https:%2f%2fwww.beeline.ru%2flogincallback
//&prompt=login
/*
client_id	    quantumartapp
redirect_uri	https://www.beeline.ru/logincallback
response_type	id_token
response_mode	form_post
state	        5e3cd0f5603e4c2eac76f5cda78f5d82
nonce	        a9e91b88d8174aa5b712e0b4b24dc0a9
scope	        openid selfservice_identity usss_token profile
remember_me	    false
login	        9654320190
password	    hKjpTg3VCg!

 */


$url = 'https://moskva.beeline.ru/login/';                                // URL сайта на котором будем авторизоваться
$urlTo = 'https://identity.beeline.ru/identity/fpcc';                               // URL на которой будем слать POST данные
$login = '9654320190';                          // Ваш логин
$pass = 'hKjpTg3VCg!';                                     // Ваш пароль
$post = "scope=openid+selfservice_identity+usss_token+profile"
	."&redirect_uri=https:%2f%2fwww.beeline.ru%2flogincallback"
	."&response_type=id_token"
	."&client_id=quantumartapp"
	."&remember_me=false"
	."&response_mode=form_post"
	."&login=".$login
	."&password=".$pass;



$ch = curl_init();                              // Инициализируем сеанс CURL
curl_setopt($ch, CURLOPT_URL, $url);            // Заходим на сайт
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Делаем так, чтобы страница не выдавалась сразу в поток, а можно было ее записать в переменную
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$html = curl_exec($ch);                         // Имитируем заход на сайт

preg_match_all('/\bname="([^"]*)" value="([^"]*)"/i', $html, $matches);
$arMatches = array();
for ($i=0; $i<count($matches[1]); $i++)
{
	$arMatches[$matches[1][$i]] = urlencode($matches[2][$i]);
}
$post = "login=".$login."&password=".$pass;
foreach ($arMatches as $key=>$value)
{
	$post .= "&".$key."=".$value;
}

/*
echo $post."<pre>";
var_dump($arMatches);
echo "</pre>";
*/


//echo $html; die();
$html1 = $html;

curl_setopt($ch, CURLOPT_URL, $urlTo);              // Устанавливаем адрес куда будем слать POST данные
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');  // Записываем cookies в файл, чтобы потом можно было их считать
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); // Теперь читаем cookies с файла
curl_setopt($ch, CURLOPT_POST, true);               // Говорим, что информация будет отправляться методом POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);        // Передаем POST данные
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);     // Иногда бывает, что после отправки данных происходит редирект heaer('Location:...').
// Этот параметр говорит о то, чтобы мы следовали за ними, а не оставались на месте после отправки данных

$html = curl_exec($ch); // Записываем пришедшие данные в переменную

$html2 = $html;
//$html  = str_replace("</form>",'<input type="submit" value="GO">',$html);
//echo $html;die();

$id_token = $scope = $state = $session_state = $urlTo2 = $need_set_sso_cookie = "";
$matches = array();
//preg_match('/^.*form.*action="(.*)".*+$/', $html, $urlTo2);
preg_match_all('/\bname="([^"]*)" value="([^"]*)"/i', $html, $matches);
/*
preg_match('/^.*id_token.*value="(.*)".*+$/',  $html, $id_token);
preg_match('/^.*scope.*value="(.*)".*+$/',  $html, $scope);
//$scope = str_replace(" ","+",$scope);
preg_match('/^.*"state.*value="(.*)".*+$/',  $html, $state);
preg_match('/^.*"session_state.*value="(.*)".*+$/',  $html, $session_state);
preg_match('/^.*"need_set_sso_cookie.*value="(.*)".*+$/',  $html, $need_set_sso_cookie);
*/
$arMatches = array();
for ($i=0;$i<count($matches[1]);$i++)
{
	$arMatches[$matches[1][$i]] = urlencode($matches[2][$i]);
}
$post = "id_token=".$arMatches["id_token"]
	."&scope=".$arMatches["scope"]
	."&state=".$arMatches["state"]
	."&session_state=".$arMatches["session_state"]
	."&need_set_sso_cookie=".$arMatches["need_set_sso_cookie"];
preg_match_all('/\bform.*action="([^"]*)"/i', $html, $matches);
$urlTo2 = $matches[1][0];

/*
echo "<pre>";
var_dump($matches);
echo "</pre>";
*/

curl_setopt($ch, CURLOPT_URL, $urlTo2);              // Устанавливаем адрес куда будем слать POST данные
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');  // Записываем cookies в файл, чтобы потом можно было их считать
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); // Теперь читаем cookies с файла
curl_setopt($ch, CURLOPT_POST, true);               // Говорим, что информация будет отправляться методом POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);        // Передаем POST данные
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);     // Иногда бывает, что после отправки данных происходит редирект heaer('Location:...').

$html = curl_exec($ch);
curl_close($ch);        // Закрываем сеанс работы CURL

$html3 = $html;

//echo /*$html1.*/$html3;