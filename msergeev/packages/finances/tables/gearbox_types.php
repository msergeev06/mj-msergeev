<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class GearboxTypesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_gearbox_types';
	}

	public static function getTableTitle ()
	{
		return 'Типы коробок передач';
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
				"NAME" => "Механическая"
			),
			array(
				"ID" => 2,
				"SORT" => 20,
				"NAME" => "Автоматическая"
			),
			array(
				"ID" => 3,
				"SORT" => 30,
				"NAME" => "Любая"
			),
			array(
				"ID" => 4,
				"SORT" => 40,
				"NAME" => "Робот"
			),
			array(
				"ID" => 5,
				"SORT" => 50,
				"NAME" => "Вариатор"
			)
		);
	}
}