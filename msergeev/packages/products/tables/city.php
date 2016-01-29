<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CityTable extends DataManager {
	public static function getTableName() {
		return 'ms_products_city';
	}
	public static function getTableTitle() {
		return 'Города';
	}
	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_products_shop' => 'SHOP_ID'
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID города'
			)),
			new Entity\StringField ('NAME', array(
				"required" => true,
				"title" => 'Название города'
			)),
			new Entity\StringField ('CODE', array(
				"required" => true,
				"run" => array(
					"function" => "\\MSergeev\\Core\\Lib\\Tools::generateCode()",
					"column" => 'NAME'
				),
				"title" => 'Код города'
			)),
			new Entity\IntegerField ('SORT', array(
				"required" => true,
				"default_value" => 500,
				"title" => 'Сортировка'
			)),
			new Entity\IntegerField ('COUNTRY_ID', array(
				"required" => true,
				"default_value" => 0,
				"link" => 'ms_products_country.ID',
				"title" => 'ID страны'
			))
		);
	}
	public static function getArrayDefaultValues () {
		return array(
			0 => array(
				'ID' => 1,
				'NAME' => 'Москва',
				'CODE' => 'moscow',
				'COUNTRY' => 1
			)
		);
	}
}