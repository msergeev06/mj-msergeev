<?php

//echo "Open public directory: /msergeev/public/[package]";

include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
header('Content-type: text/html; charset=utf-8');
//MSergeev\Core\Lib\Loader::IncludePackage("dates");
//MSergeev\Core\Lib\Loader::IncludePackage("icar");
//MSergeev\Core\Lib\Loader::IncludePackage("apihelp");
//MSergeev\Core\Lib\Loader::IncludePackage("products");
//MSergeev\Core\Lib\Loader::IncludePackage("tasks");
//MSergeev\Core\Lib\Loader::IncludePackage("finances");
MSergeev\Core\Lib\Loader::IncludePackage("calendar");

use MSergeev\Packages\Dates\Tables;
use MSergeev\Packages\ICar\Tables\CarGearboxTable;
use MSergeev\Core\Lib\Tools;
use MSergeev\Core\Lib\Installer;
use MSergeev\Core\Lib\Buffer;
use MSergeev\Core\Lib\Config;
use \MSergeev\Packages\Tasks\Lib as TaskLib;
Buffer::start("page");
Buffer::addJS(Config::getConfig("CORE_ROOT")."js/jquery-1.11.3.js");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=Buffer::showTitle("Главная");?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?=Buffer::showCSS()?>
	<?=Buffer::showJS()?>
</head>
<body>
<?
//WorkCalendar::createTable();
/*
$res = WorkCalendar::getNearestDates(array(
		"day" => 1,
		"month" => 1,
		"year" => 2016
));
*/
/*
$res = WorkCalendarTable::getList(array(
								"filter" => array(
									"DAY" => 1,
									"MONTH" => 1,
									"YEAR" => 2016
								)
							));
*/
//$res = WorkCalendarTable::createTableQuery();
//$code = Tools::generateCode("Михаил Сергеев");
//CarGearboxTable::insertDefaultRows();
//$res = Tools::getClassNameByTableName("ms_icar_car_gearbox");
//Installer::createPackageTables("calendar");
//\MSergeev\Packages\Currency\Lib\Currency::getRates("RUB",array("USD","EUR"));
//msDebug(\MSergeev\Packages\Currency\Lib\Currency::getCurrencyRate("RUB","JPY"));
//msDebug(\MSergeev\Packages\Currency\Lib\Currency::convertCurrency(10,"USD","RUB"));
//$res = MSergeev\Packages\Icar\Tables\RepairTable::createTable();
//$res = MSergeev\Packages\Calendar\Tables\EventsTable::createTable();
$res = MSergeev\Packages\Calendar\Tables\UsersTable::createTable();
/*
$res = MSergeev\Packages\Products\Tables\FreezerTable::createTable();
msDebug($res);
$res = MSergeev\Packages\Products\Tables\FreezerTable::insertDefaultRows();
msDebug($res);

*/
//\MSergeev\Core\Lib\Options::setOption('finances_default_currency','RUB');
//Installer::createPackageTables("tasks");
//$arResult = TaskLib\Groups::getGroupTree();
//$arResult['SELECT'] = TaskLib\Groups::getSelectArray($arResult['ITEMS']);

//msDebug($arResult);
//$res = MSergeev\Packages\Apihelp\Tables\SectionsTable::createTable();
//$res = MSergeev\Packages\Apihelp\Tables\PagesTable::createTable();
//$res = MSergeev\Core\Tables\SectionsTable::createTable();
/*$arSection = array(
	'ACTIVE' => true,
	'SORT' => 500,
	'NAME' => 'Аткенсон, Рон',
	'PARENT_SECTION_ID' => 9
);*/
//$res = MSergeev\Core\Lib\Sections::activateSection(6);
//msDebug($res);


/** Одноклассники */
/*
$user_agent = 'Mozilla/5.0 (Windows; U; Windows NT 6.0; ru; rv:1.9.2.13) ' .
	'Gecko/20101203 Firefox/3.6.13 ( .NET CLR 3.5.30729)';
ignore_user_abort(true);
//set_time_limit(0);

	$login = '+79055969738';
	$password = '1qz2wx3';
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/botok1.txt');
	curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/botok1.txt');
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, 'http://www.odnoklasniki.ru/dk?cmd=AnonymLogin&st.cmd=anonymLogin'/*&tkn=941'*);

	$post = array(
		'st.redirect' => '',
		'st.posted' => 'set',
		'st.email' => $login,
		'st.password' => $password,
		'st.screenSize' => '',
		'st.browserSize' => '',
		'st.flashVer' => ''
	);

	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	$answer = curl_exec($ch);

	curl_close($ch);
	msDebug($answer);
*/

?>
<?//echo InputCalendar("calendar"); ?>
<? //echo SelectBox("groups",$arResult['SELECT']['LIST'],"---Верхний уровень---","NULL"); ?>

</body></html>

