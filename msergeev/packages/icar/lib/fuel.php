<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Core\Entity\Query;
use MSergeev\Core\Exception;
use MSergeev\Core\Lib\Buffer;
use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Lib\Loader;
use MSergeev\Core\Lib\Options;
use MSergeev\Core\Lib\SqlHelper;
use MSergeev\Core\Lib\Tools;
use MSergeev\Core\Lib\Webix;
use MSergeev\Packages\Icar\Tables;

class Fuel
{
	//protected static $bRecalculateExpence = false;

	/**
	 * Возвращает сумму расходов на топливо
	 *
	 * @param int   $carID
	 *
	 * @return int
	 */
	public static function getTotalFuelCosts ($carID=null)
	{
		$fuelCosts = 0;
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$sqlHelper = new SqlHelper();
		$fuelTable = Tables\FuelTable::getTableName();
		$query = new Query('select');
		$sql = "SELECT\n\t"
			."SUM(".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('SUM').") AS SUMM\n"
			."FROM\n\t".$sqlHelper->wrapQuotes($fuelTable)."\n"
			."WHERE\n\t".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('MY_CAR_ID')." = ".$carID;
		$query->setQueryBuildParts($sql);
		$res = $query->exec();
		if ($ar_res = $res->fetch())
		{
			$fuelCosts = $ar_res['SUMM'];
		}


		return $fuelCosts;
	}

	/**
	 * Возвращает отформатированную сумму расходов на топливо
	 *
	 * @param int $carID
	 *
	 * @return string
	 */
	public static function getTotalFuelCostsFormatted($carID=null)
	{
		return Main::moneyFormat(static::getTotalFuelCosts($carID));
	}

	/**
	 * Возвращает средний расход топлива
	 *
	 * @param int $carID
	 *
	 * @return float
	 */
	public static function getAverageFuelConsumption($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$averageFuel = 0;

		$arRes = Tables\FuelTable::getList(array(
			'select' => array('EXPENCE'),
			'filter' => array(
				'MY_CAR_ID' => $carID,
				'>EXPENCE' => 0
			)
		));
		if ($arRes)
		{
			$count = count($arRes);
			$sum = 0;
			foreach ($arRes as $ar_res)
			{
				$sum += $ar_res['EXPENCE'];
			}
			$averageFuel = $sum / $count;
		}

		return $averageFuel;
	}

	/**
	 * Возвращает количество израсходованного топлива
	 *
	 * @param int   $carID
	 *
	 * @return float
	 */
	public static function getCarTotalSpentFuel ($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$total = 0;

		$sqlHelper = new SqlHelper();
		$fuelTable = Tables\FuelTable::getTableName();
		$query = new Query('select');
		$sql = "SELECT\n\t"
			."SUM(".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('LITER').") AS SUMM\n"
			."FROM\n\t".$sqlHelper->wrapQuotes($fuelTable)."\n"
			."WHERE\n\t".$sqlHelper->wrapQuotes($fuelTable).'.'
			.$sqlHelper->wrapQuotes('MY_CAR_ID')." = ".$carID;
		$query->setQueryBuildParts($sql);
		$res = $query->exec();
		if ($ar_res = $res->fetch())
		{
			$total = $ar_res['SUMM'];
		}

		return $total;
	}

