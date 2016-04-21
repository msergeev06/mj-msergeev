<?
use MSergeev\Core\Lib;

header('Content-type: text/html; charset=utf-8');
Lib\Buffer::start("page");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Справка по API - <?=Lib\Buffer::showTitle("Главная");?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?=Lib\Buffer::showCSS()?>
	<?=Lib\Buffer::showJS()?>
</head>
<body>

<? //include_once (Lib\Loader::getPublic("apihelp")."include_areas/top_menu.php"); ?>

<? //include_once (Lib\Loader::getPublic("apihelp")."include_areas/alerts.php"); ?>
<h1><?=Lib\Buffer::showTitle("Главная");?></h1>
