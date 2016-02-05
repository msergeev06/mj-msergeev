<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Packages\Icar\Tables\CarBrandTable;

class CarBrand
{
	public static function getHtmlSelect($name='car_brand')
	{
		$arValues = CarBrandTable::getList(array(
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