	/**
	 * Подготавливает данные из формы для добавления в БД
	 *
	 * @param array $post
	 */
	public static function addFuelFromPost ($post=null)
	{
		try
		{
			if (is_null($post))
			{
				throw new Exception\ArgumentNullException('post');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}

		$arData = array();
		if (!isset($post['my_car']))
		{
			$arData['MY_CAR_ID'] = MyCar::getDefaultCarID();
		}
		else
		{
			$arData['MY_CAR_ID'] = intval($post['my_car']);
		}
		if (isset($post['date']))
		{
			$arData['DATE'] = $post['date'];
		}
		if (isset($post['odo']))
		{
			if (floatval($post['odo'])==0)
			{
				$arData['ODO'] = MyCar::getBuyCarOdo($arData['MY_CAR_ID']);
			}
			else
			{
				$arData['ODO'] = floatval($post['odo']);
			}
		}
		if (isset($post['fuel_mark']))
		{
			$arData['FUELMARK_ID'] = intval($post['fuel_mark']);
		}
		if (isset($post['liters']))
		{
			$arData['LITER'] = floatval($post['liters']);
		}
		if (isset($post['cost_liter']))
		{
			$arData['LITER_COST'] = floatval($post['cost_liter']);
		}
		if (isset($arData['LITER']) && isset($arData['LITER_COST']))
		{
			$arData['SUM'] = floatval($arData['LITER_COST'] * $arData['LITER']);
		}
		if (isset($post['full_tank']) && intval($post['full_tank']) == 1)
		{
			$arData['FULL'] = true;
		}
		else
		{
			$arData['FULL'] = false;
		}
		/*
		$arData['EXPENCE'] = static::calculateExpence(
			$arData['MY_CAR_ID'],
			$arData['DATE'],
			$arData['ODO'],
			$arData['LITER'],
			$arData['FULL']
		);
		*/
		if (isset($post['comment']))
		{
			$arData['DESCRIPTION'] = trim($post['comment']);
		}
		if (isset($post['fuel_point']) && intval($post['fuel_point'])>0)
		{
			$arData['POINTS_ID'] = intval($post['fuel_point']);
		}
		else
		{
			$arPoint = array();
			if (isset($post['newpoint_name']) && strlen($post['newpoint_name'])>3)
			{
				$arPoint['NAME'] = $post['newpoint_name'];
			}
			else
			{
				$arPoint['NAME'] = '[auto] АЗС';
			}
			if (isset($post['newpoint_address']) && strlen($post['newpoint_address'])>5)
			{
				$arPoint['ADDRESS'] = $post['newpoint_address'];
			}
			if (
				(isset($post['newpoint_lat']) && strlen($post['newpoint_lat'])>2)
				&& (isset($post['newpoint_lon']) && strlen($post['newpoint_lon'])>2)
			)
			{
				$arPoint['LON'] = $post['newpoint_lon'];
				$arPoint['LAT'] = $post['newpoint_lat'];
			}
			$arPoint['TYPE'] = Points::getPointTypeIdByCode('fuel');
			$arData['POINTS_ID'] = Points::createNewPoint($arPoint);
		}

		//return static::addFuel($arData);
	}

	/**
	 * Возвращает <select> с марками топлива
	 *
	 * @param string $strBoxName
	 * @param string $strSelectedVal
	 * @param string $field1
	 *
	 * @return string
	 */
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
		else
		{
			return '[Нет марок топлива]';
		}
	}

	public static function getFuelList ($carID=null,$limit=0,$offset=0)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$arList = array(
			'select' => array(
				'ID',
				'MY_CAR_ID',
				'MY_CAR_ID.NAME' => 'MY_CAR_NAME',
				'MY_CAR_ID.CAR_NUMBER' => 'MY_CAR_NUMBER',
				'DATE',
				'ODO',
				'FUELMARK_ID',
				'FUELMARK_ID.NAME' => 'FUELMARK_NAME',
				'LITER',
				'LITER_COST',
				'SUM',
				'FULL',
				'EXPENCE',
				'POINTS_ID',
				'POINTS_ID.NAME' => 'POINT_NAME',
				'POINTS_ID.POINT_TYPES_ID' => 'POINT_TYPE_ID',
				'POINTS_ID.POINT_TYPES_ID.NAME' => 'POINT_TYPE_NAME',
				'DESCRIPTION' => 'INFO'
			),
			'filter' => array(
				'MY_CAR_ID' => $carID
			),
			'order' => array(
				'DATE' => 'ASC',
				'ID' => 'ASC'
			)
		);
		if ($limit>0)
		{
			$arList['limit'] = $limit;
			$arList['offset'] = $offset;
		}

		$arRes = Tables\FuelTable::getList($arList);

