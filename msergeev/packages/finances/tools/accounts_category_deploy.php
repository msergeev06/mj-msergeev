<?php
include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
MSergeev\Core\Lib\Loader::IncludePackage("finances");
use \MSergeev\Core\Exception;
use MSergeev\Core\Lib;

$arParams = $arReturn = array();
$arReturn['status'] = 'ok';
$bStatus = true;
//Проверка переданных полей
if (true)
{
	try
	{
		if (isset($_REQUEST['category']))
		{
			$arParams['CATEGORY'] = trim(htmlspecialchars($_REQUEST['category']));
		}
		else
		{
			throw new Exception\ArgumentNullException('category');
		}
		if (isset($_REQUEST['status']))
		{
			$arParams['STATUS'] = intval($_REQUEST['status']);
		}
		else
		{
			throw new Exception\ArgumentNullException('status');
		}
	}
	catch (Exception\ArgumentNullException $e)
	{
		$e->showException();
		$arReturn['status'] = 'error';
		$bStatus = false;
	}
}

if ($bStatus)
{
	Lib\Options::setOption('FINANCES_DEPLOY_'.$arParams['CATEGORY'],$arParams['STATUS']);
	//$arReturn = array_merge($arReturn,$arParams);
}

header('Content-Type: application/json');
echo json_encode($arReturn);