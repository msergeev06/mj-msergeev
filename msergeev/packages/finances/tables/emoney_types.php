<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;
use MSergeev\Packages\Apihelp\Tables\SectionsTable;

class EmoneyTypesTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_emoney_types';
	}

	public static function getTableTitle ()
	{
		return 'Типы электронных денег';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_account_emoney' => 'EMONEY_TYPE_ID'
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
				"NAME" => "Webmoney"
			),
			array(
				"ID" => 2,
				"SORT" => 20,
				"NAME" => "Яндекс.Деньги"
			),
			array(
				"ID" => 3,
				"SORT" => 30,
				"NAME" => "QIWI"
			),
			array(
				"ID" => 4,
				"SORT" => 40,
				"NAME" => "Деньги@Mail.Ru"
			),
			array(
				"ID" => 5,
				"SORT" => 50,
				"NAME" => "RBK Money"
			),
			array(
				"ID" => 6,
				"SORT" => 60,
				"NAME" => "Rapida Online"
			),
			array(
				"ID" => 7,
				"SORT" => 70,
				"NAME" => "Единый кошелек (Wallet1, W1)"
			),
			array(
				"ID" => 8,
				"SORT" => 80,
				"NAME" => "Z-Paiment"
			),
			array(
				"ID" => 9,
				"SORT" => 90,
				"NAME" => "Money Mail"
			),
			array(
				"ID" => 10,
				"SORT" => 100,
				"NAME" => "Handy Bank"
			),
			array(
				"ID" => 11,
				"SORT" => 110,
				"NAME" => "Perfect Money"
			),
			array(
				"ID" => 12,
				"SORT" => 120,
				"NAME" => "OKPAY"
			),
			array(
				"ID" => 13,
				"SORT" => 130,
				"NAME" => "Payer"
			),
			array(
				"ID" => 14,
				"SORT" => 140,
				"NAME" => "Intellect Money"
			),
			array(
				"ID" => 15,
				"SORT" => 150,
				"NAME" => "Global Money"
			),
			array(
				"ID" => 16,
				"SORT" => 160,
				"NAME" => "Liq Pay"
			),
			array(
				"ID" => 17,
				"SORT" => 170,
				"NAME" => "Easy Pay"
			),
			array(
				"ID" => 18,
				"SORT" => 180,
				"NAME" => "PayPal"
			),
			array(
				"ID" => 19,
				"SORT" => 190,
				"NAME" => "E-gold"
			),
			array(
				"ID" => 20,
				"SORT" => 200,
				"NAME" => "Google Wallet"
			),
			array(
				"ID" => 21,
				"SORT" => 210,
				"NAME" => "Payoneer"
			),
			array(
				"ID" => 22,
				"SORT" => 220,
				"NAME" => "Skrill (ex-Moneybookers)"
			),
			array(
				"ID" => 23,
				"SORT" => 230,
				"NAME" => "Payza (ex-AlertPay)"
			),
			array(
				"ID" => 24,
				"SORT" => 240,
				"NAME" => "Paxum"
			),
			array(
				"ID" => 25,
				"SORT" => 250,
				"NAME" => "NETELLER"
			),
			array(
				"ID" => 26,
				"SORT" => 260,
				"NAME" => "SolidTrustPay"
			),
			array(
				"ID" => 27,
				"SORT" => 270,
				"NAME" => "Click2Pay"
			),
			array(
				"ID" => 28,
				"SORT" => 280,
				"NAME" => "Commerce Gold (c-gold)"
			),
			array(
				"ID" => 29,
				"SORT" => 290,
				"NAME" => "EgoPay"
			),
			array(
				"ID" => 30,
				"SORT" => 300,
				"NAME" => "KZM"
			),
			array(
				"ID" => 31,
				"SORT" => 310,
				"NAME" => "cashU"
			),
			array(
				"ID" => 32,
				"SORT" => 320,
				"NAME" => "Другой"
			)
		);
	}
}