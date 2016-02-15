<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Entity\Query;
use MSergeev\Core\Exception\ArgumentNullException;
use MSergeev\Core\Lib\SqlHelper;
use MSergeev\Packages\Icar\Tables\CarBodyTable;
use MSergeev\Packages\Icar\Tables\CarBrandTable;
use MSergeev\Packages\Icar\Tables\CarGearboxTable;
use MSergeev\Packages\Icar\Tables\CarModelTable;
use MSergeev\Packages\Icar\Tables\MyCarTable;

class MyCar
{
	public static function addNewCar($arData=array())
	{
		try
		{
			if (empty($arData))
			{
				throw new ArgumentNullException('arData');
			}
		}
		catch (ArgumentNullException $e)
		{
			$e->showException();

			return false;
		}


		$arMap = MyCarTable::getMapArray();
		$arInsert = array();
		foreach ($arMap as $field=>$obMap)
		{
			if (isset($arData[$field]))
			{
				$arInsert[0][$field] = $arData[$field];
			}
		}

		if (isset($arInsert[0]['DEFAULT']) && $arInsert[0]['DEFAULT'])
		{
			$res = static::uncheckDefaultAllCars();
		}

		$query = new Query('insert');
		$query->setTableName(MyCarTable::getTableName());
		$query->setTableMap(MyCarTable::getMapArray());
		$query->setInsertArray($arInsert);
		$res = $query->exec();

		return $res;
	}

	public static function uncheckDefaultAllCars()
	{
		$helper = new SqlHelper();
		$query = new Query('update');
		$sql = "UPDATE\n\t"
			.$helper->wrapQuotes(MyCarTable::getTableName())
			."\nSET\n\t"
			.$helper->wrapQuotes('DEFAULT')
			." = 'N'\nWHERE\n\t"
			.$helper->wrapQuotes('DEFAULT')." = 'Y';";
		$query->setQueryBuildParts($sql);
		$res = $query->exec();

		return $res;
	}

