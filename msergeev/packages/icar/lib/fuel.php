<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Packages\Icar\Tables;

class Fuel
{

	public static function getTotalFuelCosts ($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$fuelCosts = 0;

		return $fuelCosts;
	}

	public static function getAverageFuelConsumption($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$averageFuel = 0;

		return $averageFuel;
	}

	public static function getCarTotalSpentFuel ($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$total = 0;

		return $total;
	}

	public static function showSelectFuelMarks($strBoxName="fuel_mark", $strSelectedVal='null', $field1='class="fuel_mark"')
	{
		if ($arFuelMarks = static::getFuelMarksList())
		{
			$arValues = array ();
			foreach ($arFuelMarks as $arFuelMark)
			{
				$arValues[] = array (
					'NAME'  => $arFuelMark['NAME'],
					'VALUE' => $arFuelMark['ID']
				);
			}

			return SelectBox ($strBoxName, $arValues, '--- Выбрать ---', $strSelectedVal, $field1);
		}
	}

	public static function getFuelMarksList($bActive=true)
	{
		$arFuelMarks = array();
	}


}