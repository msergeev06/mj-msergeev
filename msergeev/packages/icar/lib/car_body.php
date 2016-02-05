<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Packages\Icar\Tables\CarBodyTable;

class CarBody
{
	public static function getHtmlSelect($name='car_body')
	{
		$arValues = CarBodyTable::getList(array(
			'select' => array(
				'ID' => 'VALUE',
				'NAME'
			),
			'filter' => array(
				'ACTIVE' => true
			),
			'order' => array(
				'SORT' => 'ASC',
				'NAME' => 'ASC'
			)
		));

		return SelectBox($name,$arValues,'-- Выбрать --');
	}
}