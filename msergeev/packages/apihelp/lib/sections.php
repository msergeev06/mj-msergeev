<?php

namespace MSergeev\Packages\Apihelp\Lib;

use MSergeev\Core\Exception;
use MSergeev\Core\Lib as CoreLib;

class Sections extends CoreLib\Sections
{
	public static function showSelect ($bActive=true)
	{
		$arSections = parent::getTreeList(
			'ms_apihelp_sections',
			array('DESCRIPTION','DESCRIPTION_TYPE'),
			$bActive
		);

		$options = "";
		foreach ($arSections as $arSection)
		{
			$options .= '<option value="'.$arSection['ID'].'">';
			if ($arSection['DEPTH_LEVEL']>1)
			{
				for ($i=0; $i<($arSection['DEPTH_LEVEL']-1); $i++)
				{
					$options .= "&nbsp;&nbsp;&nbsp;";
				}
				$options .= "&#9658;";
			}
			$options .= $arSection['NAME'].'</option>'."\n";
		}

		return $options;
	}

	public static function addSection ($arParams=null)
	{
		try
		{
			if (is_null($arParams))
			{
				throw new Exception\ArgumentNullException('arParams');
			}
			if (!isset($arParams['ACTIVE']))
			{
				throw new Exception\ArgumentNullException('arParams[ACTIVE]');
			}
			elseif (!is_bool($arParams['ACTIVE']))
			{
				throw new Exception\ArgumentTypeException('arParams[ACTIVE]','boolean');
			}
			if (!isset($arParams['NAME']) || strlen($arParams['NAME'])<=0)
			{
				throw new Exception\ArgumentNullException('arParams[NAME]');
			}
			if (!isset($arParams['PARENT']) || intval($arParams['PARENT'])<0)
			{
				throw new Exception\ArgumentNullException('arParams[PARENT]');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}
		catch (Exception\ArgumentTypeException $e2)
		{
			die($e2->showException());
		}

		if (!isset($arParams['SORT']) || intval($arParams['SORT'])<=0)
		{
			$arParams['SORT'] = 500;
		}

		$res = parent::addSection($arParams,'ms_apihelp_sections');
/*		if ($res->getResult())
		{
			$insertID = $res->getInsertId();

			return $insertID;
		}
		else
		{
			return false;
		}*/
	}
}