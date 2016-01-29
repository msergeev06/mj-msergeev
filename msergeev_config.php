<?php

$arConfig = array(
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'db_terminal',
	'DB_USER' => 'root',
	'DB_PASS' => '',
	'DOCUMENT_ROOT' => $_SERVER["DOCUMENT_ROOT"]."/",
	'SITE_ROOT' => 'Z:/home/majordomo.test/www',
	'MSERGEEV_ROOT' => $_SERVER["DOCUMENT_ROOT"].'/msergeev/',
	'CORE_ROOT' => $_SERVER["DOCUMENT_ROOT"].'/msergeev/core/',
	'PACKAGES_ROOT' => $_SERVER["DOCUMENT_ROOT"].'/msergeev/packages/',
	'PUBLIC_ROOT' => $_SERVER["DOCUMENT_ROOT"].'/msergeev/public/'
);

include_once($arConfig["CORE_ROOT"].'lib/config.php');
\MSergeev\Core\Lib\Config::init($arConfig);

include_once(\MSergeev\Core\Lib\Config::getConfig("MSERGEEV_ROOT").'include.php');