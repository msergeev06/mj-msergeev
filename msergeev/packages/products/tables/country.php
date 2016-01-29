<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CountryTable extends DataManager
{
	public static function getTableName ()
	{
		return 'ms_products_country';
	}
	public static function getTableTitle()
	{
		return 'Страны';
	}
	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_products_city' => 'COUNTRY_ID'
			)
		);
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID категории'
			)),
			new Entity\StringField ('NAME', array(
				"required" => true,
				"title" => 'Название категории'
			)),
			new Entity\IntegerField ('SORT', array(
				"required" => true,
				"default_value" => 500,
				"title" => 'Сортировка'
			)),
			new Entity\StringField ('CODE', array(
				"required" => true,
				"run" => array(
					"function" => "\\MSergeev\\Core\\Lib\\Tools::generateCode()",
					"column" => 'NAME'
				),
				"unique" => true,
				'title' => 'Код раздела'
			))
		);
	}
	public static function getArrayDefaultValues () {
		return array(
			0 => array(
				'ID' => 1,
				'NAME' => 'Россия',
                'SORT' => 10,
				'CODE' => 'russia'
			)
		);
	}
}