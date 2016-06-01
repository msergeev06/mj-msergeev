<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountTypesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_types';
	}

	public static function getTableTitle ()
	{
		return 'Типы счетов';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_account_types' => 'PARENT_SECTION_ID',
				'ms_finances_accounts' => 'ACCOUNT_TYPE_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID категории'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название раздела'
			)),
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности раздела'
			)),
			new Entity\IntegerField('PARENT_SECTION_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_account_types.ID',
				'title' => 'Родительский раздел'
			)),
			new Entity\IntegerField('LEFT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Левая граница'
			)),
			new Entity\IntegerField('RIGHT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Правая граница'
			))
		);
	}

	public static function getArrayDefaultValues ()
	{
		return array(
			array(
				"ID" => 1,
				"NAME" => "Деньги",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 1,
				"RIGHT_MARGIN" => 12
			),
			array(
				"ID" => 2,
				"NAME" => "Наличные",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 2,
				"RIGHT_MARGIN" => 3
			),
			array(
				"ID" => 3,
				"NAME" => "Дебетовая карта",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 4,
				"RIGHT_MARGIN" => 5
			),
			array(
				"ID" => 4,
				"NAME" => "Депозит",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 6,
				"RIGHT_MARGIN" => 7
			),
			array(
				"ID" => 5,
				"NAME" => "Электронный кошелек",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 8,
				"RIGHT_MARGIN" => 9
			),
			array(
				"ID" => 6,
				"NAME" => "Банковский счет",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 1,
				"LEFT_MARGIN" => 10,
				"RIGHT_MARGIN" => 11
			),
			array(
				"ID" => 7,
				"NAME" => "Мне должны",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 13,
				"RIGHT_MARGIN" => 16
			),
			array(
				"ID" => 8,
				"NAME" => "Мне должны (заем выданный)",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 7,
				"LEFT_MARGIN" => 14,
				"RIGHT_MARGIN" => 15
			),
			array(
				"ID" => 9,
				"NAME" => "Я должен",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 17,
				"RIGHT_MARGIN" => 24
			),
			array(
				"ID" => 10,
				"NAME" => "Я должен (заем полученный)",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 9,
				"LEFT_MARGIN" => 18,
				"RIGHT_MARGIN" => 19
			),
			array(
				"ID" => 11,
				"NAME" => "Кредитная карта",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 9,
				"LEFT_MARGIN" => 20,
				"RIGHT_MARGIN" => 21
			),
			array(
				"ID" => 12,
				"NAME" => "Кредит",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 9,
				"LEFT_MARGIN" => 22,
				"RIGHT_MARGIN" => 23
			),
			array(
				"ID" => 13,
				"NAME" => "Инвестиции",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 25,
				"RIGHT_MARGIN" => 52
			),
			array(
				"ID" => 14,
				"NAME" => "Брокерский счет",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 26,
				"RIGHT_MARGIN" => 27
			),
			array(
				"ID" => 15,
				"NAME" => "Металлический счет (ОМС)",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 28,
				"RIGHT_MARGIN" => 29
			),
			array(
				"ID" => 16,
				"NAME" => "Акции",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 30,
				"RIGHT_MARGIN" => 31
			),
			array(
				"ID" => 17,
				"NAME" => "Облигации",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 32,
				"RIGHT_MARGIN" => 33
			),
			array(
				"ID" => 18,
				"NAME" => "Другие ценные бумаги",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 34,
				"RIGHT_MARGIN" => 35
			),
			array(
				"ID" => 19,
				"NAME" => "ПИФ",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 36,
				"RIGHT_MARGIN" => 37
			),
			array(
				"ID" => 20,
				"NAME" => "ОФБУ",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 38,
				"RIGHT_MARGIN" => 39
			),
			array(
				"ID" => 21,
				"NAME" => "Фонд",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 40,
				"RIGHT_MARGIN" => 41
			),
			array(
				"ID" => 22,
				"NAME" => "Накопительное страхование жизни",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 42,
				"RIGHT_MARGIN" => 43
			),
			array(
				"ID" => 23,
				"NAME" => "Накопительный план",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 44,
				"RIGHT_MARGIN" => 45
			),
			array(
				"ID" => 24,
				"NAME" => "Негосударственный пенсионный фонд",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 46,
				"RIGHT_MARGIN" => 47
			),
			array(
				"ID" => 25,
				"NAME" => "Пенсионный счет",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 48,
				"RIGHT_MARGIN" => 49
			),
			array(
				"ID" => 26,
				"NAME" => "ПАММ-счет",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 13,
				"LEFT_MARGIN" => 50,
				"RIGHT_MARGIN" => 51
			),
			array(
				"ID" => 27,
				"NAME" => "Имущество",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 53,
				"RIGHT_MARGIN" => 70
			),
			array(
				"ID" => 28,
				"NAME" => "Недвижимость",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 54,
				"RIGHT_MARGIN" => 55
			),
			array(
				"ID" => 29,
				"NAME" => "Автомобиль",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 56,
				"RIGHT_MARGIN" => 57
			),
			array(
				"ID" => 30,
				"NAME" => "Водный транспорт",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 58,
				"RIGHT_MARGIN" => 59
			),
			array(
				"ID" => 31,
				"NAME" => "Произведение искусства",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 60,
				"RIGHT_MARGIN" => 61
			),
			array(
				"ID" => 32,
				"NAME" => "Бизнес",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 62,
				"RIGHT_MARGIN" => 63
			),
			array(
				"ID" => 33,
				"NAME" => "Прочее имущество",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 64,
				"RIGHT_MARGIN" => 65
			),
			array(
				"ID" => 34,
				"NAME" => "Мототехника",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 66,
				"RIGHT_MARGIN" => 67
			),
			array(
				"ID" => 35,
				"NAME" => "Воздушный транспорт",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 27,
				"LEFT_MARGIN" => 68,
				"RIGHT_MARGIN" => 69
			),
			array(
				"ID" => 36,
				"NAME" => "Карты лояльности",
				"DEPTH_LEVEL" => 0,
				"PARENT_SECTION_ID" => 0,
				"LEFT_MARGIN" => 71,
				"RIGHT_MARGIN" => 74
			),
			array(
				"ID" => 37,
				"NAME" => "Бонусная карта",
				"DEPTH_LEVEL" => 1,
				"PARENT_SECTION_ID" => 36,
				"LEFT_MARGIN" => 72,
				"RIGHT_MARGIN" => 73
			)
		);
	}
}