	public static function getListCar ($bActive=true)
	{
		$helper = new SqlHelper();

		$sql = "SELECT\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('ID')." AS "
			.$helper->wrapQuotes('ID').",\n\t";
		$sql .= $helper->wrapQuotes('car')
			.".".$helper->wrapQuotes('ACTIVE')." AS "
			.$helper->wrapQuotes('ACTIVE').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('SORT')." AS "
			.$helper->wrapQuotes('SORT').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('NAME')." AS "
			.$helper->wrapQuotes('NAME').",\n\t";
		$sql .= $helper->wrapQuotes('brand')."."
			.$helper->wrapQuotes('ID')." AS "
			.$helper->wrapQuotes('BRAND_ID').",\n\t";
		$sql .= $helper->wrapQuotes('brand')."."
			.$helper->wrapQuotes('NAME')." AS "
			.$helper->wrapQuotes('BRAND_NAME').",\n\t";
		$sql .= $helper->wrapQuotes('brand')."."
			.$helper->wrapQuotes('CODE')." AS "
			.$helper->wrapQuotes('BRAND_CODE').",\n\t";
		$sql .= $helper->wrapQuotes('model')."."
			.$helper->wrapQuotes('ID')." AS "
			.$helper->wrapQuotes('MODEL_ID').",\n\t";
		$sql .= $helper->wrapQuotes('model')."."
			.$helper->wrapQuotes('NAME')." AS "
			.$helper->wrapQuotes('MODEL_NAME').",\n\t";
		$sql .= $helper->wrapQuotes('model')."."
			.$helper->wrapQuotes('BRANDS_ID')." AS "
			.$helper->wrapQuotes('MODEL_BRANDS_ID').",\n\t";
		$sql .= $helper->wrapQuotes('model')."."
			.$helper->wrapQuotes('CODE')." AS "
			.$helper->wrapQuotes('MODEL_CODE').",\n\t";
		$sql .= $helper->wrapQuotes('gear')."."
			.$helper->wrapQuotes('ID')." AS "
			.$helper->wrapQuotes('GEARBOX_ID').",\n\t";
		$sql .= $helper->wrapQuotes('gear')."."
			.$helper->wrapQuotes('NAME')." AS "
			.$helper->wrapQuotes('GEARBOX_NAME').",\n\t";
		$sql .= $helper->wrapQuotes('gear')."."
			.$helper->wrapQuotes('CODE')." AS "
			.$helper->wrapQuotes('GEARBOX_CODE').",\n\t";
		$sql .= $helper->wrapQuotes('body')."."
			.$helper->wrapQuotes('ID')." AS "
			.$helper->wrapQuotes('BODY_ID').",\n\t";
		$sql .= $helper->wrapQuotes('body')."."
			.$helper->wrapQuotes('NAME')." AS "
			.$helper->wrapQuotes('BODY_NAME').",\n\t";
		$sql .= $helper->wrapQuotes('body')."."
			.$helper->wrapQuotes('CODE')." AS "
			.$helper->wrapQuotes('BODY_CODE').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('YEAR')." AS "
			.$helper->wrapQuotes('YEAR').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('VIN')." AS "
			.$helper->wrapQuotes('VIN').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CAR_NUMBER')." AS "
			.$helper->wrapQuotes('CAR_NUMBER').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('ENGINE_CAPACITY')." AS "
			.$helper->wrapQuotes('ENGINE_CAPACITY').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('INTERVAL_TS')." AS "
			.$helper->wrapQuotes('INTERVAL_TS').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('COST')." AS "
			.$helper->wrapQuotes('COST').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('MILEAGE')." AS "
			.$helper->wrapQuotes('MILEAGE').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CREDIT')." AS "
			.$helper->wrapQuotes('CREDIT').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CREDIT_COST')." AS "
			.$helper->wrapQuotes('CREDIT_COST').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('DATE_OSAGO_END')." AS "
			.$helper->wrapQuotes('DATE_OSAGO_END').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('DATE_GTO_END')." AS "
			.$helper->wrapQuotes('DATE_GTO_END').",\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('DEFAULT')." AS "
			.$helper->wrapQuotes('DEFAULT')."\n";
		$sql .= "FROM\n\t";
		$sql .= $helper->wrapQuotes('ms_icar_my_car')." AS "
			.$helper->wrapQuotes('car')." ,\n\t";
		$sql .= $helper->wrapQuotes('ms_icar_car_brand')." AS "
			.$helper->wrapQuotes('brand')." ,\n\t";
		$sql .= $helper->wrapQuotes('ms_icar_car_model')." AS "
			.$helper->wrapQuotes('model')." ,\n\t";
		$sql .= $helper->wrapQuotes('ms_icar_car_gearbox')." AS "
			.$helper->wrapQuotes('gear')." ,\n\t";
		$sql .= $helper->wrapQuotes('ms_icar_car_body')." AS "
			.$helper->wrapQuotes('body')."\n";
		$sql .= "WHERE\n\t";
		if ($bActive)
		{
			$sql .= $helper->wrapQuotes('car')."."
				.$helper->wrapQuotes('ACTIVE')." = 'Y' AND\n\t";
		}
		$sql .= $helper->wrapQuotes('brand')."."
			.$helper->wrapQuotes('ID')." = "
			.$helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CAR_BRANDS_ID')." AND\n\t";
		$sql .= $helper->wrapQuotes('model')."."
			.$helper->wrapQuotes('ID')." = "
			.$helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CAR_MODEL_ID')." AND\n\t";
		$sql .= $helper->wrapQuotes('gear')."."
			.$helper->wrapQuotes('ID')." = "
			.$helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CAR_GEARBOX_ID')." AND\n\t";
		$sql .= $helper->wrapQuotes('body')."."
			.$helper->wrapQuotes('ID')." = "
			.$helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('CAR_BODY_ID')."\n";
		$sql .= "ORDER BY\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('SORT')." ASC,\n\t";
		$sql .= $helper->wrapQuotes('car')."."
			.$helper->wrapQuotes('NAME')." ASC";


		$query = new Query('select');
		$query->setQueryBuildParts($sql);
		$res = $query->exec();
		$arResult = array();
		$i=0;
		while ($ar_res = $res->fetch())
		{
			foreach ($ar_res as $key=>$value)
			{
				if (!is_numeric($key))
				{
					$arResult[$i][$key] = $value;
				}
			}
			$i++;
		}
		$arResult = static::fetchCarData($arResult);

		return $arResult;
	}

