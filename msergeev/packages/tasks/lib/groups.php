<?php

namespace MSergeev\Packages\Tasks\Lib;

use MSergeev\Core\Entity\Query;
use MSergeev\Core\Exception\ArgumentNullException;
use MSergeev\Core\Exception\ArgumentTypeException;
use MSergeev\Packages\Tasks\Tables;

class Groups
{
	public static function getGroupTree($userID=0, $getActive=true)
	{
		try
		{
			if (is_bool($getActive))
			{
				if ($getActive)
				{
					$arParams['where'] = array(
						'ACTIVE' => 'Y'
					);
				}
			}
			else
			{
				$arParams['where'] = array(
					'ACTIVE' => 'Y'
				);
				throw new ArgumentTypeException('getAction','boolean');
			}
		}
		catch (ArgumentTypeException $e)
		{
			$e->showException();
		}
		$arParams['order'] = array(
			'LEFT_MARGIN' => 'ASC'
		);

		$ar_res = Tables\GroupTable::getList($arParams);
		foreach ($ar_res as $key=>$arItem)
		{
			if (
				$userID==0
				|| ($arItem['HIDDEN'] && $userID==$arItem['USER_ID'])
				|| !$arItem['HIDDEN']
			)
			{
				$arResult['ITEMS'][/*$arItem['ID']*/] = $arItem;
			}
		}

		//msDebug($arResult);

		return $arResult;
	}

	public static function getSelectArray ($arItems)
	{
		try
		{
			if (empty($arItems))
			{
				throw new ArgumentNullException('arItems');
			}

			$arSelect = array("LIST"=>array(),"SELECTED"=>null);

			foreach ($arItems as $arItem)
			{
				$newName = "";
				if ($arItem['DEPTH_LEVEL']>0)
				{
					for ($i=0;$i<$arItem['DEPTH_LEVEL'];$i++)
					{
						$newName .= '...';
					}
				}
				$newName .= ' '.$arItem['NAME'];
				$arSelect['LIST'][$arItem['ID']]['VALUE'] = $arItem['ID'];
				$arSelect['LIST'][$arItem['ID']]['NAME'] = $newName;
			}

			return $arSelect;
		}
		catch (ArgumentNullException $e)
		{
			$e->showException();
		}
	}

}