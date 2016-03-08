<?php

namespace MSergeev\Packages\Icar\Lib;

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


	public static function showListTable ($arData,$arColumn,$carID=null,$arSystem=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}
		//Для теста
		$arColumn = array(
			'DATE' => array(
				'NAME' => "Дата",
				'TYPE' => 'date'
			),
			'FUELMARK_NAME' => array(
				'NAME' => "Марка топлива",
				'TYPE' => 'string'
			),
			'SUM' => array(
				'NAME' => "Сумма,<br>руб.",
				'TYPE' => 'money'
			),
			'LITER' => array(
				'NAME' => "Литраж,<br>л.",
				'TYPE' => 'liter'
			),
			'LITER_COST' => array(
				'NAME' => "Цена за литр,<br>руб.",
				'TYPE' => 'money'
			),
			'EXPENCE' => array(
				'NAME' => "Расход,<br>л./100км.",
				'TYPE' => 'average'
			),
			'ODO' => array(
				'NAME' => "Пробег,<br>км.",
				'TYPE' => 'mileage'
			),
			'POINTS_ID' => array(
				'NAME' => "Путевая<br>точка",
				'TYPE' => 'waypoint'
			),
			'FULL' => array(
				'NAME' => "Полный<br>бак",
				'TYPE' => 'bool'
			)
		);
		$arData = Fuel::getFuelList($carID);
		//Конец отладки

		$imgPath = CoreLib\Tools::getSitePath(CoreLib\Loader::getTemplate("icar")."images/");
		if (is_null($arSystem))
		{
			$arSystem = array(
				'CHECK' => true,
				'INFO' => true,
				'EDIT' => true,
				'DELETE' => true
			);
		}

		//$tableClass='listTable', $tdClass='listBody'
		$echo = '<table class="listTable">'."\n\t"
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
			$echo.= "\t\t\t<td>&nbsp;</td>\n";
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
				elseif ($ar_column["TYPE"]=="bool")
				{
					$echo.= "\t\t\t".'<td class="tdBool">';
					$echo.= ($data[$code])?'<img class="bool-'.strtolower($code).'" src="'.$imgPath.'full.png" title="Полный бак" data-id="'.$data[$code].'">':"";
				}
				$echo.= "</td>\n";
			}
			if (isset($arSystem['INFO']) && $arSystem['INFO'])
			{
				$echo.= "\t\t\t".'<td class="tdInfo">'
					.'<img class="info" src="'.$imgPath.'info.png" data-info="'.$data['INFO'].'">'
					."</td>\n";
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
	}
	.tdCheck,
	 .tdDate,
	 .tdString,
	 .tdMileage,
	 .tdWaypoint,
	 .tdBool,
	 .tdInfo,
	 .tdEdit,
	 .tdDelete {
		text-align: center;
		padding-left: 10px;
		padding-right: 10px;
	}
	.tdMoney,
	 .tdLiter,
	 .tdAverage {
		text-align: right;
		padding-left: 10px;
		padding-right: 10px;
	}
</style>';

		return $echo;
	}
}