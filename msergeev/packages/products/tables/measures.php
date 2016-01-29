<?php

namespace MSergeev\Packages\Products\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class MeasuresTable extends DataManager {
	public static function getTableName() {
		return "ms_products_measures";
	}

	public static function getTableTitle() {
		return 'Единицы измерения';
	}

	public static function getMap () {
		return array(
			new Entity\IntegerField ('ID', array(
				"primary" => true,
				"autocomplete" => true,
				"title" => 'ID единицы измерения'
			)),
			new Entity\StringField ('NAME', array(
				"required" => true,
				"title" => 'Имя единицы измерения'
			)),
			new Entity\StringField ('SHORT', array(
				"required" => true,
				"column_name" => "SHORT_NAME",
				"title" => 'Краткое наименование'
			)),
			new Entity\StringField ('CODE', array(
				"required" => true,
				"run" => array(
					"function" => "\\MSergeev\\Core\\Lib\\Tools::generateCode",
					"column" => 'NAME'
				),
				"unique" => true,
				"title" => 'Код единицы измерения'
			)),
			new Entity\IntegerField ('SORT', array(
				"required" => true,
				"default_value" => 500,
				"title" => 'Сортировка'
			)),
			new Entity\BooleanField ('FLOAT', array(
				"required" => true,
				"default_value" => false,
				"title" => 'Вещественное ли число'
			)),
			new Entity\BooleanField ('SYS', array(
				"required" => true,
				"default_value" => false,
				"title" => 'Системная единица измерения'
			))
		);
	}
	public static function getArrayDefaultValues() {
		return array(
			array(
				'ID' => 1,
				'NAME' => 'Штука',
				'SHORT' => 'шт.',
				'CODE' => 'pcs',
				'SORT' => 10,
				'SYS' => true
			),
			array(
				'ID' => 2,
				'NAME' => 'Килограмм',
				'SHORT' => 'кг.',
				'CODE' => 'kilo',
				'SORT' => 20,
				'FLOAT' => true,
				'SYS' => true
			),
			array(
				'ID' => 3,
				'NAME' => 'Метр',
				'SHORT' => 'м.',
				'CODE' => 'meter',
				'SORT' => 30,
				'FLOAT' => true,
				'SYS' => true
			),
			array(
				'ID' => 4,
				'NAME' => 'Литр',
				'SHORT' => 'л.',
				'CODE' => 'liter',
				'SORT' => 40,
				'FLOAT' => true,
				'SYS' => true
			)
		);
	}
}