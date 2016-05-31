<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class ColorsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_colors';
	}

	public static function getTableTitle ()
	{
		return 'Цвета';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID цвета'
			)),
			Lib\TableHelper::sortField(),
			new Entity\StringField("NAME",array(
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
				"NAME" => "Бежевый"
			),
			array(
				"ID" => 2,
				"NAME" => "Бежевый металлик"
			),
			array(
				"ID" => 3,
				"NAME" => "Белый"
			),
			array(
				"ID" => 4,
				"NAME" => "Белый металлик"
			),
			array(
				"ID" => 5,
				"NAME" => "Голубой"
			),
			array(
				"ID" => 6,
				"NAME" => "Голубой металлик"
			),
			array(
				"ID" => 7,
				"NAME" => "Желтый"
			),
			array(
				"ID" => 8,
				"NAME" => "Желтый металлик"
			),
			array(
				"ID" => 9,
				"NAME" => "Зеленый"
			),
			array(
				"ID" => 10,
				"NAME" => "Зеленый металлик"
			),
			array(
				"ID" => 11,
				"NAME" => "Золотой"
			),
			array(
				"ID" => 12,
				"NAME" => "Золотой металлик"
			),
			array(
				"ID" => 13,
				"NAME" => "Коричневый"
			),
			array(
				"ID" => 14,
				"NAME" => "Коричневый металлик"
			),
			array(
				"ID" => 15,
				"NAME" => "Красный"
			),
			array(
				"ID" => 16,
				"NAME" => "Красный металлик"
			),
			array(
				"ID" => 17,
				"NAME" => "Оранжевый"
			),
			array(
				"ID" => 18,
				"NAME" => "Оранжевый металлик"
			),
			array(
				"ID" => 19,
				"NAME" => "Пурпурный"
			),
			array(
				"ID" => 20,
				"NAME" => "Пурпурный металлик"
			),
			array(
				"ID" => 21,
				"NAME" => "Серебряный"
			),
			array(
				"ID" => 22,
				"NAME" => "Серебряный металлик"
			),
			array(
				"ID" => 23,
				"NAME" => "Синий"
			),
			array(
				"ID" => 24,
				"NAME" => "Синий металлик"
			),
			array(
				"ID" => 25,
				"NAME" => "Фиолетовый"
			),
			array(
				"ID" => 26,
				"NAME" => "Фиолетовый металлик"
			),
			array(
				"ID" => 27,
				"NAME" => "Черный"
			),
			array(
				"ID" => 28,
				"NAME" => "Черный металлик"
			),
			array(
				"ID" => 29,
				"NAME" => "Розовый"
			),
			array(
				"ID" => 30,
				"NAME" => "Розовый металлик"
			)
		);
	}
}