		return $arRes;
	}

	public static function getFuelNumRows ($carID=null)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$helper = new SqlHelper();
		$sql = "SELECT\n\t".$helper->wrapQuotes('ID')."\nFROM\n\t"
			.$helper->wrapQuotes(Tables\FuelTable::getTableName())."\nWHERE\n\t"
			.$helper->wrapQuotes('MY_CAR_ID')." = ".$carID;
		$query = new Query('select');
		$query->setQueryBuildParts($sql);
		$res = $query->exec();

		return $res->getNumRows();
	}

	public static function showListTable ($carID = null, $div = null, $first=false)
	{
		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		$dateHelper = new DateHelper();
		$arList = static::getFuelList($carID);
		$imgSrcPath = Tools::getSitePath(Loader::getTemplate('icar')."images/");

		//msDebug($arList);
		$arDatas = array();
		foreach ($arList as $list)
		{
			$arDatas[] = array(
				'id' => $list['ID'],
				'date' => $list['DATE'],
				'timestamp' => "=".$dateHelper->getDateTimestamp($list['DATE']),
				'odo' => "=".$list['ODO'],
				'fuelmark_name' => $list['FUELMARK_NAME'],
				'liter' => "=".$list['LITER'],
				'liter_cost' => "=".$list['LITER_COST'],
				'sum' => "=".$list['SUM'],
				'full' => ($list['FULL'])?"Да":"-",
				'expence' => "=".$list['EXPENCE'],
				'point_name' => $list['POINT_NAME'],
				'point_type' => $list['POINT_TYPE_NAME'],
				'info' => (strlen($list['INFO'])>0)?"<img src='".$imgSrcPath."info.png'>":"",
				'comment' => $list['INFO'],
				'edit' => "<a href='edit.php?id=".$list['ID']."'><img src='".$imgSrcPath."edit.png'></a>",
				'delete' => "<a href='delete.php?id=".$list['ID']."'><img src='".$imgSrcPath."delete.png'></a>"
				//'edit' => '&nbsp;',
				//'delete' => '&nbsp;'
			);
		}

		$func = "function sortByTimestamp (a,b){\n\t"
			."a=a.timestamp;\n\tb=b.timestamp;\n\treturn a>b?1:(a<b?-1:0);\n};\n\n";
		Buffer::addWebixJs($func);

/*		$func = "function editClick(id, e){\n\t"
			."var item_id = $$('datatable').locate(e);\n\t"
			.'webix.message("Edit "+item_id);'."}\n";
		Buffer::addWebixJs($func);

		$func = "function deleteClick(id, e){\n\t"
			."var item_id = $$('datatable').locate(e);\n\t"
			.'webix.message("Delete "+item_id);'."}\n";
		Buffer::addWebixJs($func);*/

		$arData = array(
			'grid' => 'grida',
			'container' => 'testA',
			'columns' => array(
				array(
					'id' => "date",
					'tooltip' => '=false',
					'header' => "Дата",
					//'width' => "=100",
					'adjust'=>'=true',
					'sort' => '=sortByTimestamp',
					'footer'=>'={text:"Итого:", colspan:3}'
				),
				array(
					'id' => "odo",
					'tooltip' => '=false',
					'header' => "Пробег",
					//'width' => "=100",
					'adjust'=>'=true',
					'sort' => 'int'
					//'editor' => 'text'
				),
				array(
					'id' => "fuelmark_name",
					'tooltip' => '=false',
					'header' => "Тип топлива",
					//'width' => "=100",
					'adjust'=>'=true',
					'sort' => 'string'
				),
				array(
					'id' => "liter",
					'tooltip' => '=false',
					'header' => "Литров",
					//'width' => "=70",
					'adjust'=>'=true',
					'sort' => 'int',
					'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
					'footer'=>'={ content:"summColumn" }'
				),
				array(
					'id' => "liter_cost",
					'tooltip' => '=false',
					'header' => "р/л.",
					//'width' => "=70",
					'adjust'=>'=true',
					'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
					'sort' => 'int'
				),
				array(
					'id' => "sum",
					'tooltip' => '=false',
					'header' => "Сумма",
					//'width' => "=100",
					'adjust'=>'=true',
					'sort' => 'int',
					'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
					'footer'=>'={ content:"summColumn" }'
				),
				array(
					'id' => "full",
					'tooltip' => '=false',
					'header' => "Полный",
					//'width' => "=70"
					'adjust'=>'=true'
				),
				array(
					'id' => "expence",
					'tooltip' => '=false',
					'header' => "Расход",
					//'width' => "=70",
					'adjust'=>'=true',
					'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
					'sort' => 'int'
				),
				array(
					'id' => "point_name",
					'tooltip' => 'Имя точки: #point_name#<br>Тип точки: #point_type#',
					'header' => "Точка",
					//'width' => "=200",
					'adjust'=>'=true',
					'sort' => 'string'
				),
				array(
					'id' => "info",
					'tooltip' => "#comment#",
					'header' => "Инфо",
					//'width' => "=50"
					'adjust'=>'=true'
				),
				array(
					'id' => "edit",
					'tooltip' => "Редактировать запись",
					'header' => "",
					//'width' => "=50"
					'adjust'=>'=true'
					//'template' => "<div class='buttons'>{common.editButton()}</div>"
				),
				array(
					'id' => "delete",
					'tooltip' => "Удалить запись",
					'header' => "",
					//'width' => "=50"
					'adjust'=>'=true'
					//'template' => "<div class='buttons'>{common.deleteButton()}</div>"
				)
			),
			'data' => $arDatas
		);

		return Webix::showDataTable($arData);
	}


	/**
	 * Возвращает массив всех марок топлива, по умолчанию выбирает только активные
	 *
	 * @param bool $bActive
	 *
	 * @return array|bool
	 */
	protected static function getFuelMarksList($bActive=true)
	{
		$arList = array();
		if ($bActive)
		{
			$arList['filter'] = array('ACTIVE'=>true);
		}
		$arList['order'] = array('SORT'=>'ASC');
		if ($arResult = Tables\FuelmarkTable::getList($arList))
		{
			return $arResult;
		}
		else
		{
			return false;
		}

	}

	/**
	 * Добавляет данные о заправки в БД
	 *
	 * @param array $arData
	 *
	 * @return bool|int
	 */
	protected static function addFuel ($arData=null)
	{
		try
		{
			if (is_null($arData))
			{
				throw new Exception\ArgumentNullException('arData');
			}
			elseif (!is_array($arData))
			{
				throw new Exception\ArgumentTypeException('arData','array');
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

		$query = new Query('insert');
		$query->setTableName(Tables\FuelTable::getTableName());
		$query->setTableMap(Tables\FuelTable::getMapArray());
		$query->setInsertArray(array(0 => $arData));
		$res = $query->exec();
		if ($res->getResult())
		{
			Points::increasePointPopular($arData['POINTS_ID']);
			static::recalculateExpence($arData);
			return $res->getInsertId();
		}
		else
		{
			return false;
		}
	}

	/**
	 * Функция пресчитывает расход топлива для всех записей, начиная с заданной
	 *
	 * @param array $arData
	 */
	protected static function recalculateExpence ($arData=null)
	{
		try
		{
			if (is_null($arData))
			{
				throw new Exception\ArgumentNullException('arData');
			}
			elseif (!is_array($arData))
			{
				throw new Exception\ArgumentTypeException('arData','array');
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

		if (!isset($arData['MY_CAR_ID']) || intval($arData['MY_CAR_ID'])<=0)
		{
			$arData['MY_CAR_ID'] = MyCar::getDefaultCarID();
		}

		if (!isset($arData['DATE']))
		{
			$arList = array(
				'select' => array('ID','DATE','ODO','LITER','FULL','EXPENCE'),
				'filter' => array(
					'MY_CAR_ID' => $arData['MY_CAR_ID']
				),
				'order' => array('DATE'=>'ASC','ID'=>'ASC')
			);
			$arRes = Tables\FuelTable::getList($arList);
			$bFirst = true;
			$buyOdo = MyCar::getBuyCarOdo($arData['MY_CAR_ID']);
			$lastOdo = 0;
			$sumLiter = 0;
			foreach($arRes as $ar_res)
			{
				if ($bFirst)
				{
					$bFirst = false;
					if ($ar_res['ODO']<=0)
					{
						$lastOdo = $buyOdo;
					}
				}
				if ($ar_res['ODO']<=0 || !$ar_res['FULL'])
				{
					$sumLiter += $ar_res['LITER'];
				}
				else
				{
					$mileage = $ar_res['ODO'] - $lastOdo;
					$sumLiter += $ar_res['LITER'];
					$expence = ($sumLiter*100)/$mileage;
					$expence = round($expence,2);
					if ($expence != $ar_res['EXPENCE'])
					{
						$arUpdate = array('EXPENCE' => $expence);
						$res = static::updateExpence($ar_res['ID'],$arUpdate);
						if (!$res)
						{
							//TODO: Добавить сообщения об ошибке
						}
					}
					$lastOdo = $ar_res['ODO'];
					$sumLiter = 0;
				}
			}
		}
		else
		{
			$arRes = Tables\FuelTable::getList(array(
				'select' => array('ID','DATE','ODO','LITER','FULL','EXPENCE'),
				'filter' => array(
					'MY_CAR_ID' => $arData['MY_CAR_ID'],
					'<DATE' => $arData['DATE'],
					'>EXPENCE' => 0
				),
				'order' => array('DATE'=>'DESC','ID'=>'DESC'),
				'limit' => 1
			));
			if (!$arRes)
			{
				static::recalculateExpence(array());
			}
			else
			{
				$arRes = $arRes[0];
				$lastOdo = $arRes['ODO'];
				$date = $arRes['DATE'];
				$sumLiter = 0;
				$arRes = Tables\FuelTable::getList(array(
					'select' => array('ID','DATE','ODO','LITER','FULL','EXPENCE'),
					'filter' => array(
						'MY_CAR_ID' => $arData['MY_CAR_ID'],
						'>DATE' => $date
					),
					'order' => array('DATE'=>'ASC','ID'=>'ASC')
				));
				if ($arRes)
				{
					foreach($arRes as $ar_res)
					{
						if ($ar_res['ODO']<=0 || !$ar_res['FULL'])
						{
							$sumLiter += $ar_res['LITER'];
						}
						else
						{
							$mileage = $ar_res['ODO'] - $lastOdo;
							$sumLiter += $ar_res['LITER'];
							$expence = ($sumLiter*100)/$mileage;
							$expence = round($expence,2);
							if ($expence != $ar_res['EXPENCE'])
							{
								$arUpdate = array('EXPENCE' => $expence);
								$res = static::updateExpence($ar_res['ID'],$arUpdate);
								if (!$res)
								{
									//TODO: Добавить сообщения об ошибке
								}
							}
							$lastOdo = $ar_res['ODO'];
							$sumLiter = 0;
						}
					}
				}
			}

		}

	}

	/**
	 * Обновляет значение расхода для указанной записи
	 *
	 * @param int   $primary
	 * @param array $arUpdate
	 *
	 * @return bool
	 */
	protected static function updateExpence ($primary=null,$arUpdate=null)
	{
		try
		{
			if (is_null($primary))
			{
				throw new Exception\ArgumentNullException('primary');
			}
			if (is_null($arUpdate))
			{
				throw new Exception\ArgumentNullException('arUpdate');
			}
			elseif (!is_array($arUpdate))
			{
				throw new Exception\ArgumentTypeException('arUpdate','array');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}
		catch (Exception\ArgumentTypeException $e2)
		{
			$e2->showException();
			return false;
		}

		$query = new Query('update');
		$query->setTableName(Tables\FuelTable::getTableName());
		$query->setTableMap(Tables\FuelTable::getMapArray());
		$query->setUpdateArray($arUpdate);
		$query->setUpdatePrimary($primary);
		$res = $query->exec();
		if ($res->getResult())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Сохраняет последнюю использованную марку топлива для автомобиля
	 *
	 * @param int   $fuelMark   ID марки топлива
	 * @param int   $carID      ID автомобиля
	 *
	 * @return bool
	 */
	protected static function setLastUseFuelMark ($fuelMark=null,$carID=null)
	{
		try
		{
			if (is_null($fuelMark))
			{
				throw new Exception\ArgumentNullException('fuelMark');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			$e->showException();
			return false;
		}

		if (is_null($carID))
		{
			$carID = MyCar::getDefaultCarID();
		}

		if (!Options::setOption('icar_last_fuelmark_'.$carID,$fuelMark))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}