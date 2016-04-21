<?php

namespace MSergeev\Core\Lib;

use MSergeev\Core\Exception;

class WebixHelper
{
	protected $columnsValues = null;
	public function __construct()
	{
		$this->columnsValues = array(
			'DATE' => array(
				'id' => "date",
				'tooltip' => '=false',
				'header' => "Дата",
				'adjust'=>'=true',
				'sort' => '=sortByTimestamp'
			),
			'ODO' => array(
				'id' => "odo",
				'tooltip' => '=false',
				'header' => "Пробег",
				'adjust'=>'=true',
				'sort' => 'int'
			),
			'FUELMARK_NAME' => array(
				'id' => "fuelmark_name",
				'tooltip' => '=false',
				'header' => "Тип топлива",
				'adjust'=>'=true',
				'sort' => 'string'
			),
			'LITER' => array(
				'id' => "liter",
				'tooltip' => '=false',
				'header' => "Литров",
				'adjust'=>'=true',
				'sort' => 'int',
				'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})'
			),
			'LITER_COST' => array(
				'id' => "liter_cost",
				'tooltip' => '=false',
				'header' => "р/л.",
				'adjust'=>'=true',
				'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
				'sort' => 'int'
			),
			'LITER_COST_SUM' => array(
				'id' => "sum",
				'tooltip' => '=false',
				'header' => "Сумма",
				'adjust'=>'=true',
				'sort' => 'int',
				'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
				})'
			),
			'FULL' => array(
				'id' => "full",
				'tooltip' => '=false',
				'header' => "Полный",
				'adjust'=>'=true'
			),
			'EXPENCE' => array(
				'id' => "expence",
				'tooltip' => '=false',
				'header' => "Расход",
				'adjust'=>'=true',
				'format' => '=webix.Number.numToStr({
						groupDelimiter:" ",
						groupSize:3,
						decimalDelimiter:",",
						decimalSize:2
					})',
				'sort' => 'int'
			),
			'POINT' => array(
				'id' => "point_name",
				'tooltip' => 'Имя точки: #point_name#<br>'
					.'Тип точки: #point_type#<br>'
					.'Широта: #point_latitude#<br>'
					.'Долгота: #point_longitude#',
				'header' => "Точка",
				'adjust'=>'=true',
				'sort' => 'string'
			),
			'INFO' => array(
				'id' => "info",
				'tooltip' => "#comment#",
				'header' => "Инфо",
				'adjust'=>'=true'
			),
			'EDIT' => array(
				'id' => "edit",
				'tooltip' => "Редактировать запись",
				'header' => "",
				'adjust'=>'=true'
			),
			'DELETE' => array(
				'id' => "delete",
				'tooltip' => "Удалить запись",
				'header' => "",
				'adjust'=>'=true'
			)
		);
	}

	public function getColumnArray($columnCode=null,$otherParams=array(),$params=array())
	{
		try
		{
			if (is_null($columnCode))
			{
				throw new Exception\ArgumentNullException('columnCode');
			}
			if (!isset($this->columnsValues[$columnCode]))
			{
				throw new Exception\ArgumentOutOfRangeException('columnsValues[columnCode]');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			die($e->showException());
		}
		catch (Exception\ArgumentOutOfRangeException $e2)
		{
			die($e2->showException());
		}

		$columnArray = $this->columnsValues[$columnCode];
		foreach ($columnArray as $key=>&$value)
		{
			if (isset($params[$key]))
			{
				$value = $params[$key];
			}
		}
		unset($value);
		$columnArray = array_merge($columnArray,$otherParams);

		return $columnArray;
	}

	public function getRandomColumnArray (
		$id = "fieldID",
		$header = "Заголовок",
		$sort = 'text',
		$tooltip = '=false',
		$adjust = '=true',
		$format = '=webix.Number.numToStr({groupDelimiter:" ",groupSize:3,decimalDelimiter:",",decimalSize:2})',
		$otherParams = array()
	)
	{
		$columnArray = array();
		if ($id=='') $id = "fieldID";
		if ($header=='') $header = "Заголовок";
		if ($sort=='') $sort = 'text';
		if ($tooltip=='') $tooltip = '=false';
		if ($adjust=='') $adjust = '=true';
		if ($format=='') $format = '=webix.Number.numToStr({groupDelimiter:" ",groupSize:3,decimalDelimiter:",",decimalSize:2})';

		if (!is_null($id))
			$columnArray['id'] = $id;
		if (!is_null($header))
			$columnArray['header'] = $header;
		if (!is_null($sort))
			$columnArray['sort'] = $sort;
		if (!is_null($tooltip))
			$columnArray['tooltip'] = $tooltip;
		if (!is_null($adjust))
			$columnArray['adjust'] = $adjust;
		if (!is_null($format))
			$columnArray['format'] = $format;

		$columnArray = array_merge($columnArray,$otherParams);

		return $columnArray;
	}

	public function addFunctionSoftByTimestamp ()
	{
		$func = "function sortByTimestamp (a,b){\n\t"
			."a=a.timestamp;\n\tb=b.timestamp;\n\treturn a>b?1:(a<b?-1:0);\n};\n\n";
		Buffer::addWebixJs($func);

	}
}