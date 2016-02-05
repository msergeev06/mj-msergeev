<?php

namespace MSergeev\Packages\Icar\Lib;

use MSergeev\Packages\Icar\Tables\CarModelTable;

class CarModel
{
	public static function getHtmlSelect($brand=null, $name='car_model')
	{
		$arGetList = array(
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
		);
		if (!is_null($brand))
		{
			$arGetList['filter']['BRANDS_ID'] = intval($brand);
		}
		$arValues = CarModelTable::getList($arGetList);

		return SelectBox($name,$arValues,'-- Выбрать --');
	}

}