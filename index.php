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
//MSergeev\Core\Lib\Loader::IncludePackage("calendar");
MSergeev\Core\Lib\Loader::IncludePackage("owm");

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
//Installer::createPackageTables("owm");
//\MSergeev\Packages\Currency\Lib\Currency::getRates("RUB",array("USD","EUR"));
//msDebug(\MSergeev\Packages\Currency\Lib\Currency::getCurrencyRate("RUB","JPY"));
//msDebug(\MSergeev\Packages\Currency\Lib\Currency::convertCurrency(10,"USD","RUB"));
//$res = MSergeev\Packages\Icar\Tables\RepairTable::createTable();
//$res = MSergeev\Packages\Calendar\Tables\EventsTable::createTable();
//$res = MSergeev\Packages\Calendar\Tables\UsersTable::createTable();
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

//$res = MSergeev\Packages\Owm\Tables\TimezoneTable::createTable();
\MSergeev\Packages\Owm\Lib\Weather::getWeather();


//$weatherXML = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=524901&appid=ee04dde0551874138ce0843f64e1ed19&mode=xml&units=metric&lang=ru");
//$weatherXML = simplexml_load_file("http://api.openweathermap.org/data/2.5/weather?id=524901&appid=ee04dde0551874138ce0843f64e1ed19&mode=xml&units=metric&lang=ru");
//$json = json_encode($weatherXML);
//$arWeather = json_decode($json,TRUE);
/*
$arWeather = unserialize('a:5:{s:8:"location";a:5:{s:4:"name";s:6:"Moscow";s:4:"type";a:0:{}s:7:"country";s:2:"RU";s:8:"timezone";a:0:{}s:8:"location";a:1:{s:11:"@attributes";a:5:{s:8:"altitude";s:1:"0";s:8:"latitude";s:8:"55.75222";s:9:"longitude";s:9:"37.615555";s:7:"geobase";s:8:"geonames";s:9:"geobaseid";s:1:"0";}}}s:6:"credit";a:0:{}s:4:"meta";a:3:{s:10:"lastupdate";a:0:{}s:8:"calctime";s:5:"0.004";s:10:"nextupdate";a:0:{}}s:3:"sun";a:1:{s:11:"@attributes";a:2:{s:4:"rise";s:19:"2016-09-28T03:28:00";s:3:"set";s:19:"2016-09-28T15:10:41";}}s:8:"forecast";a:1:{s:4:"time";a:35:{i:0;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-28T12:00:00";s:2:"to";s:19:"2016-09-28T15:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"803";s:4:"name";s:16:"пасмурно";s:3:"var";s:3:"04d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"329.002";s:4:"code";s:3:"NNW";s:4:"name";s:15:"North-northwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"1.76";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"11.53";s:3:"min";s:3:"8.1";s:3:"max";s:5:"11.53";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1012.69";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"72";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:1;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-28T15:00:00";s:2:"to";s:19:"2016-09-28T18:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.01";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"322.004";s:4:"code";s:2:"NW";s:4:"name";s:9:"Northwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"1.22";s:4:"name";s:4:"Calm";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"8.53";s:3:"min";s:4:"5.96";s:3:"max";s:4:"8.53";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1011.75";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"80";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"88";s:4:"unit";s:1:"%";}}}i:2;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-28T18:00:00";s:2:"to";s:19:"2016-09-28T21:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.03";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"291.501";s:4:"code";s:3:"WNW";s:4:"name";s:14:"West-northwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"0.77";s:4:"name";s:4:"Calm";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"6.95";s:3:"min";s:4:"5.24";s:3:"max";s:4:"6.95";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1010.54";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"84";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"56";s:4:"unit";s:1:"%";}}}i:3;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-28T21:00:00";s:2:"to";s:19:"2016-09-29T00:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.03";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"171.001";s:4:"code";s:1:"S";s:4:"name";s:5:"South";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"1.16";s:4:"name";s:4:"Calm";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"5.41";s:3:"min";s:4:"4.55";s:3:"max";s:4:"5.41";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1009.22";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"86";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"64";s:4:"unit";s:1:"%";}}}i:4;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T00:00:00";s:2:"to";s:19:"2016-09-29T03:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:5:"0.015";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:5:"126.5";s:4:"code";s:2:"SE";s:4:"name";s:9:"SouthEast";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"1.36";s:4:"name";s:4:"Calm";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"1.68";s:3:"min";s:4:"1.68";s:3:"max";s:4:"1.68";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1007.78";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"93";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:9:"clear sky";s:3:"all";s:1:"0";s:4:"unit";s:1:"%";}}}i:5;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T03:00:00";s:2:"to";s:19:"2016-09-29T06:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"801";s:4:"name";s:14:"облачно";s:3:"var";s:3:"02d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:5:"161.5";s:4:"code";s:3:"SSE";s:4:"name";s:15:"South-southeast";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.75";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"5.64";s:3:"min";s:4:"5.64";s:3:"max";s:4:"5.64";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1006.84";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"86";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:10:"few clouds";s:3:"all";s:2:"20";s:4:"unit";s:1:"%";}}}i:6;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T06:00:00";s:2:"to";s:19:"2016-09-29T09:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:5:"0.055";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"165.502";s:4:"code";s:3:"SSE";s:4:"name";s:15:"South-southeast";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.77";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"8.28";s:3:"min";s:4:"8.28";s:3:"max";s:4:"8.28";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.88";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"82";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"76";s:4:"unit";s:1:"%";}}}i:7;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T09:00:00";s:2:"to";s:19:"2016-09-29T12:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.23";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"170.005";s:4:"code";s:1:"S";s:4:"name";s:5:"South";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.48";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"8.48";s:3:"min";s:4:"8.48";s:3:"max";s:4:"8.48";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.49";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"85";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:8;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T12:00:00";s:2:"to";s:19:"2016-09-29T15:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.05";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"164.501";s:4:"code";s:3:"SSE";s:4:"name";s:15:"South-southeast";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.66";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"7.99";s:3:"min";s:4:"7.99";s:3:"max";s:4:"7.99";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.58";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"85";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:9;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T15:00:00";s:2:"to";s:19:"2016-09-29T18:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:5:"0.015";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:3:"166";s:4:"code";s:3:"SSE";s:4:"name";s:15:"South-southeast";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.32";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"6.67";s:3:"min";s:4:"6.67";s:3:"max";s:4:"6.67";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"1006.4";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"93";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"68";s:4:"unit";s:1:"%";}}}i:10;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T18:00:00";s:2:"to";s:19:"2016-09-29T21:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.02";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"173.503";s:4:"code";s:1:"S";s:4:"name";s:5:"South";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.36";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"6.01";s:3:"min";s:4:"6.01";s:3:"max";s:4:"6.01";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1006.25";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"94";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"44";s:4:"unit";s:1:"%";}}}i:11;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-29T21:00:00";s:2:"to";s:19:"2016-09-30T00:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.06";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"183.509";s:4:"code";s:1:"S";s:4:"name";s:5:"South";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.02";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"6.64";s:3:"min";s:4:"6.64";s:3:"max";s:4:"6.64";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1006.35";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"97";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"88";s:4:"unit";s:1:"%";}}}i:12;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T00:00:00";s:2:"to";s:19:"2016-09-30T03:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.12";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"184.501";s:4:"code";s:1:"S";s:4:"name";s:5:"South";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.66";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"7.46";s:3:"min";s:4:"7.46";s:3:"max";s:4:"7.46";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.15";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"98";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:13;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T03:00:00";s:2:"to";s:19:"2016-09-30T06:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.14";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"194.503";s:4:"code";s:3:"SSW";s:4:"name";s:15:"South-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.81";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"8.59";s:3:"min";s:4:"8.59";s:3:"max";s:4:"8.59";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1003.33";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"96";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:14;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T06:00:00";s:2:"to";s:19:"2016-09-30T09:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"2.42";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"203.508";s:4:"code";s:3:"SSW";s:4:"name";s:15:"South-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"6.51";s:4:"name";s:15:"Moderate breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"10.3";s:3:"min";s:4:"10.3";s:3:"max";s:4:"10.3";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1000.73";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"98";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:15;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T09:00:00";s:2:"to";s:19:"2016-09-30T12:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"501";s:4:"name";s:10:"дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"3.84";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"232.504";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"6.96";s:4:"name";s:15:"Moderate breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"11.79";s:3:"min";s:5:"11.79";s:3:"max";s:5:"11.79";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"998.84";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"96";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:16;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T12:00:00";s:2:"to";s:19:"2016-09-30T15:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10d";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"1.03";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"257.501";s:4:"code";s:3:"WSW";s:4:"name";s:14:"West-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"6.36";s:4:"name";s:15:"Moderate breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.12";s:3:"min";s:5:"13.12";s:3:"max";s:5:"13.12";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"998.43";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"94";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:17;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T15:00:00";s:2:"to";s:19:"2016-09-30T18:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.41";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:3:"270";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"6.01";s:4:"name";s:15:"Moderate breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"12.56";s:3:"min";s:5:"12.56";s:3:"max";s:5:"12.56";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"999.08";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"96";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:18;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T18:00:00";s:2:"to";s:19:"2016-09-30T21:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"1.02";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"266.504";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"5.56";s:4:"name";s:15:"Moderate breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"12.18";s:3:"min";s:5:"12.18";s:3:"max";s:5:"12.18";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"999.47";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"97";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:19;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-09-30T21:00:00";s:2:"to";s:19:"2016-10-01T00:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.11";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"279.002";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"5.37";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"11.85";s:3:"min";s:5:"11.85";s:3:"max";s:5:"11.85";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1001.06";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"95";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:20;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T00:00:00";s:2:"to";s:19:"2016-10-01T03:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.02";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:5:"284.5";s:4:"code";s:3:"WNW";s:4:"name";s:14:"West-northwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.81";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"11.47";s:3:"min";s:5:"11.47";s:3:"max";s:5:"11.47";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1002.24";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"93";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:21;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T03:00:00";s:2:"to";s:19:"2016-10-01T06:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"802";s:4:"name";s:27:"слегка облачно";s:3:"var";s:3:"03d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"278.001";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.12";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"12.01";s:3:"min";s:5:"12.01";s:3:"max";s:5:"12.01";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1003.94";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"94";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"32";s:4:"unit";s:1:"%";}}}i:22;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T06:00:00";s:2:"to";s:19:"2016-10-01T09:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"802";s:4:"name";s:27:"слегка облачно";s:3:"var";s:3:"03d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"270.503";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.81";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"14.13";s:3:"min";s:5:"14.13";s:3:"max";s:5:"14.13";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.47";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"92";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"48";s:4:"unit";s:1:"%";}}}i:23;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T09:00:00";s:2:"to";s:19:"2016-10-01T12:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"802";s:4:"name";s:27:"слегка облачно";s:3:"var";s:3:"03d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"247.508";s:4:"code";s:3:"WSW";s:4:"name";s:14:"West-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.57";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"14.98";s:3:"min";s:5:"14.98";s:3:"max";s:5:"14.98";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.78";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"88";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"36";s:4:"unit";s:1:"%";}}}i:24;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T12:00:00";s:2:"to";s:19:"2016-10-01T15:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"802";s:4:"name";s:27:"слегка облачно";s:3:"var";s:3:"03d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"218.003";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.91";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.39";s:3:"min";s:5:"13.39";s:3:"max";s:5:"13.39";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.73";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"87";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"32";s:4:"unit";s:1:"%";}}}i:25;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T15:00:00";s:2:"to";s:19:"2016-10-01T18:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.02";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"191.501";s:4:"code";s:3:"SSW";s:4:"name";s:15:"South-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.66";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"12.49";s:3:"min";s:5:"12.49";s:3:"max";s:5:"12.49";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"1005.4";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"93";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"56";s:4:"unit";s:1:"%";}}}i:26;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T18:00:00";s:2:"to";s:19:"2016-10-01T21:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:4:"0.17";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"198.505";s:4:"code";s:3:"SSW";s:4:"name";s:15:"South-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.11";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.68";s:3:"min";s:5:"13.68";s:3:"max";s:5:"13.68";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1004.66";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"96";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"64";s:4:"unit";s:1:"%";}}}i:27;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-01T21:00:00";s:2:"to";s:19:"2016-10-02T00:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"500";s:4:"name";s:23:"легкий дождь";s:3:"var";s:3:"10n";}}s:13:"precipitation";a:1:{s:11:"@attributes";a:3:{s:4:"unit";s:2:"3h";s:5:"value";s:3:"0.1";s:4:"type";s:4:"rain";}}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:3:"219";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.46";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.79";s:3:"min";s:5:"13.79";s:3:"max";s:5:"13.79";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1004.25";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"93";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:10:"few clouds";s:3:"all";s:2:"12";s:4:"unit";s:1:"%";}}}i:28;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T00:00:00";s:2:"to";s:19:"2016-10-02T03:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"800";s:4:"name";s:8:"ясно";s:3:"var";s:3:"01n";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"216.503";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.31";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"12.13";s:3:"min";s:5:"12.13";s:3:"max";s:5:"12.13";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1004.27";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"91";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:9:"clear sky";s:3:"all";s:1:"0";s:4:"unit";s:1:"%";}}}i:29;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T03:00:00";s:2:"to";s:19:"2016-10-02T06:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"801";s:4:"name";s:14:"облачно";s:3:"var";s:3:"02d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:3:"220";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"4.31";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.56";s:3:"min";s:5:"13.56";s:3:"max";s:5:"13.56";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1004.68";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"92";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:10:"few clouds";s:3:"all";s:2:"12";s:4:"unit";s:1:"%";}}}i:30;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T06:00:00";s:2:"to";s:19:"2016-10-02T09:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"802";s:4:"name";s:27:"слегка облачно";s:3:"var";s:3:"03d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"233.003";s:4:"code";s:2:"SW";s:4:"name";s:9:"Southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"5.07";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"16.57";s:3:"min";s:5:"16.57";s:3:"max";s:5:"16.57";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1005.57";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"84";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:16:"scattered clouds";s:3:"all";s:2:"44";s:4:"unit";s:1:"%";}}}i:31;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T09:00:00";s:2:"to";s:19:"2016-10-02T12:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"803";s:4:"name";s:16:"пасмурно";s:3:"var";s:3:"04d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"247.502";s:4:"code";s:3:"WSW";s:4:"name";s:14:"West-southwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"5.12";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"17.59";s:3:"min";s:5:"17.59";s:3:"max";s:5:"17.59";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"1006.9";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"76";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"56";s:4:"unit";s:1:"%";}}}i:32;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T12:00:00";s:2:"to";s:19:"2016-10-02T15:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"804";s:4:"name";s:16:"пасмурно";s:3:"var";s:3:"04d";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"269.003";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"3.92";s:4:"name";s:13:"Gentle Breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"16.04";s:3:"min";s:5:"16.04";s:3:"max";s:5:"16.04";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:6:"1008.9";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"73";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:15:"overcast clouds";s:3:"all";s:2:"92";s:4:"unit";s:1:"%";}}}i:33;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T15:00:00";s:2:"to";s:19:"2016-10-02T18:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"803";s:4:"name";s:16:"пасмурно";s:3:"var";s:3:"04n";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"286.501";s:4:"code";s:3:"WNW";s:4:"name";s:14:"West-northwest";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"2.62";s:4:"name";s:12:"Light breeze";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:5:"13.14";s:3:"min";s:5:"13.14";s:3:"max";s:5:"13.14";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1011.39";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"78";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:13:"broken clouds";s:3:"all";s:2:"80";s:4:"unit";s:1:"%";}}}i:34;a:9:{s:11:"@attributes";a:2:{s:4:"from";s:19:"2016-10-02T18:00:00";s:2:"to";s:19:"2016-10-02T21:00:00";}s:6:"symbol";a:1:{s:11:"@attributes";a:3:{s:6:"number";s:3:"801";s:4:"name";s:14:"облачно";s:3:"var";s:3:"02n";}}s:13:"precipitation";a:0:{}s:13:"windDirection";a:1:{s:11:"@attributes";a:3:{s:3:"deg";s:7:"275.002";s:4:"code";s:1:"W";s:4:"name";s:4:"West";}}s:9:"windSpeed";a:1:{s:11:"@attributes";a:2:{s:3:"mps";s:4:"1.21";s:4:"name";s:4:"Calm";}}s:11:"temperature";a:1:{s:11:"@attributes";a:4:{s:4:"unit";s:7:"celsius";s:5:"value";s:4:"9.12";s:3:"min";s:4:"9.12";s:3:"max";s:4:"9.12";}}s:8:"pressure";a:1:{s:11:"@attributes";a:2:{s:4:"unit";s:3:"hPa";s:5:"value";s:7:"1012.97";}}s:8:"humidity";a:1:{s:11:"@attributes";a:2:{s:5:"value";s:2:"92";s:4:"unit";s:1:"%";}}s:6:"clouds";a:1:{s:11:"@attributes";a:3:{s:5:"value";s:10:"few clouds";s:3:"all";s:2:"20";s:4:"unit";s:1:"%";}}}}}}');
$sunRise = $arWeather["sun"]["@attributes"]["rise"];
$sunSet = $arWeather["sun"]["@attributes"]["set"];
$arProperty = array();
$setSunDay = true;
list($sunRiseDate,$sunRiseTime) = explode("T",$sunRise);
if ($sunRiseDate == date("Y-m-d"))
{
	$sunRiseTime = explode(":",$sunRiseTime);
	$arProperty["sunRise"] = $sunRiseTime[0].":".$sunRiseTime[1];
}
else
{
	$setSunDay = false;
}
list($sunSetDate,$sunSetTime) = explode("T",$sunSet);
if ($sunSetDate == date("Y-m-d"))
{
	$sunSetTime = explode(":",$sunSetTime);
	$arProperty["sunSet"] = $sunSetTime[0].":".$sunSetTime[1];
}
else
{
	$setSunDay = false;
}
if ($setSunDay)
{
	$sunSetMin = $sunSetTime[0]*60 + $sunSetTime[1];
	$sunRiseMin = $sunRiseTime[0]*60 + $sunRiseTime[1];
	$sunDayMin = $sunSetMin - $sunRiseMin;
	$sunDayH = floor($sunDayMin/60);
	$sunDayM = $sunDayMin - $sunDayH*60;
	$arProperty["sunDay"] = $sunDayH.":".$sunDayM;
}
$todayDate = date("Y-m-d");
$arToday = explode("-",$todayDate);
$tomorrowDate = date("Y-m-d",strtotime("+1 day",time()));
$arTomorrow = explode("-",$tomorrowDate);

foreach ($arWeather["forecast"]["time"] as $arData)
{
	$from = $arData["@attributes"]["from"];
	list($fromDate,$fromTime) = explode("T",$from);
	$fromDate = explode("-",$fromDate);
	$fromTime = explode(":",$fromTime);
	$fromTime[0] += 3;
	if ($fromTime[0]==24)
	{
		$fromTime[0] = 0;
		$fromDate[2] += 1;
	}
	elseif ($fromTime[0]>24)
	{
		$fromTime[0] -= 24;
		$fromDate[2] += 1;
	}
	$to = $arData["@attributes"]["to"];
	list($toDate,$toTime) = explode("T",$to);
	$toDate = explode("-",$toDate);
	$toTime = explode(":",$toTime);
	$toTime[0] += 3;
	if ($toTime[0]==24)
	{
		$toTime[0] = 0;
		$toDate[2] += 1;
	}
	elseif ($toTime[0]>24)
	{
		$toTime[0] -= 24;
		$toDate[2] += 1;
	}
	$prop = false;
	if (
		(intval($fromDate[0])==intval($arToday[0]))
		&& (intval($fromDate[1])==intval($arToday[1]))
		&& (intval($fromDate[2])==intval($arToday[2]))
	)
	{
		$prop = "today";
	}
	elseif (
		(intval($fromDate[0])==intval($arTomorrow[0]))
		&& (intval($fromDate[1])==intval($arTomorrow[1]))
		&& (intval($fromDate[2])==intval($arTomorrow[2]))
	)
	{
		$prop = "tomorrow";
	}
	if ($prop)
	{
		if (!empty($arData["symbol"]))
		{
			$arProperty[$prop."_symbol_".$fromTime[0]."_".$toTime[0]] = $arData["symbol"]["@attributes"]["var"];
		}
		else
		{
			$arProperty[$prop."_symbol_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["precipitation"]))
		{
			$arProperty[$prop."_precipitation_value_".$fromTime[0]."_".$toTime[0]] = $arData["precipitation"]["@attributes"]["value"];
			$arProperty[$prop."_precipitation_type_".$fromTime[0]."_".$toTime[0]] = $arData["precipitation"]["@attributes"]["type"];
		}
		else
		{
			$arProperty[$prop."_precipitation_value_".$fromTime[0]."_".$toTime[0]] = "";
			$arProperty[$prop."_precipitation_type_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["windDirection"]))
		{
			$arProperty[$prop."_windDirection_".$fromTime[0]."_".$toTime[0]] = $arData["windDirection"]["@attributes"]["code"];
			$arProperty[$prop."_windDirection_deg_".$fromTime[0]."_".$toTime[0]] = $arData["windDirection"]["@attributes"]["deg"];
		}
		else
		{
			$arProperty[$prop."_windDirection_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["windSpeed"]))
		{
			$arProperty[$prop."_windSpeed_mps_".$fromTime[0]."_".$toTime[0]] = $arData["windSpeed"]["@attributes"]["mps"];
		}
		else
		{
			$arProperty[$prop."_windSpeed_mps_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["temperature"]))
		{
			$arProperty[$prop."_temperature_min_".$fromTime[0]."_".$toTime[0]] = $arData["temperature"]["@attributes"]["min"];
			$arProperty[$prop."_temperature_max_".$fromTime[0]."_".$toTime[0]] = $arData["temperature"]["@attributes"]["max"];
		}
		else
		{
			$arProperty[$prop."_temperature_min_".$fromTime[0]."_".$toTime[0]] = "";
			$arProperty[$prop."_temperature_max_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["pressure"]))
		{
			$arProperty[$prop."_pressure_value_".$fromTime[0]."_".$toTime[0]] = $arData["pressure"]["@attributes"]["value"];
		}
		else
		{
			$arProperty[$prop."_pressure_value_".$fromTime[0]."_".$toTime[0]] = "";
		}
		if (!empty($arData["humidity"]))
		{
			$arProperty[$prop."_humidity_value_".$fromTime[0]."_".$toTime[0]] = $arData["humidity"]["@attributes"]["value"];
		}
		else
		{
			$arProperty[$prop."_humidity_value_".$fromTime[0]."_".$toTime[0]] = "";
		}
	}
}
$arTodayTomorrow = array("today","tomorrow");
foreach ($arTodayTomorrow as $tt)
{
	//0,3,6
	//6,9,12
	//12,15,18
	//18,21,0
	for ($i=0; $i<24; $i+=6)
	{
		$i3 = $i+3;
		$i6 = $i+6;
		if ($i6 >= 24) $i6=0;
		//Сравниваем символы - берем худший прогноз
		if (isset($arProperty[$tt."_symbol_".$i."_".$i3]) && isset($arProperty[$tt."_symbol_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_symbol_".$i."_".$i3] == $arProperty[$tt."_symbol_".$i3."_".$i6])
			{
				$arProperty[$tt."_symbol_".$i."_".$i6] = $arProperty[$tt."_symbol_".$i3."_".$i6];
			}
			elseif ($arProperty[$tt."_symbol_".$i."_".$i3] > $arProperty[$tt."_symbol_".$i3."_".$i6])
			{
				$arProperty[$tt."_symbol_".$i."_".$i6] = $arProperty[$tt."_symbol_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_symbol_".$i."_".$i6] = $arProperty[$tt."_symbol_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_symbol_".$i."_".$i3]);
			unset($arProperty[$tt."_symbol_".$i3."_".$i6]);
		}
		//Сравниваем количество осадков - берем максимальное число
		if (isset($arProperty[$tt."_precipitation_value_".$i."_".$i3]) && isset($arProperty[$tt."_precipitation_value_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_precipitation_value_".$i."_".$i3] == $arProperty[$tt."_precipitation_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_precipitation_value_".$i."_".$i6] = $arProperty[$tt."_precipitation_value_".$i3."_".$i6];
			}
			elseif ($arProperty[$tt."_precipitation_value_".$i."_".$i3] > $arProperty[$tt."_precipitation_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_precipitation_value_".$i."_".$i6] = $arProperty[$tt."_precipitation_value_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_precipitation_value_".$i."_".$i6] = $arProperty[$tt."_precipitation_value_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_precipitation_value_".$i."_".$i3]);
			unset($arProperty[$tt."_precipitation_value_".$i3."_".$i6]);
		}
		//Сравниваем тип осадков по приоритету (от худшего): снег, дождь, нет осадков
		if (isset($arProperty[$tt."_precipitation_type_".$i."_".$i3]) && isset($arProperty[$tt."_precipitation_type_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_precipitation_type_".$i."_".$i3] == $arProperty[$tt."_precipitation_type_".$i3."_".$i6])
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i3."_".$i6];
			}
			elseif ($arProperty[$tt."_precipitation_type_".$i."_".$i3] != "" && $arProperty[$tt."_precipitation_type_".$i3."_".$i6] == "")
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_precipitation_type_".$i."_".$i3] == "" && $arProperty[$tt."_precipitation_type_".$i3."_".$i6] != "")
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i3."_".$i6];
			}
			elseif ($arProperty[$tt."_precipitation_type_".$i."_".$i3] == "snow" && $arProperty[$tt."_precipitation_type_".$i3."_".$i6] == "rain")
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_precipitation_type_".$i."_".$i3] == "rain" && $arProperty[$tt."_precipitation_type_".$i3."_".$i6] == "snow")
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i3."_".$i6];
			}
			else
			{
				$arProperty[$tt."_precipitation_type_".$i."_".$i6] = $arProperty[$tt."_precipitation_type_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_precipitation_type_".$i."_".$i3]);
			unset($arProperty[$tt."_precipitation_type_".$i3."_".$i6]);
		}
		//Сравниваем направление ветра - берем второе значение
		if (isset($arProperty[$tt."_windDirection_".$i."_".$i3]) && isset($arProperty[$tt."_windDirection_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_windDirection_".$i3."_".$i6] == "")
			{
				$arProperty[$tt."_windDirection_".$i."_".$i6] = $arProperty[$tt."_windDirection_".$i."_".$i3];
				$arProperty[$tt."_windDirection_deg_".$i."_".$i6] = $arProperty[$tt."_windDirection_deg_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_windDirection_".$i."_".$i6] = $arProperty[$tt."_windDirection_".$i3."_".$i6];
				$arProperty[$tt."_windDirection_deg_".$i."_".$i6] = $arProperty[$tt."_windDirection_deg_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_windDirection_".$i."_".$i3]);
			unset($arProperty[$tt."_windDirection_".$i3."_".$i6]);
			unset($arProperty[$tt."_windDirection_deg_".$i."_".$i3]);
			unset($arProperty[$tt."_windDirection_deg_".$i3."_".$i6]);
		}
		//Сравниваем скорость ветра - берем наибольшую
		if (isset($arProperty[$tt."_windSpeed_mps_".$i."_".$i3]) && isset($arProperty[$tt."_windSpeed_mps_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_windSpeed_mps_".$i."_".$i3] == $arProperty[$tt."_windSpeed_mps_".$i3."_".$i6])
			{
				$arProperty[$tt."_windSpeed_mps_".$i."_".$i6] = $arProperty[$tt."_windSpeed_mps_".$i3."_".$i6];
			}
			elseif ($arProperty[$tt."_windSpeed_mps_".$i."_".$i3] > $arProperty[$tt."_windSpeed_mps_".$i3."_".$i6])
			{
				$arProperty[$tt."_windSpeed_mps_".$i."_".$i6] = $arProperty[$tt."_windSpeed_mps_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_windSpeed_mps_".$i."_".$i6] = $arProperty[$tt."_windSpeed_mps_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_windSpeed_mps_".$i."_".$i3]);
			unset($arProperty[$tt."_windSpeed_mps_".$i3."_".$i6]);
		}
		//Сравниваем минимальную температуру и берем минимальную
		if (isset($arProperty[$tt."_temperature_min_".$i."_".$i3]) && isset($arProperty[$tt."_temperature_min_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_temperature_min_".$i."_".$i3] == $arProperty[$tt."_temperature_min_".$i3."_".$i6])
			{
				$arProperty[$tt."_temperature_min_".$i."_".$i6] = $arProperty[$tt."_temperature_min_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_temperature_min_".$i."_".$i3] < $arProperty[$tt."_temperature_min_".$i3."_".$i6])
			{
				$arProperty[$tt."_temperature_min_".$i."_".$i6] = $arProperty[$tt."_temperature_min_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_temperature_min_".$i."_".$i6] = $arProperty[$tt."_temperature_min_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_temperature_min_".$i."_".$i3]);
			unset($arProperty[$tt."_temperature_min_".$i3."_".$i6]);
		}
		//Сравниваем максимальную температуру и берем максимальную
		if (isset($arProperty[$tt."_temperature_max_".$i."_".$i3]) && isset($arProperty[$tt."_temperature_max_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_temperature_max_".$i."_".$i3] == $arProperty[$tt."_temperature_max_".$i3."_".$i6])
			{
				$arProperty[$tt."_temperature_max_".$i."_".$i6] = $arProperty[$tt."_temperature_max_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_temperature_max_".$i."_".$i3] > $arProperty[$tt."_temperature_max_".$i3."_".$i6])
			{
				$arProperty[$tt."_temperature_max_".$i."_".$i6] = $arProperty[$tt."_temperature_max_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_temperature_max_".$i."_".$i6] = $arProperty[$tt."_temperature_max_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_temperature_max_".$i."_".$i3]);
			unset($arProperty[$tt."_temperature_max_".$i3."_".$i6]);
		}
		//Сравниваем давление и берем максимальное (сразу переводим в мм.рт.ст.)
		if (isset($arProperty[$tt."_pressure_value_".$i."_".$i3]) && isset($arProperty[$tt."_pressure_value_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_pressure_value_".$i."_".$i3] == $arProperty[$tt."_pressure_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_pressure_value_".$i."_".$i6] = $arProperty[$tt."_pressure_value_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_pressure_value_".$i."_".$i3] > $arProperty[$tt."_pressure_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_pressure_value_".$i."_".$i6] = $arProperty[$tt."_pressure_value_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_pressure_value_".$i."_".$i6] = $arProperty[$tt."_pressure_value_".$i3."_".$i6];
			}
			$arProperty[$tt."_pressure_value_".$i."_".$i6] = floor($arProperty[$tt."_pressure_value_".$i."_".$i6]*0.750062);
			unset($arProperty[$tt."_pressure_value_".$i."_".$i3]);
			unset($arProperty[$tt."_pressure_value_".$i3."_".$i6]);
		}
		//Сравниваем влажность и берем максимальную
		if (isset($arProperty[$tt."_humidity_value_".$i."_".$i3]) && isset($arProperty[$tt."_humidity_value_".$i3."_".$i6]))
		{
			if ($arProperty[$tt."_humidity_value_".$i."_".$i3] == $arProperty[$tt."_humidity_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_humidity_value_".$i."_".$i6] = $arProperty[$tt."_humidity_value_".$i."_".$i3];
			}
			elseif ($arProperty[$tt."_humidity_value_".$i."_".$i3] > $arProperty[$tt."_humidity_value_".$i3."_".$i6])
			{
				$arProperty[$tt."_humidity_value_".$i."_".$i6] = $arProperty[$tt."_humidity_value_".$i."_".$i3];
			}
			else
			{
				$arProperty[$tt."_humidity_value_".$i."_".$i6] = $arProperty[$tt."_humidity_value_".$i3."_".$i6];
			}
			unset($arProperty[$tt."_humidity_value_".$i."_".$i3]);
			unset($arProperty[$tt."_humidity_value_".$i3."_".$i6]);
		}
	}
}

/*
$arTT = array("today","tomorrow");
$arProperty = array();
foreach ($arTT as $tt)
{
	for ($i=0; $i<24; $i+=6)
	{
		$i6 = $i+6;
		if ($i6 >= 24) $i6 = 0;
		$arProperty[$tt."_symbol_".$i."_".$i6]              = $this->getProperty[$tt."_symbol_".$i."_".$i6];
		//$arProperty[$tt."_precipitation_value_".$i."_".$i6] = $this->getProperty[$tt."_precipitation_value_".$i."_".$i6];
		//$arProperty[$tt."_precipitation_type_".$i."_".$i6]  = $this->getProperty[$tt."_precipitation_type_".$i."_".$i6];
		$arProperty[$tt."_windDirection_".$i."_".$i6]       = $this->getProperty[$tt."_windDirection_".$i."_".$i6];
		$arProperty[$tt."_windDirection_deg_".$i."_".$i6]       = $this->getProperty[$tt."_windDirection_deg_".$i."_".$i6];
		$arProperty[$tt."_windSpeed_mps_".$i."_".$i6]       = $this->getProperty[$tt."_windSpeed_mps_".$i."_".$i6];
		$arProperty[$tt."_temperature_min_".$i."_".$i6]     = $this->getProperty[$tt."_temperature_min_".$i."_".$i6];
		$arProperty[$tt."_temperature_max_".$i."_".$i6]     = $this->getProperty[$tt."_temperature_max_".$i."_".$i6];
		$arProperty[$tt."_pressure_value_".$i."_".$i6]      = $this->getProperty[$tt."_pressure_value_".$i."_".$i6];
		$arProperty[$tt."_humidity_value_".$i."_".$i6]      = $this->getProperty[$tt."_humidity_value_".$i."_".$i6];
	}
}
*
function getTextByIcon ($icon)
{
	switch ($icon)
	{
		case '01d':
		case '01n':
			return 'Без облачно';
		case '02d':
		case '02n':
			return 'Незначительная облачность';
		case '03d':
		case '03n':
			return 'Переменная облачность';
		case '04d':
		case '04n':
			return 'Значительная облачность';
		case '09d':
		case '09n':
			return 'Ливень';
		case '10d':
		case '10n':
			return 'Дождь';
		case '11d':
		case '11n':
			return 'Гроза';
		case '13d':
		case '13n':
			return 'Снег';
		case '50d':
		case '50n':
			return 'Туман';
	}
}
function getWindByCode ($wind)
{
	switch ($wind)
	{
		case 'N':
			return "северный";
		case 'NNE':
			return "северо-северо-восточный";
		case 'NE':
			return "северо-восточный";
		case 'ENE':
			return "восточно-северо-восточный";
		case 'E':
			return "восточный";
		case 'ESE':
			return "восточно-юго-восточный";
		case 'SE':
			return "юго-восточный";
		case 'SSE':
			return "юго-юго-восточный";
		case 'S':
			return "южный";
		case 'SSW':
			return "юго-юго-западный";
		case 'SW':
			return "юго-западный";
		case 'WSW':
			return "западно-юго-западный";
		case 'W':
			return "западный";
		case 'WNW':
			return "западно-северо-западный";
		case 'NW':
			return "северо-западный";
		case 'NNW':
			return "северо-северо-западный";
		default:
			return "без ветра";
	}
}
function getInfo ($arProperty,$tt="today",$i=0)
{
	$i6 = $i+6;
	if ($i6 >= 24) $i6 =0;
	$parsedWeather = "";

	$parsedWeather .= '<img src="http://download.seaicons.com/icons/fatcow/farm-fresh/16/temperature-5-icon.png" title="Температура">&nbsp;';
	if ($arProperty[$tt."_temperature_min_".$i."_".$i6] == 0)
	{
		$parsedWeather .= "от 0 до ";
	}
	elseif ($arProperty[$tt."_temperature_min_".$i."_".$i6] > 0)
	{
		$parsedWeather .= "от +".floor($arProperty[$tt."_temperature_min_".$i."_".$i6])." до ";
	}
	else
	{
		$parsedWeather .= "от -".floor($arProperty[$tt."_temperature_min_".$i."_".$i6])." до ";
	}
	if ($arProperty[$tt."_temperature_max_".$i."_".$i6] == 0)
	{
		$parsedWeather .= "0 &deg;C<br>";
	}
	elseif ($arProperty[$tt."_temperature_max_".$i."_".$i6] > 0)
	{
		$parsedWeather .= "+".ceil($arProperty[$tt."_temperature_max_".$i."_".$i6])." &deg;C<br>";
	}
	else
	{
		$parsedWeather .= "-".ceil($arProperty[$tt."_temperature_max_".$i."_".$i6])." &deg;C<br>";
	}
	$parsedWeather .= '<img src="http://dnmchs.ru/img/weather/press.png" title="Атмосферное давление">&nbsp;'
		.$arProperty[$tt."_pressure_value_".$i."_".$i6].'&nbsp;мм.&nbsp;рт.&nbsp;ст.<br>';
	$parsedWeather .= '<img src="http://s1.iconbird.com/ico/0912/fugue/w16h161349013282water.png" title="Относительная влажность">&nbsp;'
		.$arProperty[$tt."_humidity_value_".$i."_".$i6].'&nbsp;%<br>';
	if (($arProperty[$tt."_windDirection_".$i."_".$i6]=="C"))
	{
		$parsedWeather .= 'Без ветра';
	}
	else
	{
		$parsedWeather .= '<div style="float:left; display:block; margin-top: 5px; max-height: 15px;"><img src="https://ssl.gstatic.com/m/images/weather/wind_unselected.svg" title="Ветер '
			.getWindByCode($arProperty[$tt."_windDirection_".$i."_".$i6]).'" style="transform-origin: 25% 25%; transform: rotate('
			.(floor($arProperty[$tt."_windDirection_deg_".$i."_".$i6])+90).'deg); width: 15px;"></div>&nbsp;';
		$parsedWeather .= floor($arProperty[$tt."_windSpeed_mps_".$i."_".$i6]).'&nbsp;-&nbsp;'.ceil($arProperty[$tt."_windSpeed_mps_".$i."_".$i6]).'&nbsp;м/с<br>';
	}

	return $parsedWeather;
}
//http://openweathermap.org/img/w/01d.png
$parsedWeather = '<h3>Сегодня:</h3>'
	.'<b>Ночью:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_0_6"].'.png" title="'
	.getTextByIcon($arProperty["today_symbol_0_6"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'today',0)."<br>";
$parsedWeather .= '<b>Утром:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_6_12"].'.png" title="'
	.getTextByIcon($arProperty["today_symbol_6_12"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'today',6)."<br>";
$parsedWeather .= '<b>Днем:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_12_18"].'.png" title="'
	.getTextByIcon($arProperty["today_symbol_12_18"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'today',12)."<br>";
$parsedWeather .= '<b>Вечером:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_18_0"].'.png" title="'
	.getTextByIcon($arProperty["today_symbol_18_0"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'today',18)."<br>";
$parsedWeather .= "<hr>";
$parsedWeather .= '<h3>Завтра:</h3>'
	.'<b>Ночью:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_0_6"].'.png" title="'
	.getTextByIcon($arProperty["tomorrow_symbol_0_6"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'tomorrow',0)."<br>";
$parsedWeather .= '<b>Утром:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_6_12"].'.png" title="'
	.getTextByIcon($arProperty["tomorrow_symbol_6_12"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'tomorrow',6)."<br>";
$parsedWeather .= '<b>Днем:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_12_18"].'.png" title="'
	.getTextByIcon($arProperty["tomorrow_symbol_12_18"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'tomorrow',12)."<br>";
$parsedWeather .= '<b>Вечером:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_18_0"].'.png" title="'
	.getTextByIcon($arProperty["tomorrow_symbol_18_0"]).'"><br>';
$parsedWeather .= getInfo($arProperty,'tomorrow',18)."<br>";

/*
$parsedWeather = '<h3>Сегодня:</h3>'
	.'<b>Ночью:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_0_6"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["today_symbol_0_6"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'today','i'=>0))."<br>";
$parsedWeather .= '<b>Утром:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_6_12"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["today_symbol_6_12"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'today','i'=>6))."<br>";
$parsedWeather .= '<b>Днем:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_12_18"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["today_symbol_12_18"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'today','i'=>12))."<br>";
$parsedWeather .= '<b>Вечером:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["today_symbol_18_0"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["today_symbol_18_0"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'today','i'=>18))."<br>";
$parsedWeather .= "<hr>";
$parsedWeather .= '<h3>Завтра:</h3>'
	.'<b>Ночью:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_0_6"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["tomorrow_symbol_0_6"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'tomorrow','i'=>0))."<br>";
$parsedWeather .= '<b>Утром:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_6_12"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["tomorrow_symbol_6_12"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'tomorrow','i'=>6))."<br>";
$parsedWeather .= '<b>Днем:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_12_18"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["tomorrow_symbol_12_18"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'tomorrow','i'=>12))."<br>";
$parsedWeather .= '<b>Вечером:</b><img src="http://openweathermap.org/img/w/'
	.$arProperty["tomorrow_symbol_18_0"].'.png" title="'
	.$this->callMethod("getTextByIcon",array('icon'=>$arProperty["tomorrow_symbol_18_0"])).'"><br>';
$parsedWeather .= $this->callMethod("getInfo",array('prop'=>$arProperty,'tt'=>'tomorrow','i'=>18))."<br>";
*

function sayRight ($number, $arText=array("градус","градуса","градусов"))
{
	if ($number<0) $number*=-1;
	if (($number == 0)||($number>=5&&$number<=20))
	{
		return $arText[2];
	}
	else
	{
		$numberStr = strval($number);
		$numberLen = strlen($numberStr);
		$numberLast = $numberStr[$numberLen-1];
		if ($numberLast==1)
		{
			return $arText[0];
		}
		elseif ($numberLast>=2 && $numberLast<=4)
		{
			return $arText[1];
		}
		else
		{
			return $arText[2];
		}
	}
}

$sayToday = "Сегодня ночью|";
if ($arProperty["today_temperature_min_0_6"] == $arProperty["today_temperature_max_0_6"])
{
	if ($arProperty["today_temperature_min_0_6"] == 0)
	{
		$sayToday .= 'Ноль ';
	}
	elseif ($arProperty["today_temperature_min_0_6"] > 0)
	{
		$sayToday .= 'Плюс '.floor($arProperty["today_temperature_min_0_6"])." ";
	}
	else
	{
		$sayToday .= 'Минус '.floor($arProperty["today_temperature_min_0_6"])." ";
	}
}
else
{
	$sayToday .= 'От ';
	if ($arProperty["today_temperature_min_0_6"] == 0)
	{
		$sayToday .= 'ноля до ';
	}
	elseif ($arProperty["today_temperature_min_0_6"] > 0)
	{
		$sayToday .= 'плюс '.floor($arProperty["today_temperature_min_0_6"])." до ";
	}
	else
	{
		$sayToday .= 'минус '.floor($arProperty["today_temperature_min_0_6"])." до ";
	}
	if ($arProperty["today_temperature_max_0_6"] == 0)
	{
		$sayToday .= 'ноля ';
	}
	elseif ($arProperty["today_temperature_max_0_6"] > 0)
	{
		$sayToday .= 'плюс '.ceil($arProperty["today_temperature_max_0_6"])." ";
	}
	else
	{
		$sayToday .= 'минус '.ceil($arProperty["today_temperature_max_0_6"])." ";
	}
}
//$sayToday .= sayRight($arProperty["today_temperature_max_0_6"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["today_temperature_max_0_6"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["today_symbol_0_6"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["today_symbol_0_6"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_0_6"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_0_6"]))."|";
}
$sayToday .= "Утром|От ";
if ($arProperty["today_temperature_min_6_12"] == 0)
{
	$sayToday .= 'ноля до ';
}
elseif ($arProperty["today_temperature_min_6_12"] > 0)
{
	$sayToday .= 'плюс '.floor($arProperty["today_temperature_min_6_12"])." до ";
}
else
{
	$sayToday .= 'минус '.floor($arProperty["today_temperature_min_6_12"])." до ";
}
if ($arProperty["today_temperature_max_6_12"] == 0)
{
	$sayToday .= 'ноля ';
}
elseif ($arProperty["today_temperature_max_6_12"] > 0)
{
	$sayToday .= 'плюс '.ceil($arProperty["today_temperature_max_6_12"])." ";
}
else
{
	$sayToday .= 'минус '.ceil($arProperty["today_temperature_max_6_12"])." ";
}
//$sayToday .= sayRight($arProperty["today_temperature_max_6_12"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["today_temperature_max_6_12"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["today_symbol_6_12"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["today_symbol_6_12"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_6_12"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_6_12"]))."|";
}
$sayToday .= "Днем|От ";
if ($arProperty["today_temperature_min_12_18"] == 0)
{
	$sayToday .= 'ноля до ';
}
elseif ($arProperty["today_temperature_min_12_18"] > 0)
{
	$sayToday .= 'плюс '.floor($arProperty["today_temperature_min_12_18"])." до ";
}
else
{
	$sayToday .= 'минус '.floor($arProperty["today_temperature_min_12_18"])." до ";
}
if ($arProperty["today_temperature_max_12_18"] == 0)
{
	$sayToday .= 'ноля ';
}
elseif ($arProperty["today_temperature_max_12_18"] > 0)
{
	$sayToday .= 'плюс '.ceil($arProperty["today_temperature_max_12_18"])." ";
}
else
{
	$sayToday .= 'минус '.ceil($arProperty["today_temperature_max_12_18"])." ";
}
//$sayToday .= sayRight($arProperty["today_temperature_max_12_18"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["today_temperature_max_12_18"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["today_symbol_12_18"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["today_symbol_12_18"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_12_18"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_12_18"]))."|";
}
$sayToday .= "Вечером|От ";
if ($arProperty["today_temperature_min_18_0"] == 0)
{
	$sayToday .= 'ноля до ';
}
elseif ($arProperty["today_temperature_min_18_0"] > 0)
{
	$sayToday .= 'плюс '.floor($arProperty["today_temperature_min_18_0"])." до ";
}
else
{
	$sayToday .= 'минус '.floor($arProperty["today_temperature_min_18_0"])." до ";
}
if ($arProperty["today_temperature_max_18_0"] == 0)
{
	$sayToday .= 'ноля ';
}
elseif ($arProperty["today_temperature_max_18_0"] > 0)
{
	$sayToday .= 'плюс '.ceil($arProperty["today_temperature_max_18_0"])." ";
}
else
{
	$sayToday .= 'минус '.ceil($arProperty["today_temperature_max_18_0"])." ";
}
//$sayToday .= sayRight($arProperty["today_temperature_max_18_0"],array("градус","градуса","градусов"));
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["today_temperature_max_18_0"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["today_symbol_18_0"])!="")
{
	$sayTomorrow .= "|".getTextByIcon($arProperty["today_symbol_18_0"]);
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_18_0"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["today_symbol_18_0"]))."|";
}

$sayTomorrow = "Завтра ночью|";
if ($arProperty["tomorrow_temperature_min_0_6"] == $arProperty["tomorrow_temperature_max_0_6"])
{
	if ($arProperty["tomorrow_temperature_min_0_6"] == 0)
	{
		$sayTomorrow .= 'Ноль ';
	}
	elseif ($arProperty["tomorrow_temperature_min_0_6"] > 0)
	{
		$sayTomorrow .= 'Плюс '.floor($arProperty["tomorrow_temperature_min_0_6"])." ";
	}
	else
	{
		$sayTomorrow .= 'Минус '.floor($arProperty["tomorrow_temperature_min_0_6"])." ";
	}
}
else
{
	$sayTomorrow .= 'От ';
	if ($arProperty["tomorrow_temperature_min_0_6"] == 0)
	{
		$sayTomorrow .= 'ноля до ';
	} elseif ($arProperty["tomorrow_temperature_min_0_6"] > 0)
	{
		$sayTomorrow .= 'плюс '.floor ($arProperty["tomorrow_temperature_min_0_6"])." до ";
	} else
	{
		$sayTomorrow .= 'минус '.floor ($arProperty["tomorrow_temperature_min_0_6"])." до ";
	}
	if ($arProperty["tomorrow_temperature_max_0_6"] == 0)
	{
		$sayTomorrow .= 'ноля ';
	} elseif ($arProperty["tomorrow_temperature_max_0_6"] > 0)
	{
		$sayTomorrow .= 'плюс '.ceil ($arProperty["tomorrow_temperature_max_0_6"])." ";
	} else
	{
		$sayTomorrow .= 'минус '.ceil ($arProperty["tomorrow_temperature_max_0_6"])." ";
	}
}
//$sayTomorrow .= sayRight($arProperty["tomorrow_temperature_max_0_6"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["tomorrow_temperature_max_0_6"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["tomorrow_symbol_0_6"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["tomorrow_symbol_0_6"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_0_6"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_0_6"]))."|";
}
$sayTomorrow .= "Утром|От ";
if ($arProperty["tomorrow_temperature_min_6_12"] == 0)
{
	$sayTomorrow .= 'ноля до ';
}
elseif ($arProperty["tomorrow_temperature_min_6_12"] > 0)
{
	$sayTomorrow .= 'плюс '.floor($arProperty["tomorrow_temperature_min_6_12"])." до ";
}
else
{
	$sayTomorrow .= 'минус '.floor($arProperty["tomorrow_temperature_min_6_12"])." до ";
}
if ($arProperty["tomorrow_temperature_max_6_12"] == 0)
{
	$sayTomorrow .= 'ноля ';
}
elseif ($arProperty["tomorrow_temperature_max_6_12"] > 0)
{
	$sayTomorrow .= 'плюс '.ceil($arProperty["tomorrow_temperature_max_6_12"])." ";
}
else
{
	$sayTomorrow .= 'минус '.ceil($arProperty["tomorrow_temperature_max_6_12"])." ";
}
//$sayTomorrow .= sayRight($arProperty["tomorrow_temperature_max_6_12"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["tomorrow_temperature_max_6_12"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["tomorrow_symbol_6_12"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["tomorrow_symbol_6_12"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_6_12"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_6_12"]))."|";
}
$sayTomorrow .= "Днем|От ";
if ($arProperty["tomorrow_temperature_min_12_18"] == 0)
{
	$sayTomorrow .= 'ноля до ';
}
elseif ($arProperty["tomorrow_temperature_min_12_18"] > 0)
{
	$sayTomorrow .= 'плюс '.floor($arProperty["tomorrow_temperature_min_12_18"])." до ";
}
else
{
	$sayTomorrow .= 'минус '.floor($arProperty["tomorrow_temperature_min_12_18"])." до ";
}
if ($arProperty["tomorrow_temperature_max_12_18"] == 0)
{
	$sayTomorrow .= 'ноля ';
}
elseif ($arProperty["tomorrow_temperature_max_12_18"] > 0)
{
	$sayTomorrow .= 'плюс '.ceil($arProperty["tomorrow_temperature_max_12_18"])." ";
}
else
{
	$sayTomorrow .= 'минус '.ceil($arProperty["tomorrow_temperature_max_12_18"])." ";
}
//$sayTomorrow .= sayRight($arProperty["tomorrow_temperature_max_12_18"],array("градус","градуса","градусов"))."|";
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["tomorrow_temperature_max_12_18"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["tomorrow_symbol_12_18"])!="")
{
	$sayTomorrow .= getTextByIcon($arProperty["tomorrow_symbol_12_18"])."|";
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_12_18"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_12_18"]))."|";
}
$sayTomorrow .= "Вечером|От ";
if ($arProperty["tomorrow_temperature_min_18_0"] == 0)
{
	$sayTomorrow .= 'ноля до ';
}
elseif ($arProperty["tomorrow_temperature_min_18_0"] > 0)
{
	$sayTomorrow .= 'плюс '.floor($arProperty["tomorrow_temperature_min_18_0"])." до ";
}
else
{
	$sayTomorrow .= 'минус '.floor($arProperty["tomorrow_temperature_min_18_0"])." до ";
}
if ($arProperty["tomorrow_temperature_max_18_0"] == 0)
{
	$sayTomorrow .= 'ноля ';
}
elseif ($arProperty["tomorrow_temperature_max_18_0"] > 0)
{
	$sayTomorrow .= 'плюс '.ceil($arProperty["tomorrow_temperature_max_18_0"])." ";
}
else
{
	$sayTomorrow .= 'минус '.ceil($arProperty["tomorrow_temperature_max_18_0"])." ";
}
//$sayTomorrow .= sayRight($arProperty["tomorrow_temperature_max_18_0"],array("градус","градуса","градусов"));
$sayToday .= $this->callMethod("sayRight",array("number"=>$arProperty["tomorrow_temperature_max_18_0"],"arText"=>array("градус","градуса","градусов")))."|";
/*if (getTextByIcon($arProperty["tomorrow_symbol_18_0"])!="")
{
	$sayTomorrow .= "|".getTextByIcon($arProperty["tomorrow_symbol_18_0"]);
}*
if ($this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_18_0"]))!="")
{
	$sayTomorrow .= $this->callMethod("getTextByIcon",array("icon"=>$arProperty["tomorrow_symbol_18_0"]))."|";
}

echo $sayToday.'<br>';
echo $sayTomorrow;


msDebug($arWeather);
msDebug($arProperty);
echo $parsedWeather;
*/
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

