<?php

namespace MSergeev\Packages\Finances\Lib;

use MSergeev\Packages\Finances\Tables\CategoriesTable;

class Categories
{
	public static function getIDsIncomeCategories ($bIncome=true)
	{
		$arRes = CategoriesTable::getList(array(
			'select' => array('ID'),
			'filter' => array('INCOME'=>$bIncome)
		));
		//echo "<pre>"; print_r($arRes['SQL']); echo "</pre>";
		//msDebug($arRes);
		$arReturn = array();
		if ($arRes)
		{
			foreach ($arRes as $ar_res)
			{
				if (is_numeric($ar_res['ID']))
				{
					$arReturn[] = $ar_res['ID'];
				}
			}
			return $arReturn;
		}
		else
		{
			return false;
		}
	}
}