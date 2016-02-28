<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Exception;
use MSergeev\Core\Lib\SqlHelper;
use MSergeev\Core\Lib\SqlHelperDate;
use \MSergeev\Packages\Icar\Tables;
use MSergeev\Core\Entity\Query;

class Odo
{
	public static function addNewRouteFromPost ($post=null)
	{
		try
		{
			if (is_null($post))
			{
				throw new Exception\ArgumentNullException("_POST");
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		$arData = array();
		if (isset($post['my_car']))
		{
			$arData['MY_CAR_ID'] = intval($post['my_car']);
		}
		else
		{
			$arData['MY_CAR_ID'] = MyCar::getDefaultCarID();
		}
		if (isset($post['date']))
		{
			$arData['DATE'] = $post['date'];
		}
		else
		{
			$arData['DATE'] = date('d.m.Y');
		}
		if (isset($post['odo']))
		{
			$arData['ODO'] = $post['odo'];
		}
		if (isset($post['start_point']) && intval($post['start_point'])>0)
		{
			$arData['START_POINTS_ID'] = $post['start_point'];
		}
		else
		{
			$arPoint = array();
			if (isset($post['start_name']) && strlen($post['start_name'])>3)
			{
				$arPoint['NAME'] = $post['start_name'];
			}
			if (isset($post['start_address']) && strlen($post['start_address'])>5)
			{
				$arPoint['ADDRESS'] = $post['start_address'];
			}
			if (
				(isset($post['start_lat']) && strlen($post['start_lat'])>2)
				&& (isset($post['start_lon']) && strlen($post['start_lon'])>2)
			)
			{
				$arPoint['LON'] = $post['start_lon'];
				$arPoint['LAT'] = $post['start_lat'];
			}
			$arPoint['TYPE'] = Points::getPointTypeIdByCode('waypoint');
			$arData['START_POINTS_ID'] = Points::createNewPoint($arPoint);
		}
		if (isset($post['end_start']) && intval($post['end_start'])==1)
		{
			$arData['END_START'] = true;
		}
		else
		{
			$arData['END_START'] = false;
			if (isset($post['end_point']) && intval($post['end_point'])>0)
			{
				$arData['END_POINTS_ID'] = $post['end_point'];
				$arData['end_point_num'] = true;
			}
			else
			{
				$arPoint = array();
				if (isset($post['end_name']) && strlen($post['end_name'])>3)
				{
					$arPoint['NAME'] = $post['end_name'];
				}
				if (isset($post['end_address']) && strlen($post['end_address'])>5)
				{
					$arPoint['ADDRESS'] = $post['end_address'];
				}
				if (
					(isset($post['end_lat']) && strlen($post['end_lat'])>2)
					&& (isset($post['end_lon']) && strlen($post['end_lon'])>2)
				)
				{
					$arPoint['LON'] = $post['end_lon'];
					$arPoint['LAT'] = $post['end_lat'];
				}
				$arPoint['TYPE'] = Points::getPointTypeIdByCode('waypoint');
				$arData['END_POINTS_ID'] = Points::createNewPoint($arPoint);
			}
		}

		return static::addNewRoute($arData);
	}

	protected static function addNewRoute($arData=array())
	{
		try
		{
			if (empty($arData))
			{
				throw new Exception\ArgumentNullException('arNewRote');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		if (isset($arData['end_point_num']))
		{
			$bEndPoint = true;
			unset($arData['end_point_num']);
		}
		else
		{
			$bEndPoint = false;
		}

		$query = new Query('insert');
		$query->setTableName(Tables\RoutsTable::getTableName());
		$query->setTableMap(Tables\RoutsTable::getMapArray());
		$query->setInsertArray(array(0=>$arData));
		$res = $query->exec();
		if ($res->getResult())
		{
			if ($bEndPoint)
			{
				Points::increasePointPopular($arData['END_POINTS_ID']);
			}
			static::updateDayOdometer($arData['MY_CAR_ID'],$arData['DATE']);
			return $res->getInsertId();
		}
		else
		{
			return false;
		}
	}

	protected static function updateDayOdometer($carID=null,$date=null)
	{
		$helper = new SqlHelper();
		$dateHelper = new DateHelper();
		$routsTable = Tables\RoutsTable::getTableName();
		$odoTable = Tables\OdoTable::getTableName();
		$arResult = array();
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}
		if (is_null($date))
		{
			//$date = date('d.m.Y');
			$sql = "SELECT ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ID').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('DATE').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ODO')."\n";
			$sql.= "FROM ".$helper->wrapQuotes($routsTable)."\n";
			$sql.= "WHERE\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('MY_CAR_ID')." = ".$carID." AND\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ODO')." > 0\n";
			$sql.= "ORDER BY\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('DATE')." ASC,\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ID')." ASC";

			$query = new Query('select');
			$query->setQueryBuildParts($sql);
			$res = $query->exec();
			$arResult['BUY_ODO'] = MyCar::getBuyCarOdo($carID);
			$arResult['MAX_DATE_ODO'] = array();
			$bFirst = true;
			while ($ar_res = $res->fetch())
			{
				$ar_res['DATE'] = $dateHelper->convertDateFromDB($ar_res['DATE']);
				if ($bFirst)
				{
					$bFirst = false;
					$arResult['FIRST_DAY'] = $ar_res['DATE'];
				}
				$arResult['ROUTS'][$ar_res['ID']]['DATE'] =
				$arResult['ROUTS'][$ar_res['ID']]['ODO'] = $ar_res['ODO'];
				if (
					!isset($arResult['MAX_DATE_ODO'][$ar_res['DATE']])
					|| $ar_res['ODO'] > $arResult['MAX_DATE_ODO'][$ar_res['DATE']]
				)
				{
					$arResult['MAX_DATE_ODO'][$ar_res['DATE']] = $ar_res['ODO'];
				}
			}
			$arResult['LAST_DAY'] = date('d.m.Y');
			$lastOdo = $arResult['BUY_ODO'];
			$arResult['DAY_ODO'] = array();
			foreach ($arResult['MAX_DATE_ODO'] as $day=>$odo)
			{
				$arResult['DAY_ODO'][$day] = round(($odo - $lastOdo),1);
				$lastOdo = $odo;
			}
			$arResult['ODO_ALL_DAYS'] = array();
			$now_day = $arResult['FIRST_DAY'];
			$dateHelper = new DateHelper();
			while ($now_day !== $arResult['LAST_DAY'])
			{
				if (isset($arResult['DAY_ODO'][$now_day]))
				{
					$arResult['ODO_ALL_DAYS'][$now_day] = $arResult['DAY_ODO'][$now_day];
				}
				else
				{
					$arResult['ODO_ALL_DAYS'][$now_day] = 0;
				}
				$now_day = $dateHelper->strToTime($now_day,'+1 day','site');
			}

		}
		else
		{
			$arResult['FIRST_DAY'] = $date;
			$arResult['LAST_DAY'] = date('d.m.Y');
			$arResult['BUY_ODO'] = MyCar::getBuyCarOdo($carID);

			$sql = "SELECT ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ID').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('DATE').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ODO')."\n";
			$sql.= "FROM ".$helper->wrapQuotes($routsTable)."\n";
			$sql.= "WHERE\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('MY_CAR_ID')." = ".$carID." AND\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('DATE')." >= '".$dateHelper->convertDateToDB($date)."' AND\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ODO')." > 0\n";
			$sql.= "ORDER BY\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('DATE')." ASC,\n\t";
			$sql.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ID')." ASC";

			$query = new Query('select');
			$query->setQueryBuildParts($sql);
			$res = $query->exec();
			$arResult['MAX_DATE_ODO'] = array();
			while ($ar_res = $res->fetch())
			{
				$ar_res['DATE'] = $dateHelper->convertDateFromDB($ar_res['DATE']);
				$arResult['ROUTS'][$ar_res['ID']]['DATE'] =
				$arResult['ROUTS'][$ar_res['ID']]['ODO'] = $ar_res['ODO'];
				if (
					!isset($arResult['MAX_DATE_ODO'][$ar_res['DATE']])
					|| $ar_res['ODO'] > $arResult['MAX_DATE_ODO'][$ar_res['DATE']]
				)
				{
					$arResult['MAX_DATE_ODO'][$ar_res['DATE']] = $ar_res['ODO'];
				}
			}

			$sql2 = "SELECT ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ID').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('DATE').", ".$helper->wrapQuotes($routsTable)
				.".".$helper->wrapQuotes('ODO')."\n";
			$sql2.= "FROM ".$helper->wrapQuotes($routsTable)."\n";
			$sql2.= "WHERE\n\t";
			$sql2.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('MY_CAR_ID')." = ".$carID." AND\n\t";
			$sql2.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('DATE')." < '".$dateHelper->convertDateToDB($date)."' AND\n\t";
			$sql2.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ODO')." > 0\n";
			$sql2.= "ORDER BY\n\t";
			$sql2.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('DATE')." DESC,\n\t";
			$sql2.= $helper->wrapQuotes($routsTable)."."
				.$helper->wrapQuotes('ID')." DESC";

			$query = new Query('select');
			$query->setQueryBuildParts($sql2);
			$res = $query->exec();
			if ($ar_res = $res->fetch())
			{
				$lastOdo = $ar_res['ODO'];
				$arResult['LAST_RES'] = $ar_res;
			}
			else
			{
				$lastOdo = $arResult['BUY_ODO'];
			}

			$arResult['LAST_ODO'] = $lastOdo;

			$arResult['DAY_ODO'] = array();
			foreach ($arResult['MAX_DATE_ODO'] as $day=>$odo)
			{
				$arResult['DAY_ODO'][$day] = round(($odo - $lastOdo),1);
				$lastOdo = $odo;
			}

			$arResult['ODO_ALL_DAYS'] = array();
			$now_day = $arResult['FIRST_DAY'];
			while ($now_day !== $arResult['LAST_DAY'])
			{
				if (isset($arResult['DAY_ODO'][$now_day]))
				{
					$arResult['ODO_ALL_DAYS'][$now_day] = $arResult['DAY_ODO'][$now_day];
				}
				else
				{
					$arResult['ODO_ALL_DAYS'][$now_day] = 0;
				}
				$now_day = $dateHelper->strToTime($now_day,'+1 day','site');
			}

		}

		$sql2 = "SELECT\n\t".$helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('ID').", ".$helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('DATE').", ".$helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('ODO')."\n";
		$sql2.= "FROM\n\t".$helper->wrapQuotes($odoTable)."\n";
		$sql2.= "WHERE\n\t".$helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('MY_CAR_ID')." = ".$carID." AND\n\t";
		$sql2.= $helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('DATE')." >= '"
			.$dateHelper->convertDateToDB($arResult['FIRST_DAY'])."'\n";
		$sql2.= "ORDER BY ".$helper->wrapQuotes($odoTable)."."
			.$helper->wrapQuotes('DATE')." ASC";

		$query = new Query('select');
		$query->setQueryBuildParts($sql2);
		$res = $query->exec();
		$arResult['ODO_TABLE'] = array();
		while ($ar_res = $res->fetch())
		{
			$ar_res['DATE'] = $dateHelper->convertDateFromDB($ar_res['DATE']);
			$arResult['ODO_TABLE'][$ar_res['DATE']] = array(
				'ID' => $ar_res['ID'],
				'ODO' => $ar_res['ODO']
			);
		}

		$arResult['UPDATED'] = $arResult['INSERTED'] = array();
		foreach ($arResult['ODO_ALL_DAYS'] as $day=>$odo)
		{
			if (isset($arResult['ODO_TABLE'][$day]))
			{
				if ($odo != $arResult['ODO_TABLE'][$day]['ODO'])
				{
					$query = new Query('update');
					$query->setTableMap(Tables\OdoTable::getMapArray());
					$query->setTableName(Tables\OdoTable::getTableName());
					$query->setUpdatePrimary($arResult['ODO_TABLE'][$day]['ID']);
					$query->setUpdateArray(array('ODO' => $odo));
					$res = $query->exec();
					$arResult['UPDATED'][$day] = $res->getResult();
				}
			}
			else
			{
				$query = new Query('insert');
				$query->setTableMap(Tables\OdoTable::getMapArray());
				$query->setTableName(Tables\OdoTable::getTableName());
				$arInsert[0] = array(
					'MY_CAR_ID' => $carID,
					'DATE' => $day,
					'ODO' => $odo
				);
				$query->setInsertArray($arInsert);
				$res = $query->exec();
				$arResult['INSERTED'][$day] = $res->getInsertId();
			}
		}

	}

	public static function getMaxOdo ($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}
		$helper = new SqlHelper();
		$tableRouts = Tables\RoutsTable::getTableName();
		$sql = "SELECT\n\t".$helper->wrapQuotes($tableRouts).".".$helper->wrapQuotes('ODO')."\n";
		$sql.= "FROM\n\t".$helper->wrapQuotes($tableRouts)."\n";
		$sql.= "WHERE\n\t".$helper->wrapQuotes($tableRouts)."."
			.$helper->wrapQuotes('MY_CAR_ID')." = ".intval($carID)." AND\n\t";
		$sql.= $helper->wrapQuotes($tableRouts)."."
			.$helper->wrapQuotes('ODO')." > 0\n";
		$sql.= "ORDER BY\n\t";
		$sql.= $helper->wrapQuotes($tableRouts)."."
			.$helper->wrapQuotes('DATE')." DESC\n";
		$sql.= "LIMIT 1";

		$query = new Query('select');
		$query->setQueryBuildParts($sql);
		$res = $query->exec();
		if ($ar_res = $res->fetch())
		{
			return $ar_res['ODO'];
		}
		else
		{
			return 0;
		}
	}

}