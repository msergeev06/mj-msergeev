<?php

//echo "Open public directory: /msergeev/public/[package]";

include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
//MSergeev\Core\Lib\Loader::IncludePackage("dates");
MSergeev\Core\Lib\Loader::IncludePackage("icar");
//MSergeev\Core\Lib\Loader::IncludePackage("products");
//MSergeev\Core\Lib\Loader::IncludePackage("tasks");
header('Content-type: text/html; charset=utf-8');

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
Installer::createPackageTables("icar");
/*
$res = MSergeev\Packages\Products\Tables\FreezerTable::createTable();
msDebug($res);
$res = MSergeev\Packages\Products\Tables\FreezerTable::insertDefaultRows();
msDebug($res);

*/
//Installer::createPackageTables("tasks");
//$arResult = TaskLib\Groups::getGroupTree();
//$arResult['SELECT'] = TaskLib\Groups::getSelectArray($arResult['ITEMS']);

//msDebug($arResult);
?>
<?//echo InputCalendar("calendar"); ?>
<? //echo SelectBox("groups",$arResult['SELECT']['LIST'],"---Верхний уровень---","NULL"); ?>

</body></html>

