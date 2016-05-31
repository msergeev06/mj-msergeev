<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class FuelTypesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_fuel_types';
	}

	public static function getTableTitle ()
	{
		return 'Типы топлива';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID типа'
			)),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название'
			))
		);
	}

	public static function getArrayDefaultValues ()
	{
		return array(
			array(
				"ID" => 1,
				"SORT" => 10,
				"NAME" => "Бензин"
			),
			array(
				"ID" => 2,
				"SORT" => 20,
				"NAME" => "Дизель"
			),
			array(
				"ID" => 3,
				"SORT" => 30,
				"NAME" => "Газ"
			),
			array(
				"ID" => 4,
				"SORT" => 40,
				"NAME" => "Любой"
			),
			array(
				"ID" => 5,
				"SORT" => 50,
				"NAME" => "Инжектор"
			),
			array(
				"ID" => 6,
				"SORT" => 60,
				"NAME" => "Карбюратор"
			),
			array(
				"ID" => 7,
				"SORT" => 70,
				"NAME" => "Гибрид"
			),
			array(
				"ID" => 8,
				"SORT" => 80,
				"NAME" => "Бензин/Газ"
			),
			array(
				"ID" => 9,
				"SORT" => 90,
				"NAME" => "Электро"
			)
		);
	}
}