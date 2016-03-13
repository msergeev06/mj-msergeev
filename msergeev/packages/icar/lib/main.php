<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Exception\ArgumentNullException;
use MSergeev\Core\Lib as CoreLib;

class Main
{
	/**
	 * Возвращает отформатированное значение Денег
	 *
	 * @param float     $value      Число
	 * @param bool      $input      Флаг использования в <input>
	 *
	 * @return string
	 */
	public static function moneyFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,2,'.','');
		else
			return str_replace(' ', "&nbsp;", number_format($value,2,','," "));
	}

	/**
	 * Возвращает отформатированное значение Пробега
	 *
	 * @param float     $value      Число
	 * @param bool      $input      Флаг использования в <input>
	 *
	 * @return string
	 */
	public static function mileageFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,1,'.','');
		else
			return str_replace(' ', "&nbsp;", number_format($value,1,','," "));
	}

	/**
	 * Возвращает отформатированное значение Литров
	 *
	 * @param float     $value      Число
	 * @param bool      $input      Флаг использования в <input>
	 *
	 * @return string
	 */
	public static function literFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,2,'.','');
		else
			return str_replace(' ', "&nbsp;", number_format($value,2,','," "));
	}

	/**
	 * Возвращает отформатированное значение Расхода среднего
	 *
	 * @param float     $value      Число
	 * @param bool      $input      Флаг использования в <input>
	 *
	 * @return string
	 */
	public static function averageFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,2,'.','');
		else
			return str_replace(' ', "&nbsp;", number_format($value,2,','," "));
	}


	public static function showListTable ($arData=null,$arColumn=null,$arSystem=null,$div=null,$fuelNumRows=null,$itemsPerPage=null,$first=false)
	{
		try
		{
			if (is_null($arData))
			{
				throw new ArgumentNullException('arData');
			}
			if (is_null($arColumn))
			{
				throw new ArgumentNullException('arColumn');
			}
		}
		catch (ArgumentNullException $e)
		{
			die($e->showException());
		}

		$imgPath = CoreLib\Tools::getSitePath(CoreLib\Loader::getTemplate("icar")."images/");
		$toolsRoot = CoreLib\Config::getConfig("ICAR_TOOLS_ROOT");

		if (is_null($fuelNumRows))
		{
			$fuelNumRows = 20;
		}
		if (is_null($fuelNumRows))
		{
			$itemsPerPage = 20;
		}

		if (is_null($div))
		{
			$div = "ajaxListTable";
		}

		if (is_null($arSystem))
		{
			$arSystem = array(
				'CHECK' => true,
				'INFO' => true,
				'EDIT' => true,
				'DELETE' => true
			);
		}
		elseif (!isset($arSystem['CHECK']))
		{
			$arSystem['CHECK'] = true;
		}
		elseif (!isset($arSystem['INFO']))
		{
			$arSystem['INFO'] = true;
		}
		elseif (!isset($arSystem['EDIT']))
		{
			$arSystem['EDIT'] = true;
		}
		elseif (!isset($arSystem['DELETE']))
		{
			$arSystem['DELETE'] = true;

		}
		$echo = "";
		if ($first) {
		$echo.= '
<div class="itemsOnPage">Показывать на странице по
	<select class="selectItemsPerPage" name="item_per_page">
		<option value="5">5</option>
		<option value="10">10</option>
		<option value="20" selected>20</option>
		<option value="50">50</option>
		<option value="100">100</option>
		<option value="0">все</option>
	</select> записей
</div>
';
		}
		//$tableClass='listTable', $tdClass='listBody'
		$echo .= '<table class="listTable">'."\n\t"
			."<thead>\n\t\t<tr>\n";
		if (isset($arSystem['CHECK']) && $arSystem['CHECK'])
		{
			$echo.= "\t\t\t<td>\n\t\t\t\t"
				.'<input class="allcheck" type="checkbox" name="allcheck" value="1">'."\n\t\t\t"
				."</td>\n";
		}
		foreach ($arColumn as $code => $ar_column)
		{
			$echo.= "\t\t\t<td>".$ar_column['NAME']."</td>\n";
		}
		if (isset($arSystem['INFO']) && $arSystem['INFO'])
		{
			$echo.= "\t\t\t<td>".'<img src="'.$imgPath.'info.png" title="Информация">'."</td>\n";
		}
		if (isset($arSystem['EDIT']) && $arSystem['EDIT'])
		{
			$echo.= "\t\t\t<td>&nbsp;</td>\n";
		}
		if (isset($arSystem['DELETE']) && $arSystem['DELETE'])
		{
			$echo.= "\t\t\t<td>&nbsp;</td>\n";
		}
		$echo.= "\t\t</tr>\n"
			."\t</thead>\n\t"
			.'<tbody class="listBody">'."\n";
		foreach ($arData as $data)
		{
			$echo.= "\t\t<tr>\n";
			if (isset($arSystem['CHECK']) && $arSystem['CHECK'])
			{
				$echo.= "\t\t\t".'<td class="tdCheck">'."\n\t\t\t\t"
					.'<input id="check-'.$data["ID"].'" class="check_id" type="checkbox" name="check-'.$data["ID"].'" value="1">'."\n\t\t\t"
					."</td>\n";
			}
			foreach ($arColumn as $code=>$ar_column)
			{
				if ($ar_column["TYPE"]=="date")
				{
					$echo.= "\t\t\t".'<td class="tdDate">';
					$echo.= $data[$code];
				}
				elseif ($ar_column["TYPE"]=="string")
				{
					$echo.= "\t\t\t".'<td class="tdString">';
					$echo.= $data[$code];
				}
				elseif ($ar_column["TYPE"]=="money")
				{
					$echo.= "\t\t\t".'<td class="tdMoney">';
					$echo.= static::moneyFormat($data[$code]);
				}
				elseif ($ar_column["TYPE"]=="liter")
				{
					$echo.= "\t\t\t".'<td class="tdLiter">';
					$echo.= static::literFormat($data[$code]);
				}
				elseif ($ar_column["TYPE"]=="average")
				{
					$echo.= "\t\t\t".'<td class="tdAverage">';
					$echo.= static::averageFormat($data[$code]);
				}
				elseif ($ar_column["TYPE"]=="mileage")
				{
					$echo.= "\t\t\t".'<td class="tdMileage">';
					$echo.= static::mileageFormat($data[$code]);
				}
				elseif ($ar_column["TYPE"]=="waypoint")
				{
					$echo.= "\t\t\t".'<td class="tdWaypoint">';
					$echo.= '<img class="waypoint" src="'.$imgPath.'waypoint.png" data-id="'.$data[$code].'">';
				}
				elseif ($ar_column["TYPE"]=="full")
				{
					$echo.= "\t\t\t".'<td class="tdFull">';
					$echo.= ($data[$code])?'<img class="full-'.strtolower($code).'" src="'.$imgPath.'full.png" title="Полный бак" data-id="'.$data[$code].'">':"";
				}
				elseif ($ar_column["TYPE"]=="bool")
				{
					$echo.= "\t\t\t".'<td class="tdBool">';
					$echo.= ($data[$code])?'Да':"Нет";
				}
				$echo.= "</td>\n";
			}
			if (isset($arSystem['INFO']) && $arSystem['INFO'])
			{
				$echo.= "\t\t\t".'<td class="tdInfo">';
				if (strlen($data['INFO'])>0)
				{
					$echo.='<img class="info" src="'.$imgPath.'info.png" data-info="'.$data['INFO'].'">';
				}
				else
				{
					$echo.="&nbsp;";
				}
				$echo.="</td>\n";
			}
			if (isset($arSystem['EDIT']) && $arSystem['EDIT'])
			{
				$echo.= "\t\t\t".'<td class="tdEdit">'
					.'<a class="edit" href="edit.php?id='.$data["ID"].'"><img src="'.$imgPath.'edit.png"></a>'
					."</td>\n";
			}
			if (isset($arSystem['DELETE']) && $arSystem['DELETE'])
			{
				$echo.= "\t\t\t".'<td class="tdDelete">'
					.'<a class="delete" href="delete.php?id='.$data["ID"].'"><img src="'.$imgPath.'delete.png"></a>'
					."</td>\n";
			}
			$echo.= "\t\t</tr>\n";
		}
		$echo.= "\t</tbody>\n</table>\n";

		if ($first)
		{
			$echo.= '<style>

	.listTable, .listTable td, .listTable thead, .listTable tbody {
		margin: 0;
		padding: 0;
	}
	.listTable, .listTable td {
		border: 1px solid skyblue;
	}
	.listTable thead td {
		text-align: center;
		padding-left: 10px;
		padding-right: 10px;
		min-height: 32px;
	}
	.tdCheck,
	 .tdDate,
	 .tdString,
	 .tdMileage,
	 .tdWaypoint,
	 .tdBool,
	 .tdFull,
	 .tdInfo,
	 .tdEdit,
	 .tdDelete {
		text-align: center;
		padding-left: 10px;
		padding-right: 10px;
		height: 32px;
	}
	.tdMoney,
	 .tdLiter,
	 .tdAverage {
		text-align: right;
		padding-left: 10px;
		padding-right: 10px;
		height: 32px;
	}
	.tdOther {
		text-align: left;
		padding-left: 10px;
		padding-right: 10px;
		height: 32px;
	}
	.tdDate {
		width: 90px;
	}
	.itemsOnPage {
		text-align: left;
		padding-bottom: 20px;
	}
</style>';
		}


		return $echo;
	}
}