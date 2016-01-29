<?php

//echo "Open public directory: /msergeev/public/[package]";

include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
MSergeev\Core\Lib\Loader::IncludePackage("dates");
MSergeev\Core\Lib\Loader::IncludePackage("icar");
MSergeev\Core\Lib\Loader::IncludePackage("products");
header('Content-type: text/html; charset=utf-8');

use MSergeev\Packages\Dates\Tables;
use MSergeev\Packages\ICar\Tables\CarGearboxTable;
use MSergeev\Core\Lib\Tools;
use MSergeev\Core\Lib\Installer;

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
//Installer::createPackageTables("products");
/*
$res = MSergeev\Packages\Products\Tables\FreezerTable::createTable();
msDebug($res);
$res = MSergeev\Packages\Products\Tables\FreezerTable::insertDefaultRows();
msDebug($res);
*/

