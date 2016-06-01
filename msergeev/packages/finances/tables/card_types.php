<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class CardTypesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_card_types';
	}

	public static function getTableTitle ()
	{
		return 'Типы пластиковых карт';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_account_bank' => 'CARD_TYPE_ID'
			)
		);
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
				"NAME" => "Visa"
			),
			array(
				"ID" => 2,
				"SORT" => 20,
				"NAME" => "MasterCard"
			),
			array(
				"ID" => 3,
				"SORT" => 30,
				"NAME" => "Maestro"
			),
			array(
				"ID" => 4,
				"SORT" => 40,
				"NAME" => "American Express"
			),
			array(
				"ID" => 5,
				"SORT" => 50,
				"NAME" => "ПРО100"
			),
			array(
				"ID" => 6,
				"SORT" => 60,
				"NAME" => "China Unionpay"
			),
			array(
				"ID" => 7,
				"SORT" => 70,
				"NAME" => "JCB"
			),
			array(
				"ID" => 8,
				"SORT" => 80,
				"NAME" => "Dinners Club"
			),
			array(
				"ID" => 9,
				"SORT" => 90,
				"NAME" => "УЭК"
			),
			array(
				"ID" => 10,
				"SORT" => 100,
				"NAME" => "Золотая корона"
			),
			array(
				"ID" => 11,
				"SORT" => 110,
				"NAME" => "Сберкарт"
			),
			array(
				"ID" => 12,
				"SORT" => 120,
				"NAME" => "ChronoPay"
			),
			array(
				"ID" => 13,
				"SORT" => 130,
				"NAME" => "Белкарт"
			),
			array(
				"ID" => 14,
				"SORT" => 140,
				"NAME" => "KAZNNSS"
			),
			array(
				"ID" => 15,
				"SORT" => 150,
				"NAME" => "АрменианКард"
			),
			array(
				"ID" => 16,
				"SORT" => 160,
				"NAME" => "НСМЭП"
			),
			array(
				"ID" => 17,
				"SORT" => 170,
				"NAME" => "АлтынАсыр"
			)
		);
	}
}