	protected static function fetchCarData ($arResult)
	{
		$myCarMap = MyCarTable::getMapArray();
		$carBodyMap = CarBodyTable::getMapArray();
		$carBrandMap = CarBrandTable::getMapArray();
		$carGearboxMap = CarGearboxTable::getMapArray();
		$carModelMap = CarModelTable::getMapArray();
		foreach ($arResult as $key=>&$arCar)
		{
			foreach ($arCar as $field=>&$value)
			{
				if (isset($myCarMap[$field]))
				{
					$value = $myCarMap[$field]->fetchDataModification($value);
				}
				elseif (strstr($field,'BRAND_'))
				{
					switch ($field)
					{
						case 'BRAND_ID':
							$value = $carBrandMap['ID']->fetchDataModification($value);
							$arCar['BRAND']['ID'] = $value;
							break;
						case 'BRAND_NAME':
							$value = $carBrandMap['NAME']->fetchDataModification($value);
							$arCar['BRAND']['NAME'] = $value;
							break;
						case 'BRAND_CODE':
							$value = $carBrandMap['CODE']->fetchDataModification($value);
							$arCar['BRAND']['CODE'] = $value;
							break;
					}
				}
				elseif (strstr($field,'MODEL_'))
				{
					switch ($field)
					{
						case 'MODEL_ID':
							$value = $carModelMap['ID']->fetchDataModification($value);
							$arCar['MODEL']['ID'] = $value;
							break;
						case 'MODEL_NAME':
							$value = $carModelMap['NAME']->fetchDataModification($value);
							$arCar['MODEL']['NAME'] = $value;
							break;
						case 'MODEL_BRANDS_ID':
							$value = $carModelMap['BRANDS_ID']->fetchDataModification($value);
							$arCar['MODEL']['BRAND_ID'] = $value;
							break;
						case 'MODEL_CODE':
							$value = $carModelMap['CODE']->fetchDataModification($value);
							$arCar['MODEL']['CODE'] = $value;
							break;
					}
				}
				elseif (strstr($field,'GEARBOX_'))
				{
					switch ($field)
					{
						case 'GEARBOX_ID':
							$value = $carGearboxMap['ID']->fetchDataModification($value);
							$arCar['GEARBOX']['ID'] = $value;
							break;
						case 'GEARBOX_NAME':
							$value = $carGearboxMap['NAME']->fetchDataModification($value);
							$arCar['GEARBOX']['NAME'] = $value;
							break;
						case 'GEARBOX_CODE':
							$value = $carGearboxMap['CODE']->fetchDataModification($value);
							$arCar['GEARBOX']['CODE'] = $value;
							break;
					}
				}
				elseif (strstr($field,'BODY_'))
				{
					switch ($field)
					{
						case 'BODY_ID':
							$value = $carBodyMap['ID']->fetchDataModification($value);
							$arCar['BODY']['ID'] = $value;
							break;
						case 'BODY_NAME':
							$value = $carBodyMap['NAME']->fetchDataModification($value);
							$arCar['BODY']['NAME'] = $value;
							break;
						case 'BODY_CODE':
							$value = $carBodyMap['CODE']->fetchDataModification($value);
							$arCar['BODY']['CODE'] = $value;
							break;
					}
				}
			}
			unset($value);
		}
		unset($arCar);

		return $arResult;
	}

	public static function getCarTotalCosts ($carID=0)
	{
		$total = 0;

		return round($total,2);
	}

	public static function getCarAverageFuel ($carID=0)
	{
		$average = 0;
		return round($average,2);
	}

	public static function getCarTotalSpentFuelFormatted ($carID=0)
	{
		$spent = static::getCarTotalSpentFuel($carID);
		return number_format($spent,2);
	}

	public static function getCarTotalSpentFuel ($carID=0)
	{
		$spent = 0;

		return $spent;
	}

	public static function getCarCurrentMileage ($carID=0)
	{
		$mileage = 0;

		return $mileage;
	}

	public static function getCarCurrentMileageFormatted ($carID=0)
	{
		$mileage = static::getCarCurrentMileage ($carID);

		return number_format($mileage,2);
	}

	public static function getCarByID ($carID=0)
	{
		if ($carID==0) $carID = static::getDefaultCarID();

		$arResult = MyCarTable::getList(array(
			"filter" => array(
				"ID" => $carID
			),
			"limit" => 1
		));
		if (isset($arResult[0]))
			$arResult = $arResult[0];
		return $arResult;
	}

	public static function getDefaultCar ()
	{
		return static::getDefaultCarID();
	}

	public static function getDefaultCarID ()
	{
		$arRes = MyCarTable::getList(array(
			'select' => array('ID'),
			'filter' => array(
				'ACTIVE' => true,
				'DEFAULT' => true
			),
			'limit' => 1
		));
		if (isset($arRes[0]))
		{
			return $arRes[0]['ID'];
		}
		else
		{
			return false;
		}
	}
}