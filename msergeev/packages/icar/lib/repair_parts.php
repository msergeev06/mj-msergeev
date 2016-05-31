<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Lib as CoreLib;
use MSergeev\Core\Exception;
use MSergeev\Packages\Icar\Tables;
use MSergeev\Core\Entity\Query;

class RepairParts
{
	public static function getTotalRepairPartsCostsFormatted($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		return Main::moneyFormat(static::getTotalRepairPartsCosts($carID));
	}

	protected static function getTotalRepairPartsCosts($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$sqlHelper = new CoreLib\SqlHelper();
		$fuelTable = Tables\RepairPartsTable::getTableName();
		$query = new Query('select');
		$sql = "SELECT\n\t"
			."SUM(".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('NUMBER')." * "
			.$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('COST').") AS SUMM\n"
			."FROM\n\t".$sqlHelper->wrapQuotes($fuelTable)."\n"
			."WHERE\n\t".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('MY_CAR_ID')." = ".$carID;
		$query->setQueryBuildParts($sql);
		$res = $query->exec();
		if ($ar_res = $res->fetch())
		{
			$fuelCosts = $ar_res['SUMM'];
			return floatval($fuelCosts);
		}
		else
		{
			return 0;
		}
	}

	public static function addRepairPartsFromPost($post=null)
	{
		return false;
